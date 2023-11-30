<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\Admin\SizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.list', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizeRequest $request)
    {
        $data = $request->validated();
        $size = Size::create($data);

        return redirect()
            ->route('admin.size.create')
            ->with('status', 'Project size has been inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SizeRequest $request, Size $size)
    {
        $data = $request->validated();
        $size->update($data);

        return redirect()
            ->route('admin.size.index')
            ->with('status', 'Project size has been upated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        if ($size->delete()) {
            return [
                'success' => true,
                'message' => 'Project size has been deleted successfully.',
            ];
        }
        return [
            'success' => false, 
            'message' => 'There is some problem, please try again later.',
        ];
    }
}
