<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\Admin\SchoolRequest;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(10);
        return view('admin.school.schools', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school.create-school');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $data = $request->validated();
        $degree = School::create($data);

        return redirect()
            ->route('admin.school.create')
            ->with('status', 'School has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.school.edit-school', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, School $school)
    {
        $data = $request->validated();
        $school->update($data);

        return redirect()
            ->route('admin.school.index')
            ->with('status', 'School has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        if ($school->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'School deleted successfully.',
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
