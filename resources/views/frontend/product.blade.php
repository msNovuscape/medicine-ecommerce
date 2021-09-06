@extends('frontend.master')

@section('content')
<div class="ps-page--product">
            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item"><a>Product</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">{{$product->medicine_name}}
                    </li>
                </ul>
                <div class="ps-page__content">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-xl-7">
                                        <div class="ps-product--gallery">
                                            <div class="ps-product__thumbnail">
                                                <div class="slide">@if($product->img == null && $product->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$product->img ?? $product->image_url}}" alt="Image unavailable" />
                                                @endif   </div>
                                                <div class="slide">@if($product->image_url1 != null)<img src="{{$product->imgage_url1}}" alt="alt" />@else <img src = "https://images.onlineaushadhi.com/img/no-med.png"> @endif</div>
                                                <div class="slide">@if($product->image_url2 != null)<img src="{{$product->imgage_url2}}" alt="alt" />@else <img src = "https://images.onlineaushadhi.com/img/no-med.png"> @endif</div>
                                            </div>
                                            <div class="ps-gallery--image">
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="{{$product->img ?? $prodcut->image_url}}"
                                                            alt="alt" />
                                                    </div>
                                                </div>
                                                <div class="slide">
                                                    <div class="ps-gallery__item">@if($product->image_url1 != null)<img src="{{$product->imgage_url1}}" alt="alt" />@else <img src = "https://images.onlineaushadhi.com/img/no-med.png"> @endif
                                                    </div>
                                                </div>
                                                <div class="slide">
                                                    <div class="ps-gallery__item">@if($product->image_url2 != null)<img src="{{$product->imgage_url2}}" alt="alt" />@else <img src = "https://images.onlineaushadhi.com/img/no-med.png"> @endif
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-5">
                                        <div class="ps-product__info">
                                            <div class="ps-product__title"><a href="#">{{$product->medicine_name}}</a>
                                            </div>
                                                <h4>Manufactured By:</h4>
                                                <ul class="ps-product__list" style = "margin-top:-10px">
                                                    @if($manufacture->isEmpty())
                                                    <li>N/A</li>    
                                                    @else
                                                    <li><a href = "{{route('frontend.manufacturer',['slug' => $manufacture->first()->slug])}}">{{$manufacture->first()->fullname}}</a></li>
                                                    @endif
                                                </ul><br/>
                                            @if($product->composition_id == 0)    
                                                <h4>Brand:</h4>
                                                <ul class="ps-product__list" style = "margin-top:-10px">
                                                @if($brand->isEmpty())
                                                 <li>N/A</li>    
                                                    @else   
                                                    <li><a href = "{{route('frontend.products_by_brand',['slug' => $brand->first()->slug])}}">{{$brand->first()->fullname}}</a></li>
                                                @endif    
                                                </ul>
                                                <!-- <div class="ps-product__desc">
                                                    <ul class="ps-product__list">
                                                        <li>{{$product->item_description}}</li>
                                                    </ul>
                                                </div> -->
                                            @else
                                            <h4>Composition:</h4>
                                                <ul class="ps-product__list" style = "margin-top:-10px">
                                                    <li><a href = "{{route('frontend.composition',['slug' => $composition->first()->slug])}}">{{$product->composition}}</a></li>
                                                </ul>
                                            @endif
                                           
                                            <!-- <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <ul class="ps-product__bundle">
                                                <li><i class="icon-wallet"></i>100% Money back</li>
                                                <li><i class="icon-bag2"></i>Non-contact shipping</li>
                                                <li><i class="icon-truck"></i>Free delivery for order over Rs 200</li>
                                            </ul>
                                            <div class="ps-product__type">
                                                <ul class="ps-product__list">
                                                    <li> <span class="ps-list__title">Tags: </span><a
                                                            class="ps-list__text" href="#">Health</a><a
                                                            class="ps-list__text" href="#">Thermometer</a>
                                                    </li>
                                                    <li> <span class="ps-list__title">SKU: </span><a
                                                            class="ps-list__text" href="#">BM100</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__social">
                                                <ul class="ps-social ps-social--color">
                                                    <li><a class="ps-social__link facebook" href="#"><i
                                                                class="fa fa-facebook">
                                                            </i><span class="ps-tooltip">Facebook</span></a></li>
                                                    <li><a class="ps-social__link twitter" href="#"><i
                                                                class="fa fa-twitter"></i><span
                                                                class="ps-tooltip">Twitter</span></a></li>
                                                    <li><a class="ps-social__link pinterest" href="#"><i
                                                                class="fa fa-pinterest-p"></i><span
                                                                class="ps-tooltip">Pinterest</span></a></li>
                                                    <li class="ps-social__linkedin"><a class="ps-social__link linkedin"
                                                            href="#"><i class="fa fa-linkedin"></i><span
                                                                class="ps-tooltip">Linkedin</span></a></li>
                                                    <li class="ps-social__reddit"><a
                                                            class="ps-social__link reddit-alien" href="#"><i
                                                                class="fa fa-reddit-alien"></i><span
                                                                class="ps-tooltip">Reddit Alien</span></a></li>
                                                    <li class="ps-social__email"><a class="ps-social__link envelope"
                                                            href="#"><i class="fa fa-envelope-o"></i><span
                                                                class="ps-tooltip">Email</span></a></li>
                                                    <li class="ps-social__whatsapp"><a class="ps-social__link whatsapp"
                                                            href="#"><i class="fa fa-whatsapp"></i><span
                                                                class="ps-tooltip">WhatsApp</span></a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-3">
                                <div class="ps-product__feature">
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> {{$product->availability == 1  ? 'In Stock' : 'Out of Stock'}}</span>
                                    </div>
                                    @php
                                    $price = $stock->first()->sp_per_tab ?? $product->sp_per_piece;
                                    @endphp
                                    <div class="ps-product__meta"><span class="ps-product__price">Rs {{$price == 0 ? 'N/A' : $price}}</span>
                                    </div>

                                    <div class="ps-product__quantity">
                                        <h6>Quantity</h6>
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                    class="icon-minus"></i></button>
                                            <input id = "qtyValue{{$product->id}}" class="quantity" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                    class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    @if($isNarcotic == 1)
                                    <a class="ps-btn ps-btn--lblue" href="javascript:isNarcotic()"
                                        >Add to cart</a>
                                    @else
                                    <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$product->id}})" id="{{$product->id}}" route="{{route('frontend.add_to_cart')}}"
                                        >Add to cart</a>
                                    @endif    
                                    <div class="ps-product__variations"><a class="ps-product__link"
                                    href="javascript:add_to_wishlist({{$product->id}})" route = "{{route('wishlist.add')}}" id = "{{$product->id}}wishlist">Add to
                                            wishlist</a></div>
                                </div>
                            </div>
                        </div>
                        @if($product->composition_id != 0)
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                            
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab"
                                            data-toggle="tab" href="#description-content" role="tab"
                                            aria-controls="description-content" aria-selected="true">Uses</a>
                                    </li>        
                                <li class="nav-item" role="presentation"><a class="nav-link" id="information-tab"
                                        data-toggle="tab" href="#information-content" role="tab"
                                        aria-controls="information-content" aria-selected="false">Indications</a>
                                </li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="specification-tab"
                                        data-toggle="tab" href="#specification-content" role="tab"
                                        aria-controls="specification-content" aria-selected="false">Side Effects</a>
                                </li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab"
                                        data-toggle="tab" href="#reviews-content" role="tab"
                                        aria-controls="reviews-content" aria-selected="false">Expert Advice</a></li>
                            </ul>
                            <div class="tab-content" id="productContent" style="margin-bottom: 80px;">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div>
                                        {{strip_tags($composition->first()->uses)}}
                                        <!-- <ul class="ps-list">
                                            <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                                    src="img/icon/bacterial.svg" alt=""><span>Study history up to 30
                                                    days</span>
                                            </li>
                                            <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                                    src="img/icon/virus.svg" alt=""><span>Up to 5 users
                                                    simultaneously</span>
                                            </li>
                                            <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                                    src="img/icon/ribbon.svg" alt=""><span>Has HEALTH certificate</span>
                                            </li>
                                        </ul>
                                        <table class="table ps-table ps-table--oriented m-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-table__th">Power</th>
                                                    <td>5,049</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Windows</th>
                                                    <td>64bit Windows 7*, 8 or 10</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Graphic Card</th>
                                                    <td>4Gb dedicated Graphics card (such as NVIDIA – Open GL 4.0 or
                                                        later)</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">HDD</th>
                                                    <td>500Gb HDD (this is more driven by the amount of data you want to
                                                        keep on
                                                        your computer, rather than LSS itself)</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Screen</th>
                                                    <td>Single HD Screen (1920×1080 with 100% desktop scaling) or
                                                        1366×768 with
                                                        second monitor 1920×1080 or higher</td>
                                                </tr>
                                            </tbody>
                                        </table> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="information-content" role="tabpanel"
                                    aria-labelledby="information-tab">
                                    {{strip_tags($composition->first()->indications)}}
                                </div>
                                <div class="tab-pane fade" id="specification-content" role="tabpanel"
                                    aria-labelledby="specification-tab">
                                    {{strip_tags($composition->first()->side_effects)}}
                                    <!-- <div class="ps-table__name">Performance</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">Higher memory bandwidth</th>
                                                <td>1,544 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Higher pixel rate</th>
                                                <td>74.1 GPixel/s</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ps-table__name">Speed</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">More shading units</th>
                                                <td>1,544 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Better PassMark direct compute score</th>
                                                <td>3,953 GFLOPS</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">More texture mapping units</th>
                                                <td>123.5 GTexel/s</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Higher memory clock speed</th>
                                                <td>1,759 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Better floating-point performance</th>
                                                <td>5,049</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ps-table__name">Information</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">Power</th>
                                                <td>5,049</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Windows</th>
                                                <td>64bit Windows 7*, 8 or 10</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Graphic Card</th>
                                                <td>4Gb dedicated Graphics card (such as NVIDIA – Open GL 4.0 or later)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">HDD</th>
                                                <td>500Gb HDD (this is more driven by the amount of data you want to
                                                    keep on
                                                    your computer, rather than LSS itself)</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Screen</th>
                                                <td>Single HD Screen (1920x1080 with 100% desktop scaling) or 1366x768
                                                    with
                                                    second monitor 1920x1080 or higher</td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                </div>
                                <div class="tab-pane fade" id="reviews-content" role="tabpanel"
                                    aria-labelledby="reviews-tab">
                                    {{strip_tags($composition->first()->expert_advice)}}
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                            
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="uses-tab"
                                            data-toggle="tab" href="#description-content" role="tab"
                                            aria-controls="description-content" aria-selected="true">Description</a>
                                    </li>        
                            </ul>
                            <div class="tab-content" id="productContent" style="margin-bottom: 80px;">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                    aria-labelledby="uses-tab">
                                    <div class="ps-document">
                                        <p class="ps-desc">{{strip_tags($product->description)}}</p>
                                       
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        @endif
                    </div>
                    @if($product->composition_id == 0)
                        <section class="ps-section--latest mb-50">
                            <h3 class="ps-section__title">Similar Products</h3>
                            <div class="ps-section__carousel">
                                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                    data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                    data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                    @foreach($similar_products as $similar_product)
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="{{route('frontend.product',['slug' => $similar_product->slug])}}">
                                                        <figure>@if($similar_product->img == null && $similar_product->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$similar_product->img ?? $similar_product->image_url}}" alt="Image unavailable" />
                                                @endif  
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $similar_product->id])}}"><i class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$similar_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$similar_product->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                    </div>
                                                    <!-- <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--sold">Sold Out</div>
                                                    </div> -->
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $similar_product->slug])}}">{{$similar_product->medicine_name}}</a></h5>
                                                    <div class="ps-product__meta" style = "margin-top:-15px"><span class="ps-product__price sale">Rs
                                                            {{$similar_product->sp_per_piece}}</span>
                                                    </div>
                                                    <!-- <div class="ps-product__rating">
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
                                                    </div> -->
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
                                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="javascript:add_to_cart({{$similar_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$similar_product->id}}">Add to
                                                                cart</a></div>
                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$similar_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$similar_product->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $similar_product->id])}}"><i class="fa fa-heart-o"></i></a>
                                                        </div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X500
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X2000
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X2500
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                    <div class="ps-badge ps-badge--sold">Sold Out</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="product1.html">GAnti-Dust Filter,
                                                        Breathable, 3 Layers of
                                                        Purifying</a></h5>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                <h5 class="ps-product__title"><a href="product1.html">Red Hot Water Bottle,
                                                        2 Quart Capacity</a>
                                                </h5>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                    <div class="ps-badge ps-badge--sold">Sold Out</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
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
                                                        data-placement="left" title="Wishlist">
                                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Share"><a href="#" data-toggle="modal"
                                                            data-target="#share"><i class="fa fa-share-alt"></i></a></div>
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
                                                <h5 class="ps-product__title"><a href="product1.html">Oxygen concentrator
                                                        model KTS-5000</a>
                                                </h5>
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
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal" data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist">
                                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </section>
                    @else
                        <section class="ps-section--latest mb-50">
                            <h3 class="ps-section__title"> Available Subsitiute</h3>
                            <div class="ps-section__carousel">
                                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                    data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                    data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                    @foreach($substitute_products as $substitute_product)
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="{{route('frontend.product',['slug' => $substitute_product->slug])}}">
                                                        <figure>@if($substitute_product->img == null && $substitute_product->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$substitute_product->img ?? $substitute_product->image_url}}" alt="Image unavailable" />
                                                @endif   
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $substitute_product->id])}}"><i class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$substitute_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$substitute_product->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $substitute_product->slug])}}">{{$substitute_product->medicine_name}}</a></h5>
                                                    <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                    {{App\Models\Stock::where('medicine_id',$substitute_product->id)->orderBy('id','desc')->first()->sp_per_tab ?? $substitute_product->sp_per_piece}}</span>
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
                                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="javascript:add_to_cart({{$substitute_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$substitute_product->id}}">Add to
                                                                cart</a></div>
                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$substitute_product->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$substitute_product->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $substitute_product->id])}}"><i class="fa fa-heart-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif
                    
                    <p>Note: Prices are subjected to change at the time of delivery according to manufacturer's policy.</p>                           
                    
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection