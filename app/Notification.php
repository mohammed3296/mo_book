<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     public function feeds(){
        return $this->hasMany('App\Feed');
    }
}
