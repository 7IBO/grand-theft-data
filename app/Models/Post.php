<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
