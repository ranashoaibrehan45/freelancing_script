<?php

namespace App\Http\Controllers;

use App\Models\UserEducation;
use App\Http\Requests\UserEducationRequest;
use Illuminate\Http\Request;
use Auth;

class UserEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'view' => view('profile.education.list')->render()
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
    public function store(UserEducationRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::id();

            $userEdu = UserEducation::create($data);
            if ($userEdu) {
                return redirect()->route('profile.edit');
            }

            return redirect()->route('profile.edit')
                ->with('error', 'There is some problem, Please try again later.');
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
            return redirect()->route('profile.edit')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserEducation $userEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserEducation $userEducation)
    {
        return response()->json([
            'success' => true,
            'view' => view('profile.education.edit-edu-body', ['userEdu' => $userEducation])->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEducationRequest $request, UserEducation $userEducation)
    {
        $data = $request->validated();
        $userEducation->update($data);
        return redirect()->route('profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserEducation $userEducation)
    {
        if ($userEducation->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Education deleted successfully.',
                'view' => view('profile.education.list')->render(),
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
