<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'animal';
    protected $fillable = ['name', 'image', 'color', 'cost', 'description', 'id_user'];
}

