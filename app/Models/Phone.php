<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    #Phone belongs to a user
    #get the owner of the phone using user()
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
