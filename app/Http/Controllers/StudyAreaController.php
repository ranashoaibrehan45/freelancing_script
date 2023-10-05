<?php

namespace App\Http\Controllers;

use App\Models\StudyArea;
use App\Http\Requests\Admin\StudyAreaRequest;
use Illuminate\Http\Request;

class StudyAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = StudyArea::paginate(10);
        return view('admin.studyarea.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.studyarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudyAreaRequest $request)
    {
        $data = $request->validated();
        $obj = StudyArea::create($data);

        return redirect()
            ->route('admin.study_area.create')
            ->with('status', 'Study area has been stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyArea $studyArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyArea $studyArea)
    {
        return view('admin.studyarea.edit', compact('studyArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudyAreaRequest $request, StudyArea $studyArea)
    {
        $data = $request->validated();
        $studyArea->update($data);

        return redirect()
            ->route('admin.study_area.index')
            ->with('status', 'Study area has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyArea $studyArea)
    {
        if ($studyArea->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Study area deleted successfully.',
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
