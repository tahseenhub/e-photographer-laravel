<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shoot;
use App\Categories;
use App\Like;
use App\View;
use App\Hire;


use Auth;

class clientController extends Controller
{
    //
    public function index(){
        $shoots=Shoot::orderBy('view','desc')->take(10)->get();
        foreach ($shoots as $shoot) {
            $views=View::where('shoot_id',$shoot->id)->get();
            $shoot=Shoot::find($shoot->id);
            $shoot->view=count($views);
            $shoot->save();

            $likes=Like::where('shoot_id',$shoot->id)->get();
            $shoot=Shoot::find($shoot->id);
            $shoot->like=count($likes);
            $shoot->save();
        }

        $user = Auth::user();
        $carts=$user->carts;
        // dd($carts);
        return view('client.home')->with(['shoots'=>$shoots,'carts'=>$carts]);
    }
    public function profile(){
        $user = Auth::user();
        $shoots=$user->shoots;

        $carts=$user->carts;
        return view('client.profile')->with(['shoots'=>$shoots,'carts'=>$carts]);
    }
    public function profileUpdate(Request $req){
        // dd($req->all());
        $req->validate([
            'name' => 'required|string|max:190',
            'tagline' => 'nullable|string|max:190',
            'facebook' => 'nullable|string|max:190',
            'instagram' => 'nullable|string|max:190',
            'address' => 'nullable|string|max:190',
        ]);
        $user= User::find(Auth::user()->id);
        $user->name=$req->name;
        $user->tagline=$req->tagline;
        $user->facebook=$req->facebook;
        $user->instagram=$req->instagram;
        $user->address=$req->address;
        $user->save();
        return redirect()->back();
        // dd($user);
    }
    public function ajaxShootsCategory($category){
        if($category=="trend")
        {
            $shoots=Shoot::orderBy('view','desc')->take(10)->get();
            return view('client.ajaxShootsCategory')->with('categoey_shoots',$shoots);
        }else{
            $category_id=Categories::where('category',$category)->get();
            // dd($category_id[0]->id);
            $categoey_shoots=Shoot::where('category_id',$category_id[0]->id)->take(10)->get();
            return view('client.ajaxShootsCategory')->with('categoey_shoots',$categoey_shoots);
        } 
        
    }
    public function hirePhotographer(Request $req)
    {
        $req->validate([
            'payment' => 'required|numeric|digits_between:1,10',
            'event_image' => 'nullable|image',
            'event_name' => 'required|string|max:190',
            'event_location' => 'required|string|max:190',
            'event_link' => 'nullable|string|max:190',
            'about_event' => 'nullable|string|max:190',
        ]);
        $hire=new Hire;
        $hire->client_id=Auth::user()->id;
        $hire->photographer_id=$req->photographer_id;
        $hire->event_name=$req->event_name;
        $hire->payment=$req->payment;
        $hire->event_image=$req->event_image;
        $hire->event_location=$req->event_location;
        $hire->event_link=$req->event_link;
        $hire->event_description=$req->event_description;
        // $hire->status=$req->status;
        $hire->save();

        // $client_hire=Hire::where('client_id',Auth::user()->id);
        // ($client_hire[0]->id);
        // dd(count($client_hire));

        return redirect()->back();        
    }
}
