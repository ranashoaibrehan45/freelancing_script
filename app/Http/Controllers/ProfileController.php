<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Profile\ImageRequest;
use App\Models\UserLanguage;
use App\Models\FreelancerSkill;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Twilio\Rest\Client;
use DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(): View
    {
        return view('profile.show', [
            'user' => request()->user(),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $user = $request->user();

            $data = $request->all();
            $data['dob'] = \Carbon\Carbon::createFromFormat('d-m-Y', $request->input('dob'))->format('Y-m-d');
            
            $user->fill($data);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();
            
            if ($request->file('photo')) {
                $oldPhoto = $user->photo;
                $path = $request->file('photo')->store('public/avatars');
                $user->photo = last(Str::of($path)->explode('/')->toArray());
                $user->save();

                // resize image
                $name = '128x128-'.$user->photo;
                ResizeImage::make($request->file('photo'))
                    ->resize(128, 128)
                    ->save(storage_path('app/public/avatars/'.$name));

                if ($oldPhoto) {
                    Storage::delete('public/avatars/'.$oldPhoto);
                    Storage::delete('public/avatars/128x128-'.$oldPhoto);
                }
            }

            // update profile status
            $redirectRoute = 'profile.edit';
            
            if ($user->freelancer->profile == 'hourly_rate') {
                $user->freelancer->profile = 'details';
                $user->freelancer->save();
                $redirectRoute = 'freelancer.profile.preview';
            }

            DB::commit();
            return Redirect::route($redirectRoute)->with('status', 'profile-updated');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $this->getErrorMessage($e));
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Get user languages
    public function userLanguages()
    {
        return response()->json([
            'success' => true,
            'languages' => view('profile.language.languages')->render(),
        ]);
    }

    // Store user languages
    public function storeLanguage(\App\Http\Requests\Profile\StoreLanguageRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $user = $request->user();

        $userLang = UserLanguage::updateOrCreate(
            ['user_id' => $request->user()->id, 'language_id' => $request->language_id],
            ['language_proficiency_id' => $request->language_proficiency_id]
        );

        if ($user->freelancer->profile == 'education') {
            $user->freelancer->profile = 'languages';
            $user->freelancer->save();
        }
        
        if (isset($userLang->id)) {
            return [
                'success' => true,
                'languages' => view('profile.language.languages')->render(),
                'status' => 'Language stored successfully.',
            ];
        }

        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later!',
        ]);
    }

    /**
     * add language body
     * @return languages view
    */
    public function addLanguages()
    {
        return response()->json([
            'success' => true,
            'languages' => view('profile.language.add-lang-body')->render(),
        ]);
    }

    /**
     * Edit languages
     * @return languages view
    */
    public function editLanguages()
    {
        return response()->json([
            'success' => true,
            'languages' => view('profile.language.edit-lang-body')->render(),
        ]);
    }

    /**
     * Add language
     * @return languages view
    */
    public function addLanguage()
    {
        return response()->json([
            'success' => true,
            'languages' => view('profile.language.add-lang-body')->render(),
        ]);
    }

    /**
     * Delete user language
    */
    public function deleteLang($id)
    {
        $userLang = UserLanguage::find($id);
        if (!$userLang) {
            return response()->json([
                'success' => false,
                'error' => 'Language not found!',
            ]);
        }

        if ($userLang->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Language delete successfully.',
                'languages' => view('profile.language.languages')->render(),
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }

    /**
     * Set freelancer's skills
     * @param $skills
    */
    public function setSkills(Request $request)
    {
        $skills = $request->input('skills');
        $user = $request->user();

        try {
            DB::beginTransaction();
            FreelancerSkill::where('user_id', $user->id)->delete();
            if (count($skills) > 0) {
                foreach ($skills as $skill) {
                    FreelancerSkill::create([
                        'user_id' => $user->id,
                        'skill_id' => $skill,
                    ]);
                }
            }

            if ($user->freelancer->profile == 'languages') {
                $user->freelancer->profile = 'skills';
                $user->freelancer->save();
            }

            DB::commit();

            $skills = '';
            foreach (FreelancerSkill::where('user_id', $user->id)->get() as $skill) {
                $skills .= '<span class="tag">'.$skill->skill->name.'</span>';
            }
            return response()->json([
                'success' => true,
                'skills' => $skills,
                'status' => 'Skills updated successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the user's profile image.
     */
    public function image(ImageRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = $request->user();

            if ($request->file('profile_photo')) {
                $oldPhoto = $user->photo;
                $path = $request->file('profile_photo')->store('public/avatars');
                $user->photo = last(Str::of($path)->explode('/')->toArray());
                $user->save();

                // resize image
                $name = '128x128-'.$user->photo;
                ResizeImage::make($request->file('profile_photo'))
                    ->resize(128, 128)
                    ->save(storage_path('app/public/avatars/'.$name));

                if ($oldPhoto) {
                    Storage::delete('public/avatars/'.$oldPhoto);
                    Storage::delete('public/avatars/128x128-'.$oldPhoto);
                }
            }
            DB::commit();
            return [
                'success' => true,
                'view' => view('components.profile.image', [
                    'photo' => url('storage/avatars/128x128-'.$user->photo),
                ])->render(),
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong, Please try again later.');
        }
    }

    /**
     * Verify mobile number
    */
    public function mobile(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'phone' => ['required', 'numeric', 'unique:users,phone,'. $user->id],
        ]);

        if ($user->isDirty('phone')) {
            $user->phone_verified_at = null;
        }

        /* Get credentials from .env */
        $api_key = getenv("VONAGE_API_KEY");
        $api_secret = getenv("VONAGE_API_SECRET");
        
        $basic  = new \Vonage\Client\Credentials\Basic($api_key, $api_secret);
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));

        try {
            $request = new \Vonage\Verify\Request($data['phone'], "Vonage");
            $response = $client->verify()->start($request);

            \App\Models\NexmoVerifyRequest::updateOrCreate(
                ['user_id' => Auth::id()],
                ['request_id' => $response->getRequestId()]
            );
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return back()->with('error', $this->getErrorMessage($e));
        }

        $user->phone = $data['phone'];
        $user->save();
        
        return redirect()->route('profile.verify.phone')->with(['phone' => $data['phone']]);
    }

    /**
     * Verify phone
    */
    public function createVarification()
    {
        return view('profile.verify-phone');
    }

    /**
     * Verify phone number
    */
    protected function verifyPhone(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);

        $user = $request->user();
        
        /* Get credentials from .env */
        $api_key = getenv("VONAGE_API_KEY");
        $api_secret = getenv("VONAGE_API_SECRET");

        $basic  = new \Vonage\Client\Credentials\Basic($api_key, $api_secret);
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));
        
        try {
            $result = $client->verify()->check($user->nexmo->request_id, $request->verification_code);
            $responseData = $result->getResponseData();
            \Log::info(print_r($responseData, true));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        if (true) {
            $user->phone_verified_at = \Carbon\Carbon::toDateTimeString();
            $user->save();

            /* Authenticate user */
            return redirect()->route('home')->with(['message' => 'Phone number verified']);
        }

        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

}
