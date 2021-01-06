<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hire;
use Auth;

class EventsController extends Controller
{
    public function eventDetails($event_id){
        $event_info=Hire::find($event_id);
        // return "hshd";
        return view('ajaxEventDetails',['event_info'=>$event_info]);
    }
    public function allEvents(){
        $user = Auth::user();
        // dd($user);
        $carts=$user->carts;

        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');
        if($user->type=="photographer"){
            $myEvents=$user->photographer_req;
        }else
            $myEvents=$user->client_req;
        // dd($myEvents);
        return view('allEvents')->with(['carts'=>$carts,'myEvents'=>$myEvents,'hire_reqs_unseen'=>$hire_reqs_unseen]);
        return "";
    }
    public function deleteEvent($event_id)
    {
        Hire::destroy($event_id);
        return redirect()->back();

    }
}
