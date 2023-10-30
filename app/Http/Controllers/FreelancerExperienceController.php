<?php

namespace App\Http\Controllers;

use App\Models\FreelancerExperience;
use App\Http\Requests\Profile\ExperienceRequest;
use Illuminate\Http\Request;

class FreelancerExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'languages' => view('profile.experience.list')->render(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceRequest $request)
    {
        try {
            $user = $request->user();
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;
            $exp = FreelancerExperience::create($data);
            if ($exp) {
                if ($user->freelancer->profile == 'title') {
                    $user->freelancer->profile = 'experience';
                    $user->freelancer->save();
                }
                return back();
            } else {
                return back()->with('error', 'There is some problem, Please try again later.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FreelancerExperience $freelancerExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $freelancerExperience = FreelancerExperience::find($id);
        return response()->json([
            'success' => true,
            'view' => view('profile.experience.edit-exp-body', ['exp' => $freelancerExperience])->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceRequest $request,  $id)
    {
        try {
            $freelancerExperience = FreelancerExperience::findOrFail($id);
            $user = $request->user();
            $data = $request->validated();
            $exp = $freelancerExperience->update($data);
            if ($exp) {
                return back();
            } else {
                return back()->with('error', 'There is some problem, Please try again later.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $freelancerExperience = FreelancerExperience::find($id);
        if (!$freelancerExperience) {
            return [
                'success' => false,
                'error' => 'Resource not found.',
            ];
        }
        if ($freelancerExperience->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Experience deleted successfully.',
                'view' => view('profile.experience.list')->render(),
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
