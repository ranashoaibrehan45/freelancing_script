<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(\App\Http\Controllers\CommonController::class)->group(function() {
    Route::get('validate/zipcode/{zipcode}', 'validateZip');
    Route::get('states/{country}', 'getStates');
    Route::get('cities/{state}', 'getCity');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(\App\Http\Controllers\FreelancerProfileController::class)->group(function() {
        Route::get('/freelancer/profile/create/{page?}', 'create')->name('freelancer.profile.create');
        Route::post('/freelancer/profile/started', 'started')->name('freelancer.profile.started');
        Route::post('/freelancer/profile/experiencelevel', 'experienceLevel')->name('freelancer.profile.experiencelevel');
        Route::post('/freelancer/profile/goal', 'goal')->name('freelancer.profile.goal');
        Route::post('/freelancer/profile/how-to-work', 'howToWork')->name('freelancer.profile.htw');
        Route::post('/freelancer/profile/title', 'title')->name('freelancer.profile.title');
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'show')->name('profile.show');
        Route::get('/profile', 'show')->name('profile.show');
        Route::get('/edit/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::get('/profile/languages', 'userLanguages')->name('profile.languages');
        Route::get('profile/add/language', 'addLanguage')->name('profile.languages.add');
        Route::post('/profile/store/language', 'storeLanguage')->name('profile.language.store');
        Route::get('profile/edit/languages', 'editLanguages')->name('profile.languages.edit');
        Route::delete('profile/language/{id}', 'deleteLang')->name('profile.languages.delete');
    });

    Route::resource('user_experience', \App\Http\Controllers\FreelancerExperienceController::class);
    Route::resource('user_education', \App\Http\Controllers\UserEducationController::class);
});

require __DIR__.'/auth.php';
