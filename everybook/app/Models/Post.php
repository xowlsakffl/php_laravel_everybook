<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->select(['name', 'username']);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function coments(){
        return $this->hasMany(Coment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
