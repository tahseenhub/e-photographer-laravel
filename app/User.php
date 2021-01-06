<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'image', 'type', 'facebook', 'instagram', 'tagline', 'status','rating','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function shoots(){
        return $this->hasMany('App\Shoot','user_id','id');
    }
    public function carts(){
        return $this->hasMany('App\Cart','user_id','id');
    }
    public function photographer_req(){
        return $this->hasMany('App\Hire','photographer_id','id');
    }
    public function client_req(){
        return $this->hasMany('App\Hire','client_id','id');
    }
    // public function chatlist(){
    //     return $this->hasMany('App\Messenger','sender_id','id');
    // }
    // public function sport_shoots(){
    //     return $this->hasMany('App\SportShoot','user_id','id');
    // }
}
