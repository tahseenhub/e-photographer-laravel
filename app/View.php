<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public function shoot()
    {
        return $this->belongsTo('App\Shoot','shoot_id','id');
    }
}
