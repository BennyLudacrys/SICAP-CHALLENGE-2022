<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'district',
        'province',
        'cellphone',
        'city',
        'profession',
        'profile_photo'
    ];

    public $appends = [
        'profile_image_url',
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

    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('/uploads/profile_images/' . $this->profile_photo);
        } else {
            return 'https://ui-avatars.com/api/?background=random&name=' . urlencode($this->name);
        }
    }
}
