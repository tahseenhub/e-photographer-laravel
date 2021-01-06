<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    public function exb_images()
    {
        return $this->hasMany('App\ExbImages','exhibition_id','id');
    }
}
