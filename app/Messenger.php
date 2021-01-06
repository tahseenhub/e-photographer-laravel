<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    public function chatFriend(){
        return $this->belongsTo('App\User','sender_id','id');
    }
}
