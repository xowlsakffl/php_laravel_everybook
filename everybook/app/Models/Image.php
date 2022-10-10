<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'up_name', 'real_name', 'size', 'extension', 'download', 'width', 'height', 'state', 
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
