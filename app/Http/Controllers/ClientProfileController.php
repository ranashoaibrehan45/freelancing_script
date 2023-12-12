<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ClientProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($page = '')
    {
        if ($page) {
            return view('profile.client.'.$page, ['user' => Auth::user()]);
        }
        return view('profile.client.home', ['user' => Auth::user()]);
    }
}
