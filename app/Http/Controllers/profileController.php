<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hire;
use Auth;

class profileController extends Controller
{
    public function index($id){
        $user_info=User::find($id);
        $shoots=$user_info->shoots;

        if(Auth::check())
        {
            $user = Auth::user();
            $carts=$user->carts;
            $chech_p_hire=Hire::where('client_id',Auth::user()->id)
                            ->where('photographer_id',$id)
                            ->orderBy('created_at','desc')->first();
            // dd($chech_p_hire);
            $client_hire=Hire::where('client_id',Auth::user()->id)->get();
            $hire_reqs_unseen=$user->photographer_req->where('views','unseen');
            // dd($client_hire[0]->id);
            return view('profile')->with(['user_info'=>$user_info,'shoots'=>$shoots,'carts'=>$carts,'chech_p_hire'=>$chech_p_hire,'client_hire'=>$client_hire,'hire_reqs_unseen'=>$hire_reqs_unseen]);    
        } else {
            return view('profile')->with(['user_info'=>$user_info,'shoots'=>$shoots]);    
        }
        

        
    }
}
