<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     public function users(){
        return $this->belongsTo('App\User');
    }


      public function posts(){
        return $this->belongsTo('App\Post');
    }
}
