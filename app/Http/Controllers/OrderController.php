<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Order;
use App\Shoot;

class OrderController extends Controller
{
    public function orderPage($cart_id)
    {
        $user = Auth::user();
        $carts=$user->carts;

        $cart=Cart::find($cart_id);
        // dd($cart);
        return view('orders.home')->with(['carts'=>$carts,'cart'=>$cart]);
    }
    public function orderConfirmation(Request $req)
    {
        $req->all();
        $cart_id=$req->cart_id;
        // $cart=Cart::find($cart_id);
        // dd($cart->user->name);
        // dd($cart->shoot->caption);
        // dd($req->address);
        // $req->validate([
        //     'shipping_address' => 'required|string|max:190',
        //     'cart_id' => 'unique:orders',
        // ]);
        $order=new Order();
        $order->cart_id=$cart_id;
        $order->shipping_address=$req->address;
        $order->save();

        $shoots=Shoot::orderBy('view','desc')->take(10)->get();
        $user = Auth::user();
        $carts=$user->carts;
        // dd($carts);
        return view('client.home')->with(['shoots'=>$shoots,'carts'=>$carts]);
    }
}
