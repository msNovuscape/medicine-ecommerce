<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register','App\Http\Controllers\Frontend\RegisterController@register')->name('register');
    Route::post('/post_register','App\Http\Controllers\Frontend\RegisterController@post_register')->name('post_register');
    Route::get('/login','App\Http\Controllers\Frontend\LoginController@login')->name('login');

    Route::post('/post_login','App\Http\Controllers\Frontend\LoginController@post_login')->name('post_login');
    Route::get('/forget_password','App\Http\Controllers\Frontend\AccountController@forget_password')->name('account.forget_password');
    Route::post('/send_reset_link','App\Http\Controllers\Frontend\AccountController@send_reset_link')->name('account.send_reset_link');
    Route::get('/reset-password/{token}','App\Http\Controllers\Frontend\AccountController@passwordResetForm')->name('account.passwordResetForm');
    Route::post('/reset_password','App\Http\Controllers\Frontend\AccountController@reset_password')->name('account.reset_password');
    

    
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout','App\Http\Controllers\Frontend\LoginController@logout')->name('logout');

    Route::get('/account','App\Http\Controllers\Frontend\AccountController@index')->name('account.index');
    Route::post('/account','App\Http\Controllers\Frontend\AccountController@update')->name('account.update');
    Route::get('/wishlist','App\Http\Controllers\Frontend\WishlistController@index')->name('wishlist.index');
    Route::get('/add_wishlist','App\Http\Controllers\Frontend\WishlistController@add')->name('wishlist.add');
    Route::get('/remove_wishlist','App\Http\Controllers\Frontend\WishlistController@remove')->name('wishlist.remove');
    Route::get('/purchase','App\Http\Controllers\Frontend\PurchaseController@index')->name('purchase.index');
    Route::get('/order','App\Http\Controllers\Frontend\OrderController@index')->name('order.index');
    Route::get('/order_complete','App\Http\Controllers\Frontend\FrontendController@order_complete')->name('frontend.order_complete');
    Route::get('/prescription','App\Http\Controllers\Frontend\FrontendController@prescription')->name('frontend.prescription');
    Route::post('/add_prescription','App\Http\Controllers\Frontend\FrontendController@add_prescription')->name('frontend.add_prescription');
    Route::get('/list_prescription','App\Http\Controllers\Frontend\FrontendController@list_prescription')->name('frontend.list_prescription');
    Route::get('/delete_prescription','App\Http\Controllers\Frontend\FrontendController@delete_prescription')->name('frontend.delete_prescription');
    Route::get('/view_details','App\Http\Controllers\Frontend\PurchaseController@view_details')->name('purchase.view_details');
    
});
    Route::get('/','App\Http\Controllers\Frontend\FrontendController@index')->name('frontend.index');
    Route::get('/shop','App\Http\Controllers\Frontend\FrontendController@shop')->name('frontend.shop');
    Route::get('/add_to_cart','App\Http\Controllers\Frontend\FrontendController@add_to_cart')->name('frontend.add_to_cart');
    Route::get('/shopping_cart','App\Http\Controllers\Frontend\ShoppingCartController@index')->name('shopping_cart.index');
    Route::get('/reduceByone','App\Http\Controllers\Frontend\ShoppingCartController@reduceByone')->name('shopping_cart.reduceByOne');
    Route::get('/addByOne','App\Http\Controllers\Frontend\ShoppingCartController@addByOne')->name('shopping_cart.addByOne');
    Route::get('/remove','App\Http\Controllers\Frontend\ShoppingCartController@remove')->name('shopping_cart.remove');
    Route::get('/products/{slug}','App\Http\Controllers\Frontend\FrontendController@product')->name('frontend.product');
    Route::get('/search','App\Http\Controllers\Frontend\FrontendController@search')->name('frontend.search');
    Route::post('/search_result','App\Http\Controllers\Frontend\FrontendController@search_view')->name('frontend.search_view');

    Route::get('/quick_view','App\Http\Controllers\Frontend\FrontendController@quick_view')->name('frontend.quick_view');
    Route::get('/talk_to_health_expert','App\Http\Controllers\Frontend\FrontendController@talk_to_health_expert')->name('frontend.talk_to_health_expert');
    Route::get('/brand/{slug}','App\Http\Controllers\Frontend\FrontendController@products_by_brand')->name('frontend.products_by_brand');
    
    Route::get('/about','App\Http\Controllers\Frontend\FrontendController@about')->name('frontend.about');
    Route::get('/testinomial','App\Http\Controllers\Frontend\FrontendController@testinomial')->name('frontend.testinomial');
    Route::get('/privacy_policy','App\Http\Controllers\Frontend\FrontendController@privacy_policy')->name('frontend.privacy_policy');
    Route::get('/terms_and_conditions','App\Http\Controllers\Frontend\FrontendController@terms_and_conditions')->name('frontend.terms_and_conditions');
    Route::get('/return_policy','App\Http\Controllers\Frontend\FrontendController@return_policy')->name('frontend.return_policy');
    Route::get('/FAQs','App\Http\Controllers\Frontend\FrontendController@FAQs')->name('frontend.FAQs');
    Route::get('/personal-care','App\Http\Controllers\Frontend\FrontendController@cosmetic_view')->name('frontend.cosmetic_view');
    Route::get('/trending-products','App\Http\Controllers\Frontend\FrontendController@trending_view')->name('frontend.trending_view');
    Route::get('/featured_product','App\Http\Controllers\Frontend\FrontendController@featured_product')->name('frontend.featured_product');
    Route::get('/best_deal','App\Http\Controllers\Frontend\FrontendController@best_deal')->name('frontend.best_deal');
    Route::get('/recommended_product','App\Http\Controllers\Frontend\FrontendController@recommended_product')->name('frontend.recommended_product');
    Route::get('/covid_essential','App\Http\Controllers\Frontend\FrontendController@covid_essential')->name('frontend.covid_essential');
    Route::get('/essential_health','App\Http\Controllers\Frontend\FrontendController@essential_health')->name('frontend.essential_health');
    Route::get('/manufacturer/{slug}','App\Http\Controllers\Frontend\FrontendController@manufacturer')->name('frontend.manufacturer');
    Route::get('/composition/{slug}','App\Http\Controllers\Frontend\FrontendController@composition')->name('frontend.composition');
    Route::get('/pages/{slug}','App\Http\Controllers\Frontend\FrontendController@order_with_us')->name('frontend.order_with_us');
    
    
