<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    Public function category(){
        return $this->belongsTo('App\Model\Category');
    }


}
