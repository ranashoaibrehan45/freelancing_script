<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class UserEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'school',
        'year_from',
        'year_to',
        'degree_id',
        'study_area',
        'description',
    ];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the degree that owns the UserEducation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }
}
