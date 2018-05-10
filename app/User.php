<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

     public function comments(){
        return $this->hasMany('App\Comment');
    }

     public function notes(){
        return $this->hasMany('App\Note');
    }

      public function reports(){
        return $this->hasMany('App\Reports');
    }

      public function followers(){
        return $this->hasMany('App\Follower');
    }

       public function feeds(){
        return $this->hasMany('App\Feed');
    }

     public function blocks(){
        return $this->hasMany('App\Block');
    }

      public function feedbacks(){
        return $this->hasMany('App\Feedback');
    }
}
