<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mass assignment
    protected $fillable = ['title', 'content'];

    # Use user() to get the owner of a post
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
