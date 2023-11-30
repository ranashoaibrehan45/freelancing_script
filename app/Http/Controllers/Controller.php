<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getErrorMessage($e)
    {
        return (config('app.env') == 'local') ? $e->getMessage() : 'Something went wrong, Please try again later.';
    }
}
