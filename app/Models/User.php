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

    // get user photo
    public function getPhoto()
    {
        if ($this->photo) {
            return url('storage/avatars/128x128-'.Auth::user()->photo);
        }
        return url('assets/images/users/home-user.png');
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
     * Get the freelancerProfile associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function freelancer(): HasOne
    {
        return $this->hasOne(FreelancerProfile::class);
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

    /**
     * check user freelancer status
    */
    public function freelancerStatus()
    {
        if (is_null($this->email_verified_at)) {
            return route('verification.notice');
        }
        
        $route = 'freelancer.profile.create';
        switch ($this->freelancer->profile) {
            case 'pending':
                return route('freelancer.profile.create');
                break;
            
            case 'start':
                return route('freelancer.profile.create', ['page' => 'experience-level']);
                break;

            case 'experience_level':
                return route('freelancer.profile.create', ['page' => 'set-goal']);
                break;

            case 'goal':
                return route('freelancer.profile.create', ['page' => 'how-to-work']);
                break;

            case 'how_to_work':
                return route('freelancer.profile.create', ['page' => 'set-title']);
                break;

            case 'title':
                return route('freelancer.profile.create', ['page' => 'set-experience']);
                break;
        }
        return route('dashboard');
    }
}
