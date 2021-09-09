<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Medicine;
use App\Models\DisplayIn;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Testinomial;
use App\Models\Partner;
use App\Models\Company;
use App\Models\Composition;
use App\Models\Notification;
use App\Models\Prescription;
use App\Models\HealthExpert;
use App\Models\Search;
use App\Models\TempSale;
use App\Models\TempOrder;
use App\Models\Stock;
use App\Models\Page;
use Carbon;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $h0banners = Banner::where(['show_hide' => '1','banner_position' => 'h0'])->orderBy('id','desc')->get();
        $h1banners = Banner::where(['show_hide' => '1','banner_position' => 'h1'])->orderBy('id','desc')->get();
        $h2banners = Banner::where(['show_hide' => '1','banner_position' => 'h2'])->orderBy('id','desc')->get();
        $h3banners = Banner::where(['show_hide' => '1','banner_position' => 'h3'])->orderBy('id','desc')->get();
        $brands = Brand::where('parent_id','!=','0')->where('brand_type','!=','medicine')->where('status','1')->orderBy('id','desc')->limit(7)->get();
        $notification = Notification::where('display',true)->first();
        $wishlist_count = 0;
        if(auth()->user()){
            $wishlist_count = Wishlist::where('user_id',auth()->user()->id)->count();
        }
        $medicine_count = Medicine::count();
        // $display_in_featured  = DisplayIn::where('display_title','like','%Featured Products%')->get('id');
        // $display_in_recommended  = DisplayIn::where('display_title','like','%Recommended Products%')->get('id');
        // $display_in_trendings  = DisplayIn::where('display_title','like','%top selling%')->get('id');
        // $display_in_best_deals  = DisplayIn::where('display_title','like','%best deal%')->get('id');
        // $display_in_covid  = DisplayIn::where('display_title','like','%covid%')->get('id');
        // $display_in_essential_device  = DisplayIn::where('display_title','like','%medical device%')->get('id');
        // $display_in_cometic_health  = DisplayIn::where('display_title','like','%cosmetics%')->get('id');

        $featured_medicines = Medicine::where('display_in','like','%featured%')->orderBy('id','desc')->limit(8)->get();
        $recommended_medicines = Medicine::where('display_in','like','%recommended%')->orderBy('id','desc')->limit(10)->get();
        $trending_medicines = Medicine::where('display_in','like','%trending%')->orderBy('id','desc')->limit(8)->get();
        $best_deal_medicines = Medicine::where('display_in','like','%best_deal%')->orderBy('id','desc')->limit(8)->get();
        $covid_medicines = Medicine::where('display_in','like','%covid%')->orderBy('id','desc')->limit(8)->get();
        $home_essential_medicines = Medicine::where('display_in','like','%medical_device%')->orderBy('id','desc')->limit(8)->get();
        $cosmetic_health_medicines = Medicine::where('display_in','like','%cosmetics%')->orderBy('id','desc')->limit(8)->get();
       
        $testinomials = Testinomial::where('show_hide','1')->orderBy('id','desc')->get();
        $partners = Partner::where('show_hide','1')->orderBy('ordering')->get();
        
        return view('frontend.index',compact('h0banners','h1banners','h2banners','h3banners','brands','featured_medicines','recommended_medicines','trending_medicines','best_deal_medicines','covid_medicines','home_essential_medicines','cosmetic_health_medicines','testinomials','partners','wishlist_count','medicine_count','notification'));
    }

    public function product(Request $request){
        $product = Medicine::where('slug',$request->slug)->get();
        $brand = Brand::select('fullname','slug')->where('id',$product->first()->company_id)->get();
        $stock = Stock::where('medicine_id',$product->first()->id)->orderBy('id','desc');

        $composition = Composition::where('id',$product->first()->composition_id ?? null)->get();
        $isNarcotic = $composition->first()->is_narcotic ?? '0';
        $manufacture = Brand::where('id',$product->first()->parent_company_id)->get();
        $substitute_products = Medicine::where('composition_id' ,'>',0)->where('composition','like','%'.$product->first()->composition.'%')->limit(8)->get(); 
        $similar_products = Medicine::where('composition_id',0)->where('tags','like',$product->first()->tags)->limit(8)->get();
        $product = $product->first();
        return view('frontend.product',compact('product','manufacture','brand','similar_products','substitute_products','composition','isNarcotic','stock'));
    }

    public function shop(){
        
        $latest_medicines = Medicine::orderBy('id','desc')->paginate(10);
        
        return view('frontend.shop',compact('latest_medicines'));
    }

    public function add_to_cart(Request $request){
        $product = Medicine::find($request->id);
        $qtyToIncreaseBy = $request->qtyToIncreaseBy;
        $stock = Stock::where('medicine_id',$product->id)->orderBy('id','desc')->get();
        $product->sp_per_piece = $stock->first()->sp_per_tab ?? $product->sp_per_piece;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id,$qtyToIncreaseBy);
        $img = $cart->items[$product->id]['item'];
        $img_src = $img->img ?? $img->image_url;
        if($img_src == null){
            $img_src = "https://images.onlineaushadhi.com/img/no-med.png";
        }
        $request->session()->put('cart',$cart);
        return response()->json(['cart' => $cart,'img_src' => $img_src]);
    }

    public function quick_view(Request $request){
        $product = Medicine::find($request->id);
        return response()->json(['product' => $product,'url' => route('frontend.index')]);
    }

    public function search(Request $request){

        $keyword = $request->keyword;
        $ip = $request->ip();
        $session_id = session()->getId();
        $mytime = Carbon\Carbon::now();
        $mytime->toDateTimeString();
        Search::create([
        'date' => $mytime,
        'keywords' => $keyword ,
        'session' => $session_id,
        'ip' => $ip
        ]);
        $manufacture_id = Company::where('parent_id', 0)->where('fullname','like','%'.$keyword.'%')->get('id');
        $composition_id = Composition::where('composition','like', $keyword)->get('id');
        $brand_id = Brand::where('parent_id' ,'!=', 0)->where('fullname','like','%'.$keyword.'%')->get('id');
        $results = Medicine::where('medicine_name','like','%'.$keyword.'%')
                ->orWhere('composition','like','%'.$keyword)
                ->orWhere('parent_company_id', $manufacture_id->first()->id ?? null)
                ->orWhere('company_id', $brand_id->first()->id ?? null)
        ->limit(15)->orderBy('medicine_name')->get();
        foreach($results as $result){
            $parent_company_id  = Company::where('id',$result->parent_company_id)->first();
            $brand_id  = Brand::where('id',$result->company_id)->first();
            if($brand_id != null){
                $brand_name = $brand_id->fullname;
                $result->brand_name = $brand_name ?? 'N/A'; 
            }else{
                $result->brand_name = 'N/A';
            }
            if($parent_company_id != null){
                $company_name = $parent_company_id->fullname;
                $result->company_name = $company_name ?? 'N/A'; 
                
            }
            else{
                $result->company_name = 'N/A';
                
            }
            if($result->img == null && $result->image_url == null){
                $result->img = "https://images.onlineaushadhi.com/img/no-med.png";
            }
            else{
                $result->img = $result->img ?? $result->image_url;
            }
            $stock = Stock::where('medicine_id',$result->id)->orderBy('id','desc')->get('sp_per_tab');
            
            $result->sp_per_piece = $stock->first()->sp_per_tab ?? $result->sp_per_piece ;
            if($result->sp_per_piece == 0){
                $result->sp_per_piece = 'N/A';
            }
            
        }  

    //     foreach($results as $result){
    //         $ui = '<div class="col-12 col-lg-6">
    //         <div class="ps-product ps-product--horizontal">
    //             <div class="ps-product__thumbnail"><a class="ps-product__image"
    //         href="#">
    //         <figure><img src="'.$result->img ?? $result->image_url.'" alt="alt" /></figure>
    //     </a></div>
    // <div class="ps-product__content">
    //     <h5 class="ps-product__title"><a>'.$result->medicine_name.'</a></h5>
    //     <p class="ps-product__desc">'.$result->medicine_description.'</p>
    //     <div class="ps-product__meta"><span class="ps-product__price">Rs'.$result->sp_per_piece.'</span>
    //     </div></div> </div> </div>';
    //     };    
        return response()->json(['results' => $results,'url' => route('frontend.index')]);        
                

    }
    public function search_view(Request $request){
        $keyword = $request->keyword;
        $manufacture_id = Company::where('parent_id', 0)->where('fullname','like','%'.$keyword.'%')->get('id');
        $composition_id = Composition::where('composition','like', $keyword)->get('id');
        $brand_id = Brand::where('parent_id' ,'!=', 0)->where('fullname','like','%'.$keyword.'%')->get('id');
        $results = Medicine::where('medicine_name','like','%'.$keyword.'%')
                ->orWhere('composition','like','%'.$keyword)
                ->orWhere('parent_company_id', $manufacture_id->first()->id ?? null)
                ->orWhere('company_id', $brand_id->first()->id ?? null)
        ->limit(15)->orderBy('medicine_name')->get();
        foreach($results as $result){
            $parent_company_id  = Company::where('id',$result->parent_company_id)->first();
            $brand_id  = Brand::where('id',$result->company_id)->first();
            if($brand_id != null){
                $brand_name = $brand_id->fullname;
                $result->brand_name = $brand_name ?? 'N/A'; 
            }else{
                $result->brand_name = 'N/A';
            }
            if($parent_company_id != null){
                $company_name = $parent_company_id->fullname;
                $result->company_name = $company_name ?? 'N/A'; 
                
            }
            else{
                $result->company_name = 'N/A';
                
            }
            if($result->img == null && $result->image_url == null){
                $result->img = "https://images.onlineaushadhi.com/img/no-med.png";
            }
            else{
                $result->img = $result->img ?? $result->image_url;
            }
            $stock = Stock::where('medicine_id',$result->id)->orderBy('id','desc')->get('sp_per_tab');
            
            $result->sp_per_piece = $stock->first()->sp_per_tab ?? $result->sp_per_piece ;
            if($result->sp_per_piece == 0){
                $result->sp_per_piece = 'N/A';
            }
            
        }  
        return view('frontend.search_view',compact('results'));
    }

    public function upload_files(Request $request){
        if($request->hasFile('attachment')){
            $files = $request->file('attachment');
        }

    foreach ($files as $file) {
        $file->store('users/' . $this->user->id . '/messages');
    }

    }

    public function order_complete(Request $request){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $items = $cart->items;
        $image_id = Prescription::where('client_id',auth()->user()->id)->get('id');
        $session_id = session()->getId();
        $mytime = Carbon\Carbon::now();
        $mytime->toDateTimeString();
        $tempSale = TempSale::create([
        'date' => $mytime,
        'client_id' => auth()->user()->id ,
        'session_id' => $session_id,
        'image_id' => $image_id->first()->id ?? null,
        'total_amount' => $cart->totalPrice,
        ]);
        if($tempSale){
            foreach($items as $item){
                $img_src = $item['item']->img ?? $item['item']->image_url;
                if($img_src == null){
                $img_src = "https://images.onlineaushadhi.com/img/no-med.png";
    
                }
                TempOrder::create([
                    'session_id' => $session_id,
                    'user_id' => auth()->user()->id ,
                    'tempsales_id' => $tempSale->id,
                    'medicine_id' => $item['item']->id,
                    'medicine_name' => $item['item']->medicine_name,
                    'quantity' => $item['qty'],
                    'sp_per_piece' => $item['item']->sp_per_piece,
                    'img_src'   => $img_src,
                    'medicine_slug'  => $item['item']->slug,
                    
                ]);
            }
            Session::forget('cart');
        }
        
        return view('frontend.users.order_complete');
    }
    public function list_prescription(){
        $prescriptions = Prescription::where('client_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
        return view('frontend.users.prescription.index',compact('prescriptions'));
    }
    public function prescription(){
        return view('frontend.users.prescription.add');
    }
    public function add_prescription(Request $request){
       $mytime = Carbon\Carbon::now();
       $mytime->toDateString();
       

        if($request->hasFile('attachment')){
            $request->validate([
                'attachment' => 'required|file|mimes:pdf,docx,doc,png,jpeg,jpg',
            ]);
            $file = $request->file('attachment');

                $path = $file->store('img/prescription_img');

                Prescription::create([

                'remark' => $request['remarks'],
                'image_path' => $path ,
                'client_id' => auth()->user()->id,
                'date' => $mytime
                ]);
        }
        $request->session()->put('msg','Prescription successfully uploaded!');
        return redirect()->route('frontend.list_prescription');
    }

    public function delete_prescription(Request $request){
        $id = $request->id;
        $prescription = Prescription::find($id);
        $prescription->delete();
        return redirect()->back();
    }

    public function talk_to_health_expert(){
        $health_experts = HealthExpert::paginate(8);
        return view('frontend.talk_to_health_expert',compact('health_experts'));
    }
    public function products_by_brand(Request $request){
        $comapny_slug = $request->slug;
        $company_id = Company::where('slug',$comapny_slug)->get();
        $brand_name = $company_id->first()->fullname;
        $medicines = Medicine::where('company_id',$company_id->first()->id)->get();
        return view('frontend.products_by_brand',compact('medicines','brand_name'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function testinomial(){
        $testinomials = Testinomial::orderBy('id','desc')->paginate(8);
        return view('frontend.testinomial',compact('testinomials'));
    }
    public function privacy_policy(){
        return view('frontend.privacy_policy');
    }
    public function terms_and_conditions(){
        return view('frontend.terms_and_conditions');
    }
    public function return_policy(){
        return view('frontend.return_policy');
    }
    public function FAQs(){
        return view('frontend.FAQs');
    }
    public function cosmetic_view(){
        $cosmetic_health_medicines = Medicine::where('display_in','like','%cosmetics%')->orderBy('id','desc')->paginate(15);
        return view('frontend.cosmetic_view',compact('cosmetic_health_medicines'));
    }
    public function trending_view(){
        $trending_medicines = Medicine::where('display_in','like','%trending%')->orderBy('id','desc')->paginate(15);
        return view('frontend.trending_view',compact('trending_medicines'));
    }
    public function featured_product(){
        $featured_medicines = Medicine::where('display_in','like','%featured%')->orderBy('id','desc')->paginate(15);
        return view('frontend.featured_view',compact('featured_medicines'));
    }
    public function best_deal(){
        $best_deal_medicines = Medicine::where('display_in','like','%best_deal%')->orderBy('id','desc')->paginate(15);
        return view('frontend.best_deal_view',compact('best_deal_medicines'));
    }
    public function recommended_product(){
        $recommended_medicines = Medicine::where('display_in','like','%recommended%')->orderBy('id','desc')->paginate(15);
        return view('frontend.recommended_view',compact('recommended_medicines'));
    }
    public function covid_essential(){
        $covid_medicines = Medicine::where('display_in','like','%covid%')->orderBy('id','desc')->paginate(15);
        return view('frontend.covid_view',compact('covid_medicines'));
    }
    public function essential_health(){
        $essential_health_medicines = Medicine::where('display_in','like','%medical_device%')->orderBy('id','desc')->paginate(15);
        return view('frontend.essential_health_view',compact('essential_health_medicines'));
    }
    public function order_with_us(Request $request){
        $slug = $request->slug;
        $page = Page::where('urlcode',$slug)->get();

        return view('frontend.order_with_us',compact('page'));
    }
    public function manufacturer(Request $request){
        $slug = $request->slug;
        $parent_company_id = Company::where('parent_id','0')->where('slug',$slug)->get();
        $medicines = Medicine::where('parent_company_id',$parent_company_id->first()->id)->orderBy('id','desc')->paginate(15);
        return view('frontend.manufacturer',compact('medicines'));
    }
    public function composition(Request $request){
        $slug = $request->slug;
        $composition = Composition::where('slug',$slug)->get();
        $medicines = Medicine::where('composition_id', $composition->first()->id)->limit(8)->get(); 
        // $medicines = Medicine::where('composition_id',$composition->first()->id)->orderBy('id','desc')->get();
        return view('frontend.composition',compact('composition','medicines'));
    }
}
