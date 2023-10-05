<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\Admin\SubCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $subcategories = SubCategory::where('category_id', $category->id)->paginate(10);
        return view('admin.subcategory.subcategories', compact('subcategories','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('admin.subcategory.create-subcategory', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name, '-');
        $subcategory = SubCategory::create($data);

        return redirect()
            ->route('admin.subcategory.create', ['category' => $subcategory->category])
            ->with('status', 'SubCategory has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        return view('admin.subcategory.edit-subcategory', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name, '-');
        $subCategory->update($data);

        return redirect()
            ->route('admin.subcategory.index', ['category' => $subCategory->category])
            ->with('status', 'SubCategory has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
