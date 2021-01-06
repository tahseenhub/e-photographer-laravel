<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/signin/type';

    protected function authenticated($request, $user)
    {
        // dd($user);
        if ( $user->type == 'admin' ) {// do your margic here
            return redirect()->route('admin.index');
        }
        else if ( $user->type == 'photographer' ) {// do your margic here
            return redirect()->route('photographer.index');
        }
        else if ( $user->type == 'client' ) {// do your margic here
            return redirect()->route('client.index');
        }
        return redirect('/home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('hello');
        $this->middleware('guest')->except('logout');
    }
    // public function username(){
    //     return 'email';
    // }


    
}
