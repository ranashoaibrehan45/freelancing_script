<?php

namespace App\Http\Controllers;

use App\Models\Length;
use App\Http\Requests\Admin\LengthRequest;
use Illuminate\Http\Request;

class LengthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Length::all();
        return view('admin.length.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.length.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LengthRequest $request)
    {
        $data = $request->all();
        $size = Length::create($data);

        return redirect()
            ->route('admin.length.create')
            ->with('status', 'Project length has been inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Length $length)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Length $length)
    {
        return view('admin.length.edit', compact('length'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LengthRequest $request, Length $length)
    {
        $data = $request->all();
        $length->update($data);

        return redirect()
            ->route('admin.length.index')
            ->with('status', 'Project length has been upated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Length $length)
    {
        if ($length->delete()) {
            return [
                'success' => true,
                'message' => 'Project length has been deleted successfully.',
            ];
        }
        return [
            'success' => false, 
            'message' => 'There is some problem, please try again later.',
        ];
    }
}
