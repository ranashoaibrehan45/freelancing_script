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
use Auth;

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
        'dob',
        'role',
        'address',
        'apt',
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

    public function getDob()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $this->dob)->format('d-m-Y');
    }

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
     * Get the nexmo request with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nexmo(): HasOne
    {
        return $this->hasOne(NexmoVerifyRequest::class);
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
     * Get user language proficiency
     * @param $languageId
     * @return proficiency Id
     */
    public function lanProficiency($languageId = 0)
    {
        return $this->languages()->where('language_id', $languageId)->first()->language_proficiency_id;
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
     * Get all of the experiences for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(FreelancerExperience::class);
    }

    /**
     * Get all of the skills for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(FreelancerSkill::class);
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
            case 'experience':
                return route('freelancer.profile.create', ['page' => 'set-experience']);
                break;

            case 'education':
                return route('freelancer.profile.create', ['page' => 'set-education']);
                break;

            case 'languages':
                return route('freelancer.profile.create', ['page' => 'set-language']);
                break;

            case 'skills':
                return route('freelancer.profile.create', ['page' => 'set-skills']);
                break;

            case 'bio':
                return route('freelancer.profile.create', ['page' => 'set-overview']);
                break;

            case 'services':
                return route('freelancer.profile.create', ['page' => 'set-services']);
                break;

            case 'hourly_rate':
                return route('freelancer.profile.create', ['page' => 'set-rate']);
                break;

            case 'details':
                return route('freelancer.profile.create', ['page' => 'set-details']);
                break;
        }
        return route('dashboard');
    }
}
