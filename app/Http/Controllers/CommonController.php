<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommonController extends Controller
{
    /*
    *	Puchser API Testing
    */
    public function testPusher()
    {
        //PusherFacade::trigger('my-channel', 'my-event', ['message' => "Hello Pakistan"]);
    }

    /*
    *	Get counties based on city
    */
    public function getStates($country)
    {
        $obj = \App\Models\State::select('id', 'name')
            ->distinct()
            ->where('country_id', $country)
            ->orderBy('name')
            ->get();

        return $obj;
    }

    /*
    *	Get cities based on state & county
    */
    public function getCity($state)
    {
        $obj = \App\Models\City::select('id', 'name')
            ->distinct()
            ->where('state_id', $state)
            ->where('name', '<>', '')
            ->orderBy('name')
            ->get();

        return $obj;
    }

}
