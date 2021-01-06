<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    public function owner(){
        return $this->belongsTo('App\User','client_id','id');
    }
    public function employeer(){
        return $this->belongsTo('App\User','photographer_id','id');
    }
}
