<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Length extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
        'size_id',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }


}
