<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{URL::asset('img/favicon_oa.png')}}" rel="apple-touch-icon-precomposed">
    <link href="{{URL::asset('img/favicon_oa.png')}}" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Online Ausadhi</title>
    <link rel="stylesheet" href="{{URL::asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('fonts/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="preconnect" href="{{URL::asset('https://fonts.gstatic.com/')}}">
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="{{URl::asset('plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/lightGallery/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/lightGallery/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/noUiSlider/nouislider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/home.css')}}">
</head>

<body>
    <div class="ps-page">
        <header class="ps-header ps-header--1">
            <div class="ps-noti">
                <div class="container">
                    
                    <p class="m-0">{{App\Models\Notification::where('display',true)->first()->message}}</p>
                </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
            </div>
            
            <div class="ps-header__top">
                <div class="container">
                    <div class="ps-header__text">Need help? <strong>+977 9841568568</strong></div>
                </div>
            </div>
            <div class="ps-header__middle">
                <div class="container">
                    <div class="ps-logo"><a href="{{route('frontend.index')}}"> <img src="{{URL::asset('img/logo_oa.png')}}" alt><img class="sticky-logo"
                                src="{{URL::asset('img/logo_oa.png')}}" alt></a></div><a class="ps-menu--sticky" href="#"><i
                            class="fa fa-bars"></i></a>
                    <div class="ps-header__right">
                        
                        <ul class="ps-header__icons">
                            <div style = "color:#103178">
                            @auth
                            Welcome,{{auth()->user()->name}}
                        @endauth
                            </div>   
                            <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li>
                            <li><a class="ps-header__item" href="#" id="login-modal"><i class="icon-user"></i></a>
                                @auth
                                <div class="ps-login--modal">
                                    
                                    <a href="{{route('account.index')}}" class="ps-btn ps-btn--lblue mb-10">My Account</a>
                                    <a href="{{route('logout')}}" class="ps-btn ps-btn--primary">Log Out</a>
                                </div>
                                @endauth
                                @guest
                                <div class="ps-login--modal">
                                    <form method="post" action="{{route('post_login')}}">
                                        @csrf
                                        <!-- <div class="flash-message">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                            @if(Session::has('alert-' . $msg))

                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                            @endif
                                            @endforeach
                                        </div> -->
                                        <div class="form-group">
                                            <label>Username or Email Address</label>
                                            <input class="form-control" type="text" name = 'email' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name = "password" required>
                                        </div>
                                        <div class="form-group form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label>Remember Me</label><br/>
                                        <p><a style = "margin-top:5px" href="">Lost your password?</a></p>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="ps-btn ps-btn--lblue" type="submit">Log In</button>

                                            </div>
                                            <div class="col-lg-6">
                                                <a href="{{route('register')}}" class="ps-btn ps-btn--lblue">Register</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endguest
                            </li>
                            <li><a data-toggle="tooltip" data-placement="bottom" title="Wishlist"class="ps-header__item" href="{{route('wishlist.index')}}"><i class="fa fa-heart-o"></i>
                            @if(auth()->user())<span id = "ajaxWishlist" class="badge">{{App\Models\Wishlist::where('user_id',auth()->user()->id)->count()}}</span>@endif</a></li>
                            <li><a class="ps-header__item" href="#" id="cart-mini"><i class="icon-cart-empty"></i>
                            @if(Session::has('cart'))
                                  <span id="totalQty" class="badge">
                                      {{count(Session::get('cart')->items)}}
                                  </span>
                                @else
                                    <span id="totalQty" class="badge" style="display: none">
                                  </span>
                                @endif
                            </a>
                                <div class="ps-cart--mini">
                                    @if(Session::has('cart'))
                                            <ul class="ps-cart__items">
                                            @foreach(Session::get('cart')->items as $product)
                                                <li class="ps-cart__item">
                                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                                            href="{{route('frontend.product',['slug' => $product['item']->slug])}}">@if($product['item']->img == null && $product['item']->image_url == null)<img src = "https://images.onlineaushadhi.com/img/no-med.png">@endif<img src="{{$product['item']->img ?? $product['item']->image_url}}"
                                                               /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name"
                                                                href="{{route('frontend.product',['slug' => $product['item']->slug])}}">{{$product['item']->medicine_name}}({{$product['qty']}})</a>
                                                            <p class="ps-product__meta"> <span class="ps-product__price">Rs
                                                                    {{$product['item']->sp_per_piece}}</span></p>
                                                        </div><a class="ps-product__remove" href="{{route('shopping_cart.remove',['id' => $product['item']['id']])}}"><i
                                                                class="icon-cross"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach    
                                                <!-- <li class="ps-cart__item">
                                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                                            href="product-default.html"><img src="img/products/001.jpg"
                                                                alt="alt" /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name"
                                                                href="product-default.html">Digital Thermometer X30-Pro</a>
                                                            <p class="ps-product__meta"> <span class="ps-product__sale">Rs
                                                                    77.65</span><span class="ps-product__is-price">Rs
                                                                    80.65</span></p>
                                                        </div><a class="ps-product__remove" href="javascript: void(0)"><i
                                                                class="icon-cross"></i></a>
                                                    </div>
                                                </li> -->
                                            </ul>
                                            <div class="ps-cart__total"><span>Subtotal </span><span>Rs {{Session::get('cart')->totalPrice}}</span></div>
                                            <div class="ps-cart__footer">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <a class="ps-btn ps-btn--lblue" href="{{route('shopping_cart.index')}}">View
                                                            Cart</a>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="ps-btn ps-btn--lblue" onclick = "javascript:confirm_order_from_master({{Session::get('cart')->totalPrice}})" route="{{route('frontend.order_complete')}}" id = "confirm_order_from_master">Checkout</a>

                                                    </div>
                                                </div>
                                            </div>
                                        
                                    @else
                                        <p>You haven't added any items in your cart.Please search and add items that you are looking for and complete the order process.</p>
                                        
                                    @endif
                                </div>
                            </li>
                        </ul>


                        <!-- Upload your prescription modal -->
                        <div class="ps-language-currency"><a class="ps-dropdown-value ps-btn cs_btn_prescription"
                                href="{{route('frontend.prescription')}}"><i
                                    class="fa fa-camera" aria-hidden="true"></i>
                                Upload Your Prescription</a>
                        </div>
                        


                        <!-- Search Bar -->
                        <div class="ps-header__search">
                            <form id = "searchForm" action="{{route('frontend.search_view')}}" method="post">
                                @csrf
                                <div class="ps-search-table">
                                    <div class="input-group">
                                        <input class="form-control ps-input" route = "{{route('frontend.search')}}" type="text" name = "keyword"
                                            placeholder="Search for products">
                                        <div class="input-group-append"><a href="javascript:searchFormSubmit()"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Search Results -->
                            <div class="ps-search--result">
                                <div class="ps-result__content">
                                    <div id = "search_response" class="row m-0">
                                        <!-- <div  class="col-12 col-lg-6">
                                            <div class="ps-product ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="#">
                                                        <figure><img src="img/products/052.jpg" alt="alt" /></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a>3-layer <span
                                                                class='hightlight'>mask</span> with an elastic band (1
                                                            piece)</a></h5>
                                                    <p class="ps-product__desc">Study history up to 30 days Up to 5
                                                        users simultaneously Has HEALTH certificate</p>
                                                    <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                            38.24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-12 col-lg-6">
                                            <div class="ps-product ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="#">
                                                        <figure><img src="img/products/033.jpg" alt="alt" /></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face
                                                            <span class='hightlight'>mask</span>s</a></h5>
                                                    <p class="ps-product__desc">Study history up to 30 days Up to 5
                                                        users simultaneously Has HEALTH certificate</p>
                                                    <div class="ps-product__meta"><span
                                                            class="ps-product__price sale">Rs 14.52</span><span
                                                            class="ps-product__del">Rs 17.24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="ps-product ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="#">
                                                        <figure><img src="img/products/051.jpg" alt="alt" /></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face
                                                            <span class='hightlight'>mask</span></a></h5>
                                                    <p class="ps-product__desc">Study history up to 30 days Up to 5
                                                        users simultaneously Has HEALTH certificate</p>
                                                    <div class="ps-product__meta"><span
                                                            class="ps-product__price sale">Rs 14.99</span><span
                                                            class="ps-product__del">Rs 38.24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="ps-product ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="#">
                                                        <figure><img src="img/products/050.jpg" alt="alt" /></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a>Disposable Face <span
                                                                class='hightlight'>mask</span> for Unisex</a></h5>
                                                    <p class="ps-product__desc">Study history up to 30 days Up to 5
                                                        users simultaneously Has HEALTH certificate</p>
                                                    <div class="ps-product__meta"><span
                                                            class="ps-product__price sale">Rs 8.15</span><span
                                                            class="ps-product__del">Rs 12.24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- <div class="ps-result__viewall"><a href="product-result.html">View all 5 results</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-navigation">
                <div class="container">
                    <div class="ps-navigation__left">
                        <nav class="ps-main-menu">
                            <ul class="menu">
                                <!-- <li class="has-mega-menu"><a href="#"> <i class="fa fa-bars"></i>Products<span
                                            class="sub-toggle"><i class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">
                                                <div class="mega-menu__column">
                                                    <h4>Wound Care</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Bandages</a></li>
                                                        <li><a href="category-list.html">Gypsum foundations</a></li>
                                                        <li><a href="category-list.html">Patches and tapes</a></li>
                                                        <li><a href="category-list.html">Stomatology</a></li>
                                                        <li><a href="category-list.html">Surgical sutures</a></li>
                                                        <li><a href="category-list.html">Uniforms</a></li>
                                                        <li><a href="category-list.html">Wound healing</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column">
                                                    <h4>Higiene</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Disposable products</a></li>
                                                        <li><a href="category-list.html">Face masks</a></li>
                                                        <li><a href="category-list.html">Gloves</a></li>
                                                        <li><a href="category-list.html">Protective covers</a></li>
                                                        <li><a href="category-list.html">Sterilization</a></li>
                                                        <li><a href="category-list.html">Surgical foils</a></li>
                                                        <li><a href="category-list.html">Uniforms</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column">
                                                    <h4>Laboratory</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Devices</a></li>
                                                        <li><a href="category-list.html">Diagnostic tests</a></li>
                                                        <li><a href="category-list.html">Disinfectants</a></li>
                                                        <li><a href="category-list.html">Dyes</a></li>
                                                        <li><a href="category-list.html">Pipettes</a></li>
                                                        <li><a href="category-list.html">Test-tubes</a></li>
                                                        <li><a href="category-list.html">Tubes</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column">
                                                    <h4>Tools</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Accessories Tools</a></li>
                                                        <li><a href="category-list.html">Blood pressure</a></li>
                                                        <li><a href="category-list.html">Capsules</a></li>
                                                        <li><a href="category-list.html">Dental</a></li>
                                                        <li><a href="category-list.html">Micrscope</a></li>
                                                        <li><a href="category-list.html">Pressure</a></li>
                                                        <li><a href="category-list.html">Sugar level</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column">
                                                    <h4>Diagnosis</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Biopsy tools</a></li>
                                                        <li><a href="category-list.html">Endoscopes</a></li>
                                                        <li><a href="category-list.html">Monitoring</a></li>
                                                        <li><a href="category-list.html">Otoscopes</a></li>
                                                        <li><a href="category-list.html">Oxygen concentrators</a></li>
                                                        <li><a href="category-list.html">Tables and assistants</a></li>
                                                        <li><a href="category-list.html">Thermometer</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column">
                                                    <h4>Equipment</h4>
                                                    <ul class="sub-menu--mega">
                                                        <li><a href="category-list.html">Blades</a></li>
                                                        <li><a href="category-list.html">Education</a></li>
                                                        <li><a href="category-list.html">Germicidal lamps</a></li>
                                                        <li><a href="category-list.html">Heart Health</a></li>
                                                        <li><a href="category-list.html">Infusion stands</a></li>
                                                        <li><a href="category-list.html">Lighting</a></li>
                                                        <li><a href="category-list.html">Machines</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="has-mega-menu"><a href="#"> Home Medical Supplies<span class="sub-toggle"><i
                                                class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">
                                                <div class="mega-menu__column col-12 col-sm-3">
                                                    <ul class="sub-menu--mega sub-menu--bold">
                                                        <li><a href="category-list.html">Diagnosis</a></li>
                                                        <li><a href="category-list.html">Accessories Tools</a></li>
                                                        <li><a href="category-list.html">Bandages</a></li>
                                                        <li><a href="category-list.html">Biopsy tools</a></li>
                                                        <li><a href="category-list.html">Blades</a></li>
                                                        <li><a href="category-list.html">Blood pressure</a></li>
                                                        <li><a href="category-list.html">Capsules</a></li>
                                                        <li><a href="category-list.html">Dental</a></li>
                                                        <li><a href="category-list.html">Devices</a></li>
                                                        <li><a href="category-list.html">Diagnostic tests</a></li>
                                                        <li><a href="category-list.html">Disposable products</a></li>
                                                        <li><a href="category-list.html">Education</a></li>
                                                        <li><a href="category-list.html">Endoscopes</a></li>
                                                        <li><a href="category-list.html">Equipment</a></li>
                                                        <li><a href="category-list.html">Show all</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-menu__column col-12 col-sm-5 col-md-6">
                                                    <div class="ps-promo">
                                                        <div class="ps-promo__item"><img class="ps-promo__banner"
                                                                src="img/promotion/bg-banner4.jpg" alt="alt" />
                                                            <div class="ps-promo__content"><span
                                                                    class="ps-promo__badge">New</span>
                                                                <h4 class="mb-20 ps-promo__name">Get rid of bacteria
                                                                    <br />in your home
                                                                </h4><a class="ps-promo__btn"
                                                                    href="category-grid.html">More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ps-promo">
                                                        <div class="ps-promo__item"><img class="ps-promo__banner"
                                                                src="img/promotion/bg-banner5.jpg" alt="alt" />
                                                            <div class="ps-promo__content">
                                                                <h4 class="ps-promo__name">Candid <br />Whitening Kit
                                                                </h4>
                                                                <div class="ps-promo__sale">-10%</div><a
                                                                    class="ps-promo__btn" href="category-grid.html">Shop
                                                                    now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mega-menu__column col-12 col-sm-4 col-md-3">
                                                    <div class="mega-menu__product">
                                                        <div class="ps-product ps-product--standard">
                                                            <div class="ps-product__thumbnail"><a
                                                                    class="ps-product__image" href="product1.html">
                                                                    <figure><img src="img/products/039.jpg"
                                                                            alt="alt" /><img src="img/products/048.jpg"
                                                                            alt="alt" />
                                                                    </figure>
                                                                </a>
                                                                <div class="ps-product__actions">
                                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                                        data-placement="left" title="Wishlist"><a
                                                                            href="#"><i class="fa fa-heart-o"></i></a>
                                                                    </div>
                                                                    <div class="ps-product__item rotate"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Share"><a href="#" data-toggle="modal"
                                                                            data-target="#share"><i
                                                                                class="fa fa-share-alt"></i></a></div>
                                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                                        data-placement="left" title="Quick view"><a
                                                                            href="#" data-toggle="modal"
                                                                            data-target="#popupQuickview"><i
                                                                                class="fa fa-search"></i></a></div>
                                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                                        data-placement="left" title="Add to cart"><a
                                                                            href="#" data-toggle="modal"
                                                                            data-target="#popupAddcart"><i
                                                                                class="fa fa-shopping-basket"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="ps-product__badge">
                                                                </div>
                                                            </div>
                                                            <div class="ps-product__content">
                                                                <h5 class="ps-product__title"><a
                                                                        href="product1.html">Generic Stethoscope Hearing
                                                                        Heartbeat Tool</a></h5>
                                                                <div class="ps-product__meta"><span
                                                                        class="ps-product__price sale">Rs
                                                                        38.39</span><span class="ps-product__del">Rs
                                                                        53.99</span>
                                                                </div>
                                                                <div class="ps-product__rating">
                                                                    <select class="ps-rating" data-read-only="true">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3" selected="selected">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select><span class="ps-product__review">(
                                                                        Reviews)</span>
                                                                </div>
                                                                <div class="ps-product__desc">
                                                                    <ul class="ps-product__list">
                                                                        <li>Study history up to 30 days</li>
                                                                        <li>Up to 5 users simultaneously</li>
                                                                        <li>Has HEALTH certificate</li>
                                                                    </ul>
                                                                </div>
                                                                <div
                                                                    class="ps-product__actions ps-product__group-mobile">
                                                                    <div class="ps-product__quantity">
                                                                        <div
                                                                            class="def-number-input number-input safari_only">
                                                                            <button class="minus"
                                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                                    class="icon-minus"></i></button>
                                                                            <input class="quantity" min="0"
                                                                                name="quantity" value="1"
                                                                                type="number" />
                                                                            <button class="plus"
                                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                                    class="icon-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ps-product__cart"> <a
                                                                            class="ps-btn ps-btn--lblue" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#popupAddcart">Add to cart</a>
                                                                    </div>
                                                                    <div class="ps-product__item cart"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Add to cart"><a href="#"><i
                                                                                class="fa fa-shopping-basket"></i></a>
                                                                    </div>
                                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                                        data-placement="left" title="Wishlist"><a
                                                                            href="wishlist.html"><i
                                                                                class="fa fa-heart-o"></i></a></div>
                                                                    <div class="ps-product__item rotate"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Share"><a href="compare.html"><i
                                                                                class="fa fa-share-alt"></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <li class="has-mega-menu"><a href="{{route('frontend.index')}}">Home</a></li>
                                <li class="has-mega-menu"><a href="{{route('frontend.about')}}">About us</a></li>
                                
                                <li class="has-mega-menu"><a style = "color:#103178">Download:</a><a target = "_blank" href="https://play.google.com/store/apps/details?id=com.tnt.online_aushadhi">Android/</a><a target = "_blank" href = "https://apps.apple.com/us/app/online-aushadhi/id1546529422">IOS</a></li>
                                <li class="has-mega-menu"><a href="{{route('frontend.FAQs')}}">FAQs</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="ps-navigation__right">Need help? <strong>+977 9841568568</strong></div>
                </div>
            </div>
        </header>
        <header class="ps-header ps-header--1 ps-header--mobile">
            <div class="ps-noti">
                <div class="container">
                    <p class="m-0">{{App\Models\Notification::where('display',true)->first()->message}}</p>
                </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
            </div>
            <div class="ps-header__middle">
                <div class="container">
                    <div class="ps-logo"><a href="{{route('frontend.index')}}"> <img src="{{URL::asset('img/logo_oa.png')}}" alt></a></div>
                    <div class="ps-header__right">
                        <ul class="ps-header__icons">
                            <li><a class="ps-header__item open-search" href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </div>
    <footer class="ps-footer ps-footer--4">

        <!-- Info Section -->
        <div class="ps-footer--top">
            <div class="container">
                <div class="row m-0">
                    <div class="col-12 col-sm-6 p-0">
                        <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-wallet"></i>Order
                                via Facebook Messenger, WhatsApp & Viber +977 9841568568</a></p>
                    </div>
                    <div class="col-12 col-sm-6 p-0">
                        <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-truck"></i>Delivery
                                within 2 - 24 hours</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="ps-footer__middle">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-footer--address">
                                    <div class="ps-logo">
                                        <a href="{{route('frontend.index')}}"> <img src="{{URL::asset('img/logo_oa.png')}}" alt></a>
                                    </div>
                                    <p>
                                        Online Ausadhi is a locally owned, independent and licensed first online
                                        pharmacy system of Nepal serving since 2015 which aims to provide high quality
                                        medical care in all major cities.
                                    </p>
                                    <p>If you have any suggestions or queries, please contact us or fill the contact
                                        form and send it to us. We would love to hear from you.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="ps-footer--contact">

                                    <p class="text-white">Kathmandu, Nepal</p>
                                    <p class="text-white"><a target="_blank"
                                            href="https://www.google.com/maps/place/Kathmandu+44600/@27.7090319,85.2911134,13z/data=!3m1!4b1!4m5!3m4!1s0x39eb198a307baabf:0xb5137c1bf18db1ea!8m2!3d27.7172453!4d85.3239605">Show
                                            on map</a></p>
                                    <ul class="ps-social">
                                        <li><a class="ps-social__link facebook" target = "_blank" href="https://www.facebook.com/healthtips.onlineaushadhi"><i class="fa fa-facebook">
                                                </i><span class="ps-tooltip">Facebook</span></a></li>
                                        <li><a class="ps-social__link facebook" target = "_blank" href="https://www.instagram.com/onlineaushadhi/"><i
                                                    class="fa fa-instagram"></i><span
                                                    class="ps-tooltip">Instagram</span></a></li>
                                        <li><a class="ps-social__link youtube" target = "_blank" href="https://www.youtube.com/channel/UC7fvHXVAmAxM7LJIBXgw6IQ/videos"><i
                                                    class="fa fa-youtube-play"></i><span
                                                    class="ps-tooltip">Youtube</span></a></li>
                                        <!-- <li><a class="ps-social__link pinterest" href="#" target = "_blank"><i
                                                    class="fa fa-pinterest-p"></i><span
                                                    class="ps-tooltip">Pinterest</span></a></li> -->
                                        <li><a class="ps-social__link linkedin" href="https://www.linkedin.com/company/online-aushadhi/" target = "_blank"><i
                                                    class="fa fa-linkedin"></i><span
                                                    class="ps-tooltip">Linkedin</span></a></li>
                                    </ul>

                                    <hr class="white">

                                    <h5 class="ps-footer__title">Need help</h5>
                                    <div class="ps-footer__fax"><i class="icon-telephone"></i>+977 9841568568</div>
                                    <p class="ps-footer__work">Monday – Friday: 10:00AM to 06:00PM<br>We are close on Saturdays.</p>
                                    <p><a class="ps-footer__email" href="mailto:info@onlineausadhi.com">
                                            <i class="icon-envelope"></i>info@onlineausadhi.com
                                        </a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Information</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="{{route('frontend.about')}}">About us</a></li>
                                        <li><a href="{{route('frontend.testinomial')}}">Customers Speak</a></li>
                                        <li><a href="{{route('frontend.order_with_us',['slug' => 'order-with-us'])}}">Order with us</a></li>
                                        <li><a href="{{route('frontend.privacy_policy')}}">Privacy Policy</a></li>
                                        <li><a href="{{route('frontend.terms_and_conditions')}}">Terms &amp; Conditions</a></li>
                                        <li><a href="{{route('frontend.return_policy')}}">Return Policy</a></li>
                                        <li><a href="{{route('frontend.FAQs')}}">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Account</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="{{route('account.index')}}">My account</a></li>
                                        <li><a href="{{route('order.index')}}">My orders</a></li>
                                        <li><a href="{{route('wishlist.index')}}">Wishlist</a></li>
                                        <li><a href="{{route('login')}}">Login</a></li>
                                        <li><a href="{{route('register')}}">SignUp</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div style = "" class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Store</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="{{route('frontend.cosmetic_view')}}">Personal Care</a></li>
                                        <li><a href="{{route('frontend.trending_view')}}">Trending Products</a></li>
                                        <li><a href="{{route('frontend.featured_product')}}">Featured Products</a></li>
                                        <li><a href="{{route('frontend.best_deal')}}">Best Deals</a></li>
                                        <li><a href="{{route('frontend.recommended_product')}}">Recommended Products</a></li>
                                        <li><a href="{{route('frontend.covid_essential')}}">Covid Essentials</a></li>
                                        <li><a href="{{route('frontend.essential_health')}}">Health Devices</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer--bottom">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>© 2021 Online Ausadhi. All Rights Reserved | Powered by: <a target = "_blank" href="http://digitalagencycatmandu.com/">DAC</a>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 text-right"><img src="{{URL::asset('img/payment.png')}}" alt><img class="payment-light"
                            src="{{URL::asset('img/payment.png')}}" alt></div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i
                    class="icon-cross"></i></a>
            <h3>Search</h3>
            <form id = "searchFormMobile" action="{{route('frontend.search_view')}}" method="post">
                @csrf
                <div class="ps-search-table">
                    <div class="input-group">
                        <input class="form-control ps-input" route = "{{route('frontend.search')}}" type="text" name = "keyword" placeholder="Search for products">
                        <div class="input-group-append"><a href="javascript:searchFormMobileSubmit()"><i class="fa fa-search"></i></a></div>
                    </div>
                </div>
            </form>
            <div class="ps-search__result" id = "search_result_mobile">
                <!-- <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/052.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-layer <span class='hightlight'>mask</span> with an
                                    elastic band (1 piece)</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price">Rs 38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/033.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span
                                        class='hightlight'>mask</span>s</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">Rs 14.52</span><span
                                    class="ps-product__del">Rs 17.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/051.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span
                                        class='hightlight'>mask</span></a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">Rs 14.99</span><span
                                    class="ps-product__del">Rs 38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/050.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>Disposable Face <span class='hightlight'>mask</span>
                                    for
                                    Unisex</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">Rs 8.15</span><span
                                    class="ps-product__del">Rs 12.24</span>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="ps-navigation--footer">
        <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i
                    class="icon-cross"></i></a></div>
        <div class="ps-nav__item"><a href="{{route('frontend.index')}}"><i class="icon-home2"></i></a></div>
        
        <div class="ps-nav__item"><a href="{{route('account.index')}}"><i class="icon-user"></i></a></div>
        <div class="ps-nav__item"><a href="{{route('account.index')}}"><i class="icon-unlock"></i></a></div>
        <div class="ps-nav__item"><a href="{{route('wishlist.index')}}"><i class="fa fa-heart-o"></i>@if(auth()->user())<span id = "ajaxWishlist" class="badge">{{App\Models\Wishlist::where('user_id',auth()->user()->id)->count()}}</span>@endif</a>
        </div>
        <div class="ps-nav__item"><a href="{{route('shopping_cart.index')}}"><i class="icon-cart-empty"></i>@if(Session::has('cart'))
                                  <span id="totalQty" class="badge">
                                      {{count(Session::get('cart')->items)}}
                                  </span>
                                @else
                                    <span id="totalQty" class="badge" style="display: none">
                                  </span>
                                @endif</a></div>
    </div>
    <div class="ps-menu--slidebar">
        <div class="ps-menu__content">
            <ul class="menu--mobile">
                

                <li class="menu-item-has-children"><a href="{{route('frontend.index')}}">Home</a></li>


                <li class="menu-item-has-children"><a href="{{route('frontend.about')}}">About Us</a></li>
                <li class="menu-item-has-children"><a style = "color:#103178">Download:</a><a target = "_blank" href="https://play.google.com/store/apps/details?id=com.tnt.online_aushadhi">Android/</a><a target = "_blank" href = "https://apps.apple.com/us/app/online-aushadhi/id1546529422">IOS</a></li>
                <li class="menu-item-has-children"><a href="{{route('frontend.FAQs')}}">FAQs</a></li>
            </ul>
        </div>
        <div class="ps-menu__footer">
            <div class="ps-menu__item">
                <ul class="ps-language-currency">
                    <!-- Upload your prescription modal -->
                    <div class="ps-language-currency"><a class="ps-dropdown-value ps-btn cs_btn_prescription"
                            href="{{route('frontend.prescription')}}"><i
                                class="fa fa-camera" aria-hidden="true"></i>
                            Upload Your Prescription</a>
                    </div>
                </ul>
            </div>
            <div class="ps-menu__item">
                <div class="ps-menu__contact">Need help? <strong>+977 9841568568</strong></div>
            </div>
        </div>
    </div>
    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>
    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <div class="slide"><img src="img/products/001.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/008.jpg" alt="alt" /></div>
                                            <div class="slide"><img src="img/products/034.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/001.jpg"
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/047.jpg"
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/047.jpg"
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/008.jpg"
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/products/034.jpg"
                                                        alt="alt" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN
                                                STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                        <div class="ps-product__title"><a id = "quickTitle" href="#"></a></div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(5 Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__meta"><span class="ps-product__price" id = "quickPrice"></span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div><a class="ps-btn ps-btn--lblue" id = "quickAddCart" href="#" data-toggle="modal"
                                                    data-target="#popupAddcartV2">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text"
                                                        href="#">Health</a><a class="ps-list__text"
                                                        href="#">Thermometer</a>
                                                </li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text"
                                                        href="#">SF-006</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Upload Your Prescription Modal -->
    <div class="modal fade" id="popupPrescription" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ps-popup--select">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid">
                        <button class="close ps-popup__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <form action = "" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file">
                                <input type="file" id = "custom_file"   name="attachment">
                            </div>
                            <input type="submit" value="Upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popupAddcart" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                        <div class="row">
                            <!-- <div class="col-12 col-md-6">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/015.jpg" alt="alt" /><img
                                                    src="img/products/040.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                    data-target="#share"><i class="fa fa-share-alt"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Lens Frame
                                                Professional
                                                Adjustable Multifunctional</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                89.65</span><span class="ps-product__del">Rs 60.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to
                                                    cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="compare.html"><i
                                                        class="fa fa-share-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12 col-md-6">
                                <div class="ps-addcart__content">
                                    <p id = "keyCount"></p>
                                    <p class="ps-addcart__total">Total: <span class="ps-price" id = "totalPrice"></span></p>
                                    <a class="ps-btn ps-btn--lblue"
                                        href="{{route('shopping_cart.index')}}">View cart</a>
                                        <!-- <a class="ps-btn ps-btn--lblue"
                                        onclick = "javascript:confirm_order($('#totalPrice').val())" route="{{route('frontend.order_complete')}}" id = "confirm_order">Checkout</a> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            >
                                            <figure><img id = "cartProduct" src="" alt="alt" />
                                            </figure>
                                        </a>
            </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupAddwishlist" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to wishlist succesfully</p>
                        <div class="row">
                            <!-- <div class="col-12 col-md-6">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/015.jpg" alt="alt" /><img
                                                    src="img/products/040.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                    data-target="#share"><i class="fa fa-share-alt"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Lens Frame
                                                Professional
                                                Adjustable Multifunctional</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                89.65</span><span class="ps-product__del">Rs 60.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to
                                                    cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="compare.html"><i
                                                        class="fa fa-share-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12 col-md-6">
                                <div class="ps-addcart__content">
                                    <p id = "wishlistCount"></p>
                                    <a class="ps-btn ps-btn--border"
                                        href="{{route('wishlist.index')}}">View wishlist</a>
                                        <!-- <a class="ps-btn ps-btn--lblue"
                                        href="">Conitnue</a> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img id = "wishlistProduct" src="" alt="alt" />
                                            </figure>
                                        </a>
            </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupViewDetail" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Purchase Details</p>
                        <div class="row">
                            
                            <div class="col-12 col-md-12">
                                <div class="ps-addcart__content" style = "text-align:center">

                            <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__name detail-table">Product name</th>
                                    <th class="ps-product__name detail-table">Quantity</th>
                                    <th class="ps-product__name detail-table">Rate</th>
                                    <th class="ps-product__name detail-table">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody id = "viewDetalBody" style = "line-height:-10px">
                                <!-- <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product.html">
                                            <figure><img src="img/products/001.jpg" alt></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product.html">Digital Thermometer X30-Pro</a>
                                    </td>
                                    <td class="ps-product__meta"> <span class="ps-product__price sale">Rs
                                            77.65</span><span class="ps-product__del">Rs 80.65</span>
                                    </td>
                                    <td>1</td>
                                    <td>Rs 77.65</td>
                                    <td class="cs_out_of_stock"> <span>Pending </span>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product.html">
                                            <figure><img src="img/products/011.jpg" alt></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product.html">Hill-Rom Affinity III Progressa
                                            iBed</a></td>
                                    <td class="ps-product__meta"> <span class="ps-product__price">Rs 488.23</span>
                                    </td>
                                    <td>1</td>
                                    <td>Rs 488.23</td>

                                    <td class="ps-product__status"> <span>Processing</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product.html">
                                            <figure><img src="img/products/012.jpg" alt></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product.html">Hill-Rom Affinity III Progressa
                                            iBed</a></td>
                                    <td class="ps-product__meta"> <span class="ps-product__price">Rs 436.87</span>
                                    </td>
                                    <td>1</td>
                                    <td>Rs 436.87</td>

                                    <td class="ps-product__status"> <span>Delivery Sent</span>
                                    </td>

                                </tr> -->
                            </tbody>
                        </table>
                                    <!-- <a
                                        class="ps-btn ps-btn--border" href="#" data-dismiss="modal"
                                        aria-label="Close">Continue shopping</a><a class="ps-btn ps-btn--border"
                                        href="{{route('shopping_cart.index')}}">View cart</a><a class="ps-btn ps-btn--lblue"
                                        href="checkout.html">Proceed to checkout
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupConfirmOrder" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Order Confirmation</p>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="ps-addcart__content">
                                    <h2 style = "text-align:center" id = "total_order_amount"></h2><br/>

                         <p>Orders once confirmed, cannot be cancelled.</p>
                                
                                    <a class="ps-btn ps-btn--lblue"
                                        href="{{route('frontend.order_complete')}}">Confirm</a>
                                        <a class="ps-btn ps-btn--border"
                                        href="">Cancel</a>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="prescriptionPopUp" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"></i>Prescription</p>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="ps-addcart__content">

                                    <img id = "prescription"/>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="popupAddcartV2" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-addcart__body">
                        <div class="ps-addcart__overlay">
                            <div class="ps-addcart__loading"></div>
                        </div>
                        <button class="close ps-addcart__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                        <div class="ps-addcart__product">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                        <figure><img src="img/products/015.jpg" alt><img src="img/products/040.jpg" alt>
                                        </figure>
                                    </a></div>
                                <div class="ps-product__content">
                                    <div class="ps-product__title"><a>Lens Frame Professional Adjustable
                                            Multifunctional</a></div>
                                    <div class="ps-product__quantity"><span>x2</span></div>
                                    <div class="ps-product__meta"><span class="ps-product__price">Rs 89.65</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-addcart__header">
                            <h3>Want o add one of these?</h3>
                            <p>People who buy this product buy also:</p>
                        </div>
                        <div class="ps-addcart__content">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3"
                                data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3"
                                data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/015.jpg" alt="alt" /><img
                                                    src="img/products/040.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                    data-target="#share"><i class="fa fa-share-alt"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Lens Frame
                                                Professional
                                                Adjustable Multifunctional</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                89.65</span><span class="ps-product__del">Rs 60.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to
                                                    cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="compare.html"><i
                                                        class="fa fa-share-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/028.jpg" alt="alt" /><img
                                                    src="img/products/045.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                    data-target="#share"><i class="fa fa-share-alt"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                        </div>
                                        <div class="ps-product__badge">
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
                                                X30-Pro</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                60.39</span><span class="ps-product__del">Rs 89.99</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to
                                                    cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="compare.html"><i
                                                        class="fa fa-share-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="product1.html">
                                            <figure><img src="img/products/020.jpg" alt="alt" /><img
                                                    src="img/products/008.jpg" alt="alt" />
                                            </figure>
                                        </a>
                                        <div class="ps-product__actions">
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                    data-target="#share"><i class="fa fa-share-alt"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart"><a href="#" data-toggle="modal"
                                                    data-target="#popupAddcart"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--hot">Hot</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Bronze Blood Pressure
                                                Monitor</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 56.65 -
                                                Rs 97.65</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">( Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__actions ps-product__group-mobile">
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="#"
                                                    data-toggle="modal" data-target="#popupAddcart">Add to
                                                    cart</a>
                                            </div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></div>
                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Share"><a href="compare.html"><i
                                                        class="fa fa-share-alt"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-addcart__footer"><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal"
                                aria-label="Close">No thanks :(</a><a class="ps-btn ps-btn--lblue"
                                href="shopping-cart.html">Continue to Cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="{{URL::asset('plugins/jquery.min.js')}}"></script>
    <script src="{{URL::asset('plugins/popper.min.js')}}"></script>
    <script src="{{URL::asset('plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{URL::asset('plugins/lightGallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{URL::asset('plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{URL::asset('plugins/noUiSlider/nouislider.min.js')}}"></script>
    <!-- custom code-->
    <script src="{{URL::asset('js/main.js')}}"></script>
    
    @yield('scripts')
</body>

</html>