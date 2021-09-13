@extends('frontend.master')
  
    @section('content')
    <div class="ps-home ps-home--1">
            <section class="ps-section--banner">
                <div class="ps-section__overlay">
                    <div class="ps-section__loading"></div>
                </div>
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000"
                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                    data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                    data-owl-mousedrag="on">
                    @foreach($h0banners as $banner)
                    <div class="ps-banner" style="background:#DAECFA;">
                        <div class="container container-initial">
                            <div class="ps-banner__block">
                                <div class="ps-banner__content">
                                    <h2 class="ps-banner__title">{{$banner->title_1}}</h2>
                                    <div class="ps-banner__desc">{{$banner->title_2}}</div>
                                    <div class="ps-banner__price"> @if($banner->price_1)<span>Rs {{$banner->price_1}}</span>@endif
                                    </div><a class="bg-light-blue ps-banner__shop" href="{{$banner->redirect_url}}">{{$banner->button_title}}</a>
                                    @if($banner->discount_percentage != null)<div class="ps-banner__persen bg-light-blue ps-center">-{{$banner->discount_percentage}}%</div>@endif
                                </div>
                                <div class="ps-banner__thumnail"><img class="ps-banner__round" src="img/round2.png"
                                        alt="alt" /><img class="ps-banner__image" height = "500px" src="{{$banner->banner_image}}"
                                        alt="alt" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </section>
            <div class="ps-home__content">
                <!-- Categories of services -->
                <section class="ps-section--categories cs_section_categories">
                    <div class="ps-section__content">
                        <div class="ps-categories__list">
                            <div class="ps-categories__item"><a
                                    ><img src="https://images.onlineaushadhi.com/img/medicinesico.png" alt></a><a
                                    class="ps-categories__name">Medicine</a>
                                <p>Over {{$medicine_count}} products</p>
                            </div>
                            <div class="ps-categories__item"><a
                                    ><img src="https://images.onlineaushadhi.com/img/brandico.png" alt></a><a
                                    class="ps-categories__name" >Brands</a>
                                <p>Over {{$brands->count()}} brands</p>
                            </div>
                            <div class="ps-categories__item"><a 
                                    ><img src="https://images.onlineaushadhi.com/img/diagnosticico.png" alt></a><a
                                    class="ps-categories__name" >Diagnostic</a>
                                <p>Book tests</p>
                            </div>
                            <div class="ps-categories__item"><a 
                                    href="{{route('frontend.talk_to_health_expert')}}"><img src="https://images.onlineaushadhi.com/img/talktohealthexpertico.png" alt></a><a
                                    class="ps-categories__name" href="{{route('frontend.talk_to_health_expert')}}">Talk to Health Expert</a>
                                <p>Your queries</p>
                            </div>
                            <div class="ps-categories__item"><a 
                                    target = "_blank" href="http://healthtips.onlineaushadhi.com/"><img src="https://images.onlineaushadhi.com/img/healthcornerico.png" alt></a><a
                                    target = "_blank" class="ps-categories__name" href="http://healthtips.onlineaushadhi.com/">Health Corner</a>
                                <p>Tips from health experts</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="ps-section--latest ps-section--default">
                    <div class="container">
                        <h3 class="ps-section__title">Personal Care Products <a style = "float:right;font-size:20px" href ="{{route('frontend.cosmetic_view')}}">View all</a></h3>
                        
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($cosmetic_health_medicines as $cosmetic_health_medicine)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.product',['slug' => $cosmetic_health_medicine->slug])}}">
                                                <figure>
                                                @if($cosmetic_health_medicine->img == null && $cosmetic_health_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$cosmetic_health_medicine->img ?? $cosmetic_health_medicine->image_url}}" alt="Image unavailable" />
                                                @endif    
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$cosmetic_health_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$cosmetic_health_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})"
                                                         id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                            @if($cosmetic_health_medicine->discount_percentage != null)<div class="ps-product__percent">-{{$cosmetic_health_medicine->discount_percentage}}</div>@endif
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $cosmetic_health_medicine->slug])}}">{{$cosmetic_health_medicine->medicine_name}}</a></h5>
                                            <div style = "margin-top:-10px" class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                    {{App\Models\Stock::where('medicine_id',$cosmetic_health_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $cosmetic_health_medicine->sp_per_piece}}</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})"
                                                         id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})" id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$cosmetic_health_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$cosmetic_health_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Trending Products -->
                <section class="ps-section--latest ps-section--default ps-section--alternate ps-section--trending">
                    <div class="container">
                        <h3 class="ps-section__title">Trending Products<a style = "float:right;font-size:20px" href ="{{route('frontend.trending_view')}}">View all</a></h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($trending_medicines as $trending_medicine)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.product',['slug' => $trending_medicine->slug])}}">
                                                <figure>
                                                @if($trending_medicine->img == null && $trending_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$trending_medicine->img ?? $trending_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$trending_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$trending_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$trending_medicine->id}})" id="{{$trending_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <!-- <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">{{$trending_medicine->availability == '1' ? 'In Stock' : 'Out of Stock'}}</div>
                                            </div> -->
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $trending_medicine->slug])}}">{{$trending_medicine->medicine_name}}</a></h5>
                                            <div class="ps-product__meta" style = "margin-top:-25px"><span class="ps-product__price sale">Rs
                                            {{App\Models\Stock::where('medicine_id',$trending_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $trending_medicine->sp_per_piece}}</span>
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
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$trending_medicine->id}})" id="{{$trending_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$trending_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$trending_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Products by Brand -->
                <section class="ps-section--latest ps-section--default">
                    <div class="container">
                        <h3 class="ps-section__title">Brands</h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                @foreach($brands as $brand)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.products_by_brand',['slug' => $brand->slug])}}">
                                                <figure><img src="{{$brand->brand_logo_path}}" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Featured Products -->
                <section class="ps-section--latest ps-section--default ps-section--alternate">
                    <div class="container">

                        <div class="ps-section__header">
                            <h3 class="ps-section__title">Featured Products<a style = "float:right;font-size:20px" href ="{{route('frontend.featured_product')}}">View all</a></h3>
                        </div>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($featured_medicines as $featured_medicine)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.product',['slug' => $featured_medicine->slug])}}">
                                                <figure>
                                                @if($featured_medicine->img == null && $featured_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$featured_medicine->img ?? $featured_medicine->image_url}}" alt="Image unavailable" />
                                                @endif    
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$featured_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$featured_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$featured_medicine->id}})"
                                                         id="{{$featured_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                            @if($featured_medicine->discount_percentage != null)<div class="ps-product__percent">-{{$featured_medicine->discount_percentage}}</div>@endif
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $featured_medicine->slug])}}">{{$featured_medicine->medicine_name}}</a></h5>
                                            <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price sale">Rs
                                            {{App\Models\Stock::where('medicine_id',$featured_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $featured_medicine->sp_per_piece}}</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$featured_medicine->id}})"
                                                         id="{{$featured_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$featured_medicine->id}})" id="{{$featured_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$featured_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$featured_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Best Deals -->
                <section class="ps-section--latest ps-section--default  ps-section--trending">
                    <div class="container">
                        <div class="ps-section__header">
                            <h3 class="ps-section__title">Best Deals<a style = "float:right;font-size:20px" href ="{{route('frontend.best_deal')}}">View all</a></h3>
                        </div>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($best_deal_medicines as $best_deal_medicine)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.product',['slug' => $best_deal_medicine->slug])}}">
                                                <figure>
                                                @if($best_deal_medicine->img == null && $best_deal_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$best_deal_medicine->img ?? $best_deal_medicine->image_url}}" alt="Image unavailable" />
                                                @endif    
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$best_deal_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$best_deal_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$best_deal_medicine->id}})"
                                                         id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                            @if($best_deal_medicine->discount_percentage != null)<div class="ps-product__percent">-{{$best_deal_medicine->discount_percentage}}</div>@endif
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $best_deal_medicine->slug])}}">{{$best_deal_medicine->medicine_name}}</a></h5>
                                            <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price sale">Rs
                                            {{App\Models\Stock::where('medicine_id',$best_deal_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $best_deal_medicine->sp_per_piece}}</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$best_deal_medicine->id}})"
                                                         id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$best_deal_medicine->id}})" id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$best_deal_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$best_deal_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Banner Images -->
                <div class="ps-promo ps-section--alternate">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-12 col-md-6">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="img/promotion/bg-banner4.jpg" alt="alt" />
                                    <div class="ps-promo__content"><span class="ps-promo__badge">New</span>
                                        <h4 class="mb-20 ps-promo__name">Get rid of bacteria <br />in your home</h4><a
                                            class="ps-promo__btn" href="category-grid.html">More</a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="https://images.onlineaushadhi.com/banner/promobanner.jpg" alt="alt" />
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="https://images.onlineaushadhi.com/banner/suncitybanner.jpg" alt="alt" />
                                    <!-- <div class="ps-promo__content">
                                        <h4 class="ps-promo__name">{{$banner->title_1}}<br>{{$banner->title_2}}</h4>
                                        
                                        @if($banner->discount_percentage != null)
                                        <div class="ps-promo__sale">-{{$banner->discount_percentage}}/div>
                                        @endif
                                        <a class="ps-promo__btn"
                                            href="{{$banner->redirect_url}}">{{$banner->button_title}}</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Products -->
                <section class="ps-section--featured ps-section--default  ps-section--trending">
                    <div class="container">
                        <h3 class="ps-section__title">Recommended Products<a style = "float:right;font-size:20px" href ="{{route('frontend.recommended_product')}}">View all</a></h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach($recommended_medicines as $recommended_medicine)
                                <div class="col-12 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $recommended_medicine->slug])}}">
                                                    <figure>
                                                    @if($recommended_medicine->img == null && $recommended_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$recommended_medicine->img ?? $recommended_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
    
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$recommended_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$recommended_medicine->id}}wishlist"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$recommended_medicine->id}})" id="{{$recommended_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                <!-- <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--sale">Sale</div>
                                                </div> -->
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $recommended_medicine->slug])}}">{{$recommended_medicine->medicine_name}}</a></h5>
                                                <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price">Rs
                                                {{App\Models\Stock::where('medicine_id',$recommended_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $recommended_medicine->sp_per_piece}}</span>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                            to cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$recommended_medicine->id}})" id="{{$recommended_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a
                                                        href="javascript:add_to_wishlist({{$recommended_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$recommended_medicine->id}}wishlist"><i class="fa fa-heart-o"></i></a></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Banner Image -->
                @foreach($h2banners as $banner)
                <section class="ps-banner--round cs_ mb-50 ps-section--default">
                    <div class="container">
                        <div class="ps-banner">
                            <div class="ps-banner__block">
                                <div class="ps-banner__content">
                                    <div class="ps-logo"><a href="index.html"> <img src="img/logo_oa.png" alt></a></div>
                                    <h2 class="ps-banner__title">{{$banner->title_1}}</h2>
                                    <div class="ps-banner__btn-group">
                                        <div class="ps-banner__btn"><img src="img/icon/ribbon.svg" alt>Order from Online
                                            Ausadhi</div>
                                        <div class="ps-banner__btn"><img src="img/icon/icon14.png" alt>Get Refill Call
                                            Alert!</div>
                                    </div><a class="ps-banner__shop bg-light-blue" href="{{$banner->redirect_url}}">{{$banner->button_title}}</a>
                                </div>
                                <div class="ps-banner__thumnail"><img class="ps-banner__round" src="img/round5.png"
                                        alt><img class="ps-banner__image" src="{{$banner->banner_image}}" alt></div>
                            </div>
                        </div>
                    </div>
                </section>
                @endforeach

                <!-- Covid Essentials -->
                <section class="ps-section--latest ps-section--default">
                    <div class="container">
                        <h3 class="ps-section__title">Covid Essentials<a style = "float:right;font-size:20px" href ="{{route('frontend.covid_essential')}}">View all</a></h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true"
                                data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                                data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                                data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000"
                                data-owl-mousedrag="on">
                                @foreach($covid_medicines as $covid_medicine)

                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $covid_medicine->slug])}}">
                                                    <figure>@if($covid_medicine->img == null && $covid_medicine->image_url == null)
                                                <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                            @else 
                                                <img src="{{$covid_medicine->img ?? $covid_medicine->image_url}}" alt="Image unavailable" />
                                            @endif
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$covid_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$covid_medicine->id}}wishlist"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$covid_medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$covid_medicine->id}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                <!-- <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--sold">Out of Stock</div>
                                                </div> -->
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $covid_medicine->slug])}}">{{$covid_medicine->medicine_name}}</a></h5>
                                                <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price sale">Rs
                                                {{App\Models\Stock::where('medicine_id',$covid_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $covid_medicine->sp_per_piece}}</span>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                            href="javascript:add_to_cart({{$covid_medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$covid_medicine->id}}">Add
                                                            to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$covid_medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$covid_medicine->id}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a
                                                        href="javascript:add_to_wishlist({{$covid_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$covid_medicine->id}}wishlist"><i class="fa fa-heart-o"></i></a></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                <!-- <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/053.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic
                                                    X500
                                                    Basic</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                    38.39</span><span class="ps-product__del">Rs 53.99</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/054.jpg" alt="alt" /><img
                                                        src="img/products/057.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic
                                                    X2000
                                                    Pro Black</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    299.99</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/055.jpg" alt="alt" /><img
                                                        src="img/products/056.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic
                                                    X2500
                                                    Pro White</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    39.99</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/006.jpg" alt="alt" /><img
                                                        src="img/products/051.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Out of Stock</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">GAnti-Dust Filter,
                                                    Breathable, 3 Layers of Purifying</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    17.99</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/017.jpg" alt="alt" /><img
                                                        src="img/products/002.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Red Hot Water
                                                    Bottle,
                                                    2 Quart Capacity</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    13.64</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/028.jpg" alt="alt" /><img
                                                        src="img/products/045.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Out of Stock</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Digital
                                                    Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                    88.39</span><span class="ps-product__del">Rs 60.23</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/042.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Extractor used to
                                                    remove teeth</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    53.64</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/016.jpg" alt="alt" /><img
                                                        src="img/products/021.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="#"
                                                        data-toggle="modal" data-target="#share"><i
                                                            class="fa fa-share-alt"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Oxygen
                                                    concentrator
                                                    model KTS-5000</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    432.64</span>
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
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                        href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                        to
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a
                                                        href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Share"><a href="compare.html"><i
                                                            class="fa fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ps-section--latest ps-section--default ps-section--alternate">
                    <div class="container">
                        <h3 class="ps-section__title">Essential Health Devices For Your Home<a style = "float:right;font-size:20px" href ="{{route('frontend.essential_health')}}">View all</a></h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($home_essential_medicines as $home_essential_medicine)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{route('frontend.product',['slug' => $home_essential_medicine->slug])}}">
                                                <figure>
                                                @if($home_essential_medicine->img == null && $home_essential_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$home_essential_medicine->img ?? $home_essential_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$home_essential_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$home_essential_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$home_essential_medicine->id}})" id="{{$home_essential_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $home_essential_medicine->slug])}}">{{$home_essential_medicine->medicine_name}}</a></h5>
                                            <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price sale">Rs
                                            {{App\Models\Stock::where('medicine_id',$home_essential_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $home_essential_medicine->sp_per_piece}}</span>
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
                                                        cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$home_essential_medicine->id}})" id="{{$home_essential_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="javascript:add_to_wishlist({{$home_essential_medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$home_essential_medicine->id}}wishlist"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="ps-home__banner ps-section--default">
                    <div class="ps-banner" style="background:#FFCC00;"><img class="ps-banner__overlay"
                            src="https://images.onlineaushadhi.com/banner/ad10.jpg" alt="alt" />
                        <div class="ps-banner__block">
                            <div class="ps-banner__content">
                            </div>
                            <div class="ps-banner__thumnail">
                            </div>
                        </div>
                    </div>
                </section>
                

                <!-- What our customers say about us? -->

                <section class="ps-section--reviews mt-0" data-background="img/roundbg.png">
                    <div class="container">
                        <h3 class="ps-section__title">What our customers say about
                            us?</h3>
                        <div class="ps-section__content ">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="2"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="2"
                                data-owl-item-xl="2" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($testinomials as $testinomial)
                                <div class="ps-review">
                                    <div class="ps-review__text">{{$testinomial->contents}}</div>
                                    <div class="ps-review__review text-center">
                                        
                                        <div class="ps-review__name text-center">{{$testinomial->name}}</div>
                                        <div class="ps-review__name text-center">{{$testinomial->office_name}}</div>
                                        <div class="ps-review__name text-center">{{$testinomial->designation}}</div>
        
                                        <div class="ps-review__image text-center">
                                            <img src="{{$testinomial->image_path}}" alt="" class="review_author">
                                        </div>
    
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="ps-review">
                                    <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the
                                        package was with me.
                                        I have never encountered such a fast order processing.</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Albert Flores</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/5-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div>
                                <div class="ps-review">
                                    <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the
                                        package was with me.
                                        I have never encountered such a fast order processing.</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Dianne Russell</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/4-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div>
                                <div class="ps-review">
                                    <div class="ps-review__text">Everything is perfect. I would recommend!</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Darlene Robertson</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/3-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div>
                                <div class="ps-review">
                                    <div class="ps-review__text">There was a small mistake in the order. In return, I got
                                        the correct order
                                        and I could keep the wrong one for myself.</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Brooklyn Simmons</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/2-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div>
                                <div class="ps-review">
                                    <div class="ps-review__text">Everything is perfect. I would recommend!</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Kristin Watson</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/1-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div>
                                <div class="ps-review">
                                    <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the
                                        package was with me.
                                        I have never encountered such a fast order processing.</div>
                                    <div class="ps-review__review text-center">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="ps-review__name text-center">Mark J.</div>
                                    <div class="ps-review__image text-center">
                                        <img src="img/avatar/6-100x100.png" alt="" class="review_author">
                                    </div>
    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Associate Partners -->
                <div class="container">
                    <section class="ps-section--latest">
                        <h3 class="ps-section__title">Associate Partners</h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                @foreach($partners as $partner)
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="{{$partner->redirect_url}}">
                                                <figure><img src="{{$partner->image_path}}" alt="Image unavailable" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-2.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-3.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-4.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-5.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-6.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-7.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-8.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/branch/brand-9.jpg" alt="alt" />
                                                </figure>
                                            </a>

                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <hr/>
            <div class="container back">
                <!-- App QRCODE Banner Image -->
                <div style = "margin-top:25px">
                <section  class="ps-home__banner">
                    <img src = "https://images.onlineaushadhi.com/img/dpimg.png" class="img-responsive">
                    <a target = "_blank" href = "https://play.google.com/store/apps/details?id=com.tnt.online_aushadhi"> <img class="img-responsive" src = "https://images.onlineaushadhi.com/img/googleplay.png"></a>
                    <a target = "_blank" href = "https://apps.apple.com/us/app/online-aushadhi/id1546529422"><img src = "https://images.onlineaushadhi.com/img/istore.png" class="img-responsive" alt="alt" /></a>
                </section>
                </div>
                
            </div>


        </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
    @endsection
        
    


 

    