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
        //
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
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;
            $exp = FreelancerExperience::create($data);
            if ($exp) {
                return back();
            } else {
                return back()->with('error', 'There is some problem, Please try again later.');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            //return back()->with('error', $e->getMessage());
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
    public function edit(FreelancerExperience $freelancerExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceRequest $request, FreelancerExperience $freelancerExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreelancerExperience $freelancerExperience)
    {
        //
    }
}
