<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 use HasFactory;

    protected $fillable = ['text','image','user_id','file'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'post_id');
    }

    public function getAvatarAttribute()
    {
        return url('storage/public/post'.$this->attributes['image']);
    }
}
