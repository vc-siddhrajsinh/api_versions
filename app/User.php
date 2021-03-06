<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    const STATUS_ACTIVE_TEXT = "Enabled";
    const STATUS_INACTIVE_TEXT = "Disabled";

    public function posts()
    {
        return $this->hasMany(Post::class, "user_id", "id");
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id", "id");
    }
}
