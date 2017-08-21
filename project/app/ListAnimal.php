<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListAnimal extends Model
{
    protected $table = 'animal';
    protected $fillable = ['name', 'image', 'description'];
}
