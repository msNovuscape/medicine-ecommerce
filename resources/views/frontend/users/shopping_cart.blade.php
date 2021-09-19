@extends('frontend.master')

@section('content')
        <div class="ps-shopping">
            <div class="container">
                <div class="row mt-20 mb-30">
                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('purchase.index')}}" class="cs_btn ps-btn--primary">Purchase History</a>
                    </div>

                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('wishlist.index')}}" class="cs_btn ps-btn--primary">View Wish List</a>
                    </div>

                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('shopping_cart.index')}}" class="cs_btn ps-btn--primary">View Cart</a>
                    </div>

                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('order.index')}}" class="cs_btn ps-btn--primary">My Orders</a>
                    </div>

                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('frontend.list_prescription')}}" class="cs_btn ps-btn--primary">My Prescription</a>
                    </div>
                </div>
                <ul class="ps-breadcrumb" style = "margin-top:-35px">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="{{route('account.index')}}">Account</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Shopping cart</li>
                </ul>
                <h3 class="ps-shopping__title">Shopping cart<sup id = "cartCount">@if(Session::has('cart'))({{count(Session::get('cart')->items)}})@endif</sup></h3>
                <div class="ps-shopping__content" style = "margin-top:-20px">
                    @if(isset($products) && $products!= null)
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-9">

                                <!-- Cart to be displayed for small resolutions only -->
                                <ul class="ps-shopping__list">
                                @foreach($products as $product)
                                    <li>
                                        <div class="ps-product ps-product--wishlist">
                                            <div class="ps-product__remove"><a href="{{route('shopping_cart.remove',['id' => $product['item']['id']])}}"><i class="icon-cross"></i></a></div>
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $product['item']->slug])}}">
                                                    <figure>@if($product['item']->img == null && $product['item']->image_url == null)<img src = "https://images.onlineaushadhi.com/img/no-med.png">@endif<img src="{{$product['item']->img ?? $product['item']->image_url}}">
                                                    </figure>
                                                </a></div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $product['item']->slug])}}">{{$product['item']->medicine_name}}</a></h5>
                                                <div class="ps-product__row">
                                                    <div class="ps-product__label">Price:</div>
                                                    <div class="ps-product__value"><span class="ps-product__price">Rs
                                                    {{App\Models\Stock::where('medicine_id',$product['item']->id)->orderBy('id','desc')->first()->sp_per_tab ?? $product['item']->sp_per_piece}}</span>
                                                    </div>
                                                </div>
                                                <div class="ps-product__row ps-product__stock">
                                                    <div class="ps-product__label">Stock:</div>
                                                    <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                            Stock</span>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart">
                                                    <button class="ps-btn">Add to cart</button>
                                                </div>
                                                <div class="ps-product__row ps-product__quantity">
                                                    <div class="ps-product__label">Quantity:</div>
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                        onclick = "javascript:reduceByOne({{$product['item']['id']}})" route = "{{route('shopping_cart.reduceByOne')}}" id = "{{$product['item']['id']}}"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" id = "cartQtyMobile{{$product['item']['id']}}" min="1" name="quantity" value="{{$product['qty']}}"
                                                            type="number">
                                                        <button class="plus"
                                                        onclick="javascript:addByOne({{$product['item']['id']}})" route = "{{route('shopping_cart.addByOne')}}" id = "add{{$product['item']['id']}}"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__row ps-product__subtotal">
                                                    <div class="ps-product__label">Subtotal:</div>
                                                    <div class="ps-product__value" id = "cartPriceMobile{{$product['item']['id']}}">Rs {{$product['price']}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach    
                                    
                                </ul>
                                <!-- End Cart to be displayed for small resolutions only -->

                                <div class="ps-shopping__table">
                                    <table class="table ps-table ps-table--product">
                                        <thead>
                                            <tr>
                                                <th class="ps-product__remove"></th>
                                                <th class="ps-product__thumbnail"></th>
                                                <th class="ps-product__name">Product name</th>
                                                <th class="ps-product__meta">Unit price</th>
                                                <th class="ps-product__quantity">Quantity</th>
                                                <th class="ps-product__subtotal">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody style = "line-height:0.2px">
                                          @foreach($products as $product)
                                            <tr id = "row{{$product['item']->id}}">
                                                <td class="ps-product__remove"> <a href="{{route('shopping_cart.remove',['id' => $product['item']['id']])}}"><i class="icon-cross"></i></a>
                                                </td>
                                                <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="{{route('frontend.product',['slug' => $product['item']->slug])}}">
                                                        <figure>@if($product['item']->img == null && $product['item']->image_url == null)<img src = "https://images.onlineaushadhi.com/img/no-med.png">@endif<img src="{{$product['item']->img ?? $product['item']->image_url}}"></figure>
                                                    </a></td>
                                                <td class="ps-product__name"> <a href="{{route('frontend.product',['slug' => $product['item']->slug])}}">{{$product['item']->medicine_name}}</a></td>
                                                <td class="ps-product__meta"> <span class="ps-product__price">Rs
                                                {{App\Models\Stock::where('medicine_id',$product['item']->id)->orderBy('id','desc')->first()->sp_per_tab ?? $product['item']->sp_per_piece}}</span>
                                                </td>
                                                <td class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus" onclick = "javascript:reduceByOne({{$product['item']['id']}})" route = "{{route('shopping_cart.reduceByOne')}}" id = "{{$product['item']['id']}}">
                                                           <i class="icon-minus"></i></button>
                                                        <input class="quantity" id = "cartQty{{$product['item']['id']}}" min="1" name="quantity" value="{{$product['qty']}}"
                                                            type="number">
                                                        <button class="plus"
                                                            onclick="javascript:addByOne({{$product['item']['id']}})" route = "{{route('shopping_cart.addByOne')}}" id = "add{{$product['item']['id']}}"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </td>
                                                </td>
                                                <td class="ps-product__subtotal" id = "cartPrice{{$product['item']['id']}}">Rs {{$product['price']}}</td>
                                            </tr>
                                            @endforeach
                                            <!-- <tr>
                                                <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a>
                                                </td>
                                                <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="product1.html">
                                                        <figure><img src="img/products/001.jpg" alt></figure>
                                                    </a></td>
                                                <td class="ps-product__name"> <a href="product1.html">Digital Thermometer
                                                        X30-Pro</a></td>
                                                <td class="ps-product__meta"> <span class="ps-product__price sale">Rs
                                                        77.65</span><span class="ps-product__del">Rs 80.65</span>
                                                </td>
                                                <td class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="1" name="quantity" value="1"
                                                            type="number">
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="ps-product__subtotal">Rs 77.65</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ps-shopping__footer">
                                    <!-- <div class="ps-shopping__coupon">
                                        <input class="form-control ps-input" type="text" placeholder="Coupon code">
                                        <button class="ps-btn ps-btn--lblue" type="button">Apply coupon</button>
                                    </div> -->
                                    <!-- <div class="ps-shopping__button">
                                        <button class="ps-btn ps-btn--lblue" type="button">Update cart</button>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-3">
                                <div class="ps-shopping__label">Cart totals</div>
                                <div class="ps-shopping__box">
                                    <div class="ps-shopping__row">
                                        <div class="ps-shopping__label">Subtotal</div>
                                        <div class="ps-shopping__price" id = "cartTotalPrice">Rs {{$totalPrice ?? 0}}</div>
                                    </div>
                                    <div class="ps-shopping__row">
                                        <div class="ps-shopping__label">Delivery</div>
                                        <div class="ps-shopping__price">Free</div>
                                    </div>

                                    <div class="ps-shopping__row">
                                        <div class="ps-shopping__label">Total</div>
                                        <div class="ps-shopping__price" id = "cartNetTotalPrice">Rs {{$totalPrice}}</div>
                                    </div>
                                    <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--success"
                                    onclick = "javascript:confirm_order({{$totalPrice}})" route="{{route('frontend.order_complete')}}" id = "confirm_order">Checkout</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                <h3>Your cart is empty!</h3>
                                <!-- <a class="btn btn-primary" href="{{route('frontend.shop')}}">SHOP NOW</a> -->
                            </div>
                        </div>
                    @endif        
                    
                </div>
                
                        
            <section class="ps-section--featured">
                        <h2 class="ps-section__title"><b>You may be interested in<a style = "float:right;font-size:20px" href ="{{route('frontend.recommended_product')}}">View all</a></h2>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach($recommended_medicines as $recommended_medicine)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
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
                                                <div class="ps-product__meta"><span class="ps-product__price">Rs
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
                    </section>
                    </div>
        
                </div>
        @section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection
@endsection