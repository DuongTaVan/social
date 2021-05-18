<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public $appends = ["urlAvatar"];

    public function getUrlAvatarAttribute($key)
    {
        return config('app.url') . '/storage' . $this->avatar;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post', 'created_by', 'id');
    }

    public function userFrom()
    {
        return $this->hasMany('App\Models\Friend', 'from_id', 'id');
    }

    public function userTo()
    {
        return $this->hasMany('App\Models\Friend', 'to_id', 'id');
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messageTo()
    {
        return $this->hasMany('App\Models\Message', 'to_id', 'id');
    }
    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messageFrom()
    {
        return $this->hasMany('App\Models\Message', 'from_id', 'id');
    }

    public function getUsersAttribute()
    {
        return $this->userFrom->merge($this->userTo);
    }
}
