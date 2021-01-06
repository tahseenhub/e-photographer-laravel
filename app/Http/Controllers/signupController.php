<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    //
    public function index(){
        return view('register.signup');
    }
    public function photographer(){
        return view('register.signup_photographer');
    }
    public function client(){
        return view('register.signup_client');
    }
}

