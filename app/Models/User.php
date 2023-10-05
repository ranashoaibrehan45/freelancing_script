<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'role',
        'address',
        'city_id',
        'state_id',
        'zipcode',
        'country_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // verify user role
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    // get user name
    public function getName()
    {
        $name = $this->first_name;
        if ($this->last_name) {
            $name .= ' '.$this->last_name;
        }
        return $name;
    }

    // get user country
    public function country() : belongsTo
    {
        return $this->belongsTo(Country::class);
    }
    
    // get user State
    public function state() : belongsTo
    {
        return $this->belongsTo(State::class);
    }
    
    // get user City
    public function city() : belongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get all of the languages for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages(): HasMany
    {
        return $this->hasMany(UserLanguage::class);
    }

    /**
     * Get all of the educations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations(): HasMany
    {
        return $this->hasMany(UserEducation::class);
    }
}
