<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Medicine;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index(){
        $medicine_ids = Wishlist::where('user_id',auth()->user()->id)->get('medicine_id');
        $wishlist_medicines = Medicine::whereIn('id',$medicine_ids)->orderBy('id','desc')->paginate(10);
    
        return view('frontend.users.wishlist',compact('wishlist_medicines'));
    }
    public function add(Request $request){
        $prodcut_id = $request->id;
        $intended_url = Session::get('url.intended', url('/'));
        $intended_url_id = explode('=',$intended_url);
        $prodcut_id = $prodcut_id ?? last($intended_url_id);
        
        $user_id = auth()->user()->id;
        $wishlist = Wishlist::where('medicine_id',$prodcut_id)->get();
        if($wishlist->isEmpty()){
            Wishlist::create(['user_id' => $user_id,'medicine_id' => $prodcut_id]);
        }
        $count = Wishlist::where('user_id',auth()->user()->id)->count();
        $img = Medicine::find($prodcut_id);
        $img_src = $img->img ?? $img->image_url;
        if($img_src == null){
            $img_src = "https://images.onlineaushadhi.com/img/no-med.png";
        }
        if($prodcut_id == $intended_url_id){
            return redirect()->route('wishlist.index');
        }
        return response()->json(['count' => $count,'img_src' => $img_src,'url' => route('wishlist.index')]);
    }
    public function remove(Request $request){
        $medicine_id = $request->medicine_id;
        
        $user_id = auth()->user()->id;
        Wishlist::where(['user_id' => $user_id,'medicine_id' => $medicine_id])->delete();
        return redirect()->route('wishlist.index');

    }
}
