<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempSale;
use App\Models\TempOrder;

class OrderController extends Controller
{
    public function index(){
        $sales = TempSale::where('client_id',auth()->user()->id)->where('order_status','!=',2);
        $orders = TempOrder::whereIn('tempsales_id',$sales->get('id'))->paginate(10);
        
       return view('frontend.users.order',compact('orders','sales'));
    }
}
