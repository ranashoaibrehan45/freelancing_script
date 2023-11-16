<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProfile;
use App\Models\FreelancerService;
use Illuminate\Http\Request;
use Auth;

class FreelancerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($page = '')
    {
        if ($page) {
            return view('profile.freelancer.'.$page, ['user' => Auth::user()]);
        }
        return view('profile.freelancer.build-profile-1', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FreelancerProfile $freelancerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FreelancerProfile $freelancerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreelancerProfile $freelancerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreelancerProfile $freelancerProfile)
    {
        //
    }

    /**
     * Freelancer profile started
    */
    public function started(Request $request)
    {
        $user = $request->user();

        if ($user->freelancer->profile = 'pending') {
            $user->freelancer->profile = 'start';
        }
        
        $user->freelancer->save();
        return redirect()->route('freelancer.profile.create', ['page' => 'experience-level']);
    }

    public function experienceLevel(Request $request)
    {
        $validated = $request->validate([
            'experience_level' => 'required',
        ]);

        $user = $request->user();

        if ($user->freelancer->profile == 'start') {
            $user->freelancer->profile = 'experience_level';
        }

        $user->freelancer->experience_level = $request->experience_level;
        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'set-goal']);
    }

    /**
     * save freelancer goal
    */
    public function goal(Request $request)
    {
        $validated = $request->validate([
            'goal' => 'required',
        ]);

        $user = $request->user();

        if ($user->freelancer->profile == 'experience_level') {
            $user->freelancer->profile = 'goal';
        }

        $user->freelancer->goal = $request->goal;
        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'how-to-work']);
    }

    /**
     * save how freelancer want s to work
    */
    public function howToWork(Request $request)
    {
        $validated = $request->validate([
            'find_work' => 'required_without:sale_services',
            'sale_services' => 'required_without:find_work',
        ]);

        $user = $request->user();
        
        if ($user->freelancer->profile == 'goal') {
            $user->freelancer->profile = 'how_to_work';
        }
        
        if ($request->has('find_work')) {
            $user->freelancer->find_work = 1;
        }
        if ($request->has('sale_services')) {
            $user->freelancer->sale_services = 1;
        }

        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'set-title']);
    }

    /**
     * save how freelancer profile title
    */
    public function title(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
        ]);

        $user = $request->user();

        if ($user->freelancer->profile == 'how_to_work') {
            $user->freelancer->profile = 'title';
        }

        $user->freelancer->title = $request->title;
        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'set-experience']);
    }

    /**
     * save how freelancer profile overview
    */
    public function overview(Request $request)
    {
        $validated = $request->validate([
            'bio' => 'required|min:100',
        ]);

        $user = $request->user();

        if ($user->freelancer->profile == 'skills') {
            $user->freelancer->profile = 'bio';
        }

        $user->freelancer->bio = $request->bio;
        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'set-services']);
    }

    /**
     * save how freelancer hourly rate
    */
    public function setRate(Request $request)
    {
        $validated = $request->validate([
            'rate' => 'required|numeric|min:5',
        ]);

        $user = $request->user();

        if ($user->freelancer->profile == 'services') {
            $user->freelancer->profile = 'hourly_rate';
        }

        $user->freelancer->rate = $request->rate;
        $user->freelancer->save();

        return redirect()->route('freelancer.profile.create', ['page' => 'set-location']);
    }

    /**
     * Set freelancer's services
     * @param $services
    */
    public function setServices(Request $request)
    {
        $services = $request->input('services');
        $user = $request->user();

        try {
            \DB::beginTransaction();
            FreelancerService::where('user_id', $user->id)->delete();
            if (count($services) > 0) {
                foreach ($services as $service) {
                    $subcat = \App\Models\SubCategory::find($service);
                    if ($subcat) {
                        FreelancerService::create([
                            'user_id' => $user->id,
                            'category_id' => $subcat->category_id,
                            'sub_category_id' => $subcat->id,
                        ]);
                    }
                }
            }

            if ($user->freelancer->profile == 'bio') {
                $user->freelancer->profile = 'services';
                $user->freelancer->save();
            }

            \DB::commit();
            return response()->json([
                'success' => true,
                'services' => FreelancerService::where('user_id', $user->id)->get(),
                'status' => 'Services updated successfully.',
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
