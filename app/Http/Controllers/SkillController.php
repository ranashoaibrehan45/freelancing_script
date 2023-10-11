<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Requests\Admin\SkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Skill::paginate(10);
        return view('admin.skill.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name, '-');
        $skill = Skill::create($data);

        return redirect()
            ->route('admin.skill.create')
            ->with('status', 'Skill has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name, '-');
        $skill->update($data);

        return redirect()
            ->route('admin.skill.index')
            ->with('status', 'Skill has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        if ($skill->delete()) {
            return response()->json([
                'success' => true,
                'status' => 'Skill deleted successfully.',
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'There is some problem, Please try again later.',
        ]);
    }
}
