<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('school', \App\Http\Controllers\SchoolController::class);
    Route::resource('degree', \App\Http\Controllers\DegreeController::class);
    Route::resource('study_area', \App\Http\Controllers\StudyAreaController::class);
    Route::resource('skill', \App\Http\Controllers\SkillController::class);

    Route::controller(\App\Http\Controllers\SubCategoryController::class)->group(function () {
        Route::get('subcategory/{category}/index', 'index')->name('subcategory.index');
        Route::get('subcategory/{category}/create', 'create')->name('subcategory.create');
        Route::post('subcategory/store', 'store')->name('subcategory.store');
        Route::get('subcategory/{subcategory}/edit', 'edit')->name('subcategory.edit');
        Route::patch('subcategory/{subCategory}/update', 'update')->name('subcategory.update');
    });
});


