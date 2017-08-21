<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'address','phone'];
}

