<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Public function posts(){
        return $this->hasMany('App\Model\Post');
    }
}
