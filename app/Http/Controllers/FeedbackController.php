<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feedback;

class FeedbackController extends Controller
{
    public function index(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email|max:190',
            'feedback' => 'required|string',
        ]);
        $feedback=new Feedback;
        $feedback->email=$req->email;
        $feedback->feedback=$req->feedback;
        $feedback->save();
        return redirect()->back();
    }
}
