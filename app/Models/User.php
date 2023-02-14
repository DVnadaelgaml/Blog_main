<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'phone','age','gender','image'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function getAvatarAttribute()
    {
        return url('storage/public/profiles'.$this->attributes['image']);
    }
}
