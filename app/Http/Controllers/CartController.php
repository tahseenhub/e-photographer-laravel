<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Auth;


class CartController extends Controller
{
    public function ajaxAddToCart($shoot_id,$user_id)
    {
        // $cart=Cart::all();
        $error="error";
        $success="success";
        $cart=Cart::where('user_id',$user_id)->get();

        
        foreach ($cart as $CheckCart) {
            if($CheckCart->shoot_id==$shoot_id){
                return view('ajaxAddToCart')->with(['message'=>$error,'carts'=>$cart]);
            }
        }
        
            $add_cart=new Cart;
            $add_cart->user_id=$user_id;
            $add_cart->shoot_id=$shoot_id;
            $add_cart->save();

            $user = Auth::user();
            $carts=$user->carts;
            return view('ajaxAddToCart')->with(['message'=>$success,'carts'=>$cart]);    
        
            
    }
    public function cartDelete($cart_id)
    {
        Cart::destroy($cart_id);
        return redirect()->back();
    }
}
