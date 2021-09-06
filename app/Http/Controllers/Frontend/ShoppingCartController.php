<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Medicine;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $recommended_medicines = Medicine::where('display_in','like','%recommended%')->orderBy('id','desc')->limit(10)->get();
        if (!Session::has('cart')){
            return view('frontend.users.shopping_cart',compact('recommended_medicines'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.users.shopping_cart',['products' => $cart->items,'totalPrice' => $cart->totalPrice, 'recommended_medicines' => $recommended_medicines]);

    }
    public function reduceByOne(Request $request)
    {
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($request->id);
        if (count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
            return response()->json(['route' => "/shopping_cart"]);

        }
        $cart = Session::get('cart');
        if(array_key_exists($request->id,$cart->items)){
            $qty = $cart->items[$request->id]['qty'];
            $price = $cart->items[$request->id]['price'];
            $totalPrice = $cart->totalPrice;
            return response()->json(['cart' => $cart,'price' => $price,'qty' => $qty,'totalPrice' => $totalPrice]);
        }else{
            return response()->json(['route' => "/shopping_cart"]);
        }
        


    }

    public function addByOne(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($request->id);
        Session::put('cart',$cart);
        $cart = Session::get('cart');
            $qty = $cart->items[$request->id]['qty'];
            $price = $cart->items[$request->id]['price'];
            $totalPrice = $cart->totalPrice;
            return response()->json(['cart' => $cart,'price' => $price,'qty' => $qty,'totalPrice' => $totalPrice]);

    }

    public function remove(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($request->id);
        if (count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');

        }

     return redirect()->route('shopping_cart.index');
    }
}
