<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
  public function users(){
        return $this->belongsTo('App\User');
    }

   public function notifications(){
        return $this->belongsTo('App\Notification');
    }
}
