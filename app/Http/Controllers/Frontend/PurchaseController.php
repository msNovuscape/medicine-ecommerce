<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Order;

class PurchaseController extends Controller
{
   public function index(){
       $purchases = Purchase::where('client_id',auth()->user()->id)->orderBy('id','desc')->paginate(15);
       return view('frontend.users.purchase_history',compact('purchases'));
   }
   public function view_details(Request $request){
       $details = Order::where('sales_id',$request->id)->get();
       return response()->json(['details' => $details,'url' => route('frontend.index')]);

   }
}
