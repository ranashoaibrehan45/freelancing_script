<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'find_work',
        'sale_services',
        'profile',
        'title',
        'bio',
        'rate',
    ];

    /**
     * Get the user that owns the FreelancerProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRate()
    {
        return number_format($this->rate, 2);
    }
}
