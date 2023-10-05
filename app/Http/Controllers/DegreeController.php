<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Http\Requests\Admin\DegreeRequest;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $degrees = Degree::paginate(10);
        return view('admin.degree.degrees', compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.degree.create-degree');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DegreeRequest $request)
    {
        $data = $request->validated();
        $degree = Degree::create($data);

        return redirect()
            ->route('admin.degree.create')
            ->with('status', 'Degree has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Degree $degree)
    {
        return view('admin.degree.edit-degree', compact('degree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DegreeRequest $request, Degree $degree)
    {
        $data = $request->validated();
        $degree->update($data);

        return redirect()
            ->route('admin.degree.index')
            ->with('status', 'Degree has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Degree $degree)
    {
        if ($degree->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Degree deleted successfully.',
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
