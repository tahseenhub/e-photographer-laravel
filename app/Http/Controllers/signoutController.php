<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signoutController extends Controller
{
    public function index()
    {
        return redirect("/home");
    }
}
