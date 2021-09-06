<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(){
        return view('frontend.users.login_form');
    }

    public function post_login(Request $request)
    {
        
        $user = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
        if($user) {
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('account.index');
        }
        
        $message = "Your email or password is incorrect!Please try again.";
        
        $request->session()->flash('alert-danger', $message);
        // session()->flash('error', $message);
        return redirect()->route('login');
    }

    public function password_reset(){

    }
    
    public function logout(){
        auth()->logout();
        return redirect()->route('frontend.index');

    }
}