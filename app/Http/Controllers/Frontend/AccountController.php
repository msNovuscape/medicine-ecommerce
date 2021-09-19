<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Notifications\ResetPassword;
use Session;

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
   public function forget_password(){
        return view('frontend.users.forget_password');
   }
   public function send_reset_link(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->get();
        
        if($user->isEmpty()){
          $message = "Your email is not registered.Enter registered email!";
        
          $request->session()->flash('alert-danger', $message);
          return redirect()->route('account.forget_password');
        }
        Session::forget('token');
        Session::put('token',$user->first()->id);
        $details = [

          'name' => $user->first()->name,

          'actionURL' => route('account.passwordResetForm',['token' => Session::get('token')]),


      ];

        $user->first()->notify(new ResetPassword($details));
          $request->session()->flash('alert-danger', 'Reset link successfully sent.Please check your email!');
          return redirect()->back();
        
   }
   public function passwordResetForm(Request $request){
        if($request['token'] == Session::get('token')){
          return view('frontend.users.reset_password_form');

        }
        return 'Unauthorized link';
   }
   public function reset_password(Request $request){
     if($request['password'] && $request['password'] != $request['confirm_password']){
          $message = "Passsword didn't matched!";
          
          $request->session()->flash('alert-warning', $message);
          return back();
         }
         if($request['password'] && $request['password'] == $request['confirm_password']){
              $user = User::findorfail(Session::get('token'));
              $user->update(['password' => bcrypt($request['password'])]);
              $message = "Password successfully changed!";
          
              $request->session()->flash('alert-success', $message);
              return redirect()->back();
         }
   }
}
