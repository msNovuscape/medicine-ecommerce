<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
   public function index(){
        $user = Auth::user();
        
       return view('frontend.users.account',compact('user'));
   }
   public function update(Request $request){
       
       
       if($request['password'] && $request['password'] != $request['confirm_password']){
        $message = "Passsword didn't matched!";
        
        $request->session()->flash('alert-warning', $message);
        return back();
       }
       if($request['password'] && $request['password'] == $request['confirm_password']){
            Auth::user()->update(['password' => bcrypt($request['password'])]);
            $message = "Successfully updated!";
        
            $request->session()->flash('alert-success', $message);
            return back();
       }
       Auth::user()->update($request->all());
       $message = "Successfully updated!";
        
        $request->session()->flash('alert-success', $message);
        return back();
   }
}
