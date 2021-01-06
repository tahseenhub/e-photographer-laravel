<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoot extends Model
{
    public function categories(){
        return $this->belongsTo('App\Categories','category_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','shoot_id','id');
    }
}
