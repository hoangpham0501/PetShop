<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'animal';
    protected $fillable = ['name', 'image', 'description'];
}