<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function shoot()
    {
        return $this->belongsTo('App\Shoot','shoot_id','id');
    }
}
