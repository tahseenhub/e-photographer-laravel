<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoot;
use App\User;
Use App\Cart;
Use App\Feedback;
Use App\Categories;
use Illuminate\Support\Facades\DB;
use Auth;

class messengerController extends Controller
{
    public function index(){
        $users=DB::select('select * from users where id!=?',[Auth::user()->id]);
        $chats=array();
        $selected_id=null;

        $user = Auth::user();
        $carts=$user->carts;
        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');

        return view('messenger',['users'=>$users, 'chats'=>$chats, 'selected_id'=>$selected_id, 'currentUser'=>Auth::user()->id, 'carts'=>$carts, 'hire_reqs_unseen'=>$hire_reqs_unseen]);
    }
    public function selectUser($receiver_id){
        // refreashMessage($receiver_id);
        $selected_id=$receiver_id;
        $users=DB::select('select * from users where id!=?',[Auth::user()->id]);
        $chats=DB::select('select * from messengers where (sender_id = ? and receiver_id = ?) or (sender_id = ? and receiver_id = ?)', [Auth::user()->id,$selected_id, $selected_id,Auth::user()->id]);
        $user = Auth::user();
        $carts=$user->carts;
        $hire_reqs_unseen=$user->photographer_req->where('views','unseen');

        return view('messenger',['users'=>$users, 'chats'=>$chats, 'selected_id'=>$selected_id, 'currentUser'=>Auth::user()->id, 'carts'=>$carts, 'hire_reqs_unseen'=>$hire_reqs_unseen]); 
               
    }
    public function sendMessage(Request $request, $receiver_id){
        
        $message=$request->message;
        $selected_id=$receiver_id;
        if($message){
            $users=DB::select('select * from users where id!=?',[Auth::user()->id]);
            DB::select('insert into messengers(sender_id, receiver_id, message) values(?,?,'.'?'.')',[Auth::user()->id,$selected_id, $message]);
            $chats=DB::select('select * from messengers where (sender_id = ? and receiver_id = ?) or (sender_id = ? and receiver_id = ?)', [Auth::user()->id,$selected_id, $selected_id,Auth::user()->id]);
            
            $user = Auth::user();
            $carts=$user->carts;
            $hire_reqs_unseen=$user->photographer_req->where('views','unseen');

            return view('messenger',['users'=>$users, 'chats'=>$chats, 'selected_id'=>$selected_id, 'currentUser'=>Auth::user()->id, 'carts'=>$carts, 'hire_reqs_unseen'=>$hire_reqs_unseen]);            
        }else{
            return redirect()->back();
            
        }
        
    }
    
}
