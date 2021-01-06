<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class signinController extends Controller
{
    //
    public function index(){
        return view('register.signin');
    }
    public function type(Request $req){
        // return view('register.signin');
        // dd(Auth::user()->type);

        if(Auth::user()->type=="photographer")
        {
            return redirect()->route('photographer.index');
        }
        else if(Auth::user()->type=="client")
        {
            return redirect()->route('client.index');
        }
        else if(Auth::user()->type=="admin")
        {
            return redirect()->route('admin.index');

        }
        // dd(Auth::user()->type);
    }
}
