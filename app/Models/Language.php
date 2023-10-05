<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Language extends Model
{
    use HasFactory;

    public static function dropdown()
    {
        return Self::whereNotIn('id', Auth::user()->languages()->pluck('language_id')->toArray())->get();
    }
}
