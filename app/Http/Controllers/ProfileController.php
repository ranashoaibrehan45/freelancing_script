<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserLanguage;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\View;
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

            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }


            $request->user()->save();
            $user = $request->user();

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

            DB::commit();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong, Please try again later.');
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
        $userLang = UserLanguage::where('language_id', $id)
            ->where('user_id', Auth::id())
            ->first();
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
}
