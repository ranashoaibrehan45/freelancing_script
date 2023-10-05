<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class UserLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'language_id',
        'language_proficiency_id',
    ];

    /**
     * Get the language that owns the UserLanguage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the proficiency that owns the UserLanguage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proficiency(): BelongsTo
    {
        return $this->belongsTo(LanguageProficiency::class, 'language_proficiency_id', 'id');
    }
}
