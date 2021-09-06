<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function register(){
        return view('frontend.users.register_form');
    }
    

    public function post_register(Request $request){
        
        $validation = $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        if(!$validation){
            $message = "Email already registered!";
            
            $request->session()->flash('alert-validation-warning', $message);
            return back();
        }
        if($request['password'] && $request['password'] != $request['confirm_password']){
            $message = "Passsword didn't matched!";
            
            $request->session()->flash('alert-validation-warning', $message);
            return back();
           }
         $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'password' => bcrypt($request['password']),
        ]);
        Auth::loginUsingId($user->id);
        if($user) {
            return redirect()->route('account.index');
        }
    }
}
