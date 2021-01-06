<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExbImages extends Model
{
    public function exhibition()
    {
        return $this->belongsTo('App\Exhibition','exhibition_id','id');
    }
}
