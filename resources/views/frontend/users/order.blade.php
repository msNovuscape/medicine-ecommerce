@extends('frontend.master')

    @section('content')
    <div class="ps-wishlist">
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
                        <a href="{{route('order.index')}}" class="cs_btn ps-btn--primary active">My Orders</a>
                    </div>
                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('frontend.list_prescription')}}" class="cs_btn ps-btn--primary">My Prescription</a>
                    </div>
                </div>
                <ul class="ps-breadcrumb" style = "margin-top:-35px">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="{{route('account.index')}}">Account</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">My Orders</li>
                </ul>
                <h3 class="ps-wishlist__title">My Orders</h3>
                <div class="ps-wishlist__content" style = "margin-top:-30px">

                    <!-- WishList to be displayed for small resolutions only -->
                    <ul class="ps-wishlist__list">
                     @forelse($orders as $order)
                        <li>
                            <div class="ps-product ps-product--wishlist">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('frontend.product',['slug' => $order->medicine_slug])}}">
                                        <figure><img src="{{$order->img_src}}" alt>
                                        </figure>
                                    </a></div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $order->medicine_slug])}}">{{$order->medicine_name}}</a>
                                    </h5>
                                    <div class="ps-product__row">
                                        <div class="ps-product__label">Price:</div>
                                        <div class="ps-product__value"><span class="ps-product__price sale">Rs
                                        {{$order->sp_per_piece}}
                                        </div>
                                    </div>
                                    
                                    <div class="ps-product__row ps-product__quantity">
                                        <div class="ps-product__label">Quantity:</div>
                                        <div class="ps-product__value">{{$order->quantity}}</div>
                                    </div>
                                    <div class="ps-product__row ps-product__subtotal">
                                        <div class="ps-product__label">Subtotal:</div>
                                        <div class="ps-product__value">Rs {{$order->sp_per_piece * $order->quantity}}</div>
                                    </div>
                                    <div class="ps-product__row ps-product__stock">
                                        <div class="ps-product__label">Status:</div>
                                        <div class="ps-product__value"><span class="ps-product__out-stock">@if($order->order_status == 0){{'Pending'}}@elseif($order->order_status == 1){{'Processing'}}@else{{'Completed'}}@endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> 
                    @empty
                    <li>
                            <div class="ps-product ps-product--wishlist">
                                You donot have any incomplete order.
                            </div>
                    </li>        
                    @endforelse       
                     
                    </ul>
                    <!-- End WishList to be displayed for small resolutions only -->

                    <div class="ps-wishlist__table" style = "margin-top:-20px">
                    <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__remove"></th>
                                    <th class="ps-product__thumbnail"></th>
                                    <th class="ps-product__name">Product name</th>
                                    <th class="ps-product__meta">Unit price</th>
                                    <th class="ps-product__meta">Quantity</th>
                                    <th class="ps-product__meta">Subtotal</th>
                                    <th class="ps-product__status">Status</th>
                                    <th class="ps-product__cart"></th>
                                </tr>
                            </thead>
                            <tbody style = "line-height:0.2px">
                                @forelse($orders as $order)
                                <tr>
                                    <td class="ps-product__remove"> <a href="#"></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('frontend.product',['slug' => $order->medicine_slug])}}">
                                            <figure><img src="{{$order->img_src}}" alt></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="{{route('frontend.product',['slug' => $order->medicine_slug])}}">{{$order->medicine_name}}</a>
                                    </td>
                                    <td class="ps-product__meta"> <span class="ps-product__price sale">Rs
                                            {{$order->sp_per_piece}}</span>
                                    </td>
                                    <td><span class="ps-product__price sale">{{$order->quantity}}</span></td>
                                    <td><span class="ps-product__price sale">Rs {{$order->sp_per_piece * $order->quantity}}</span></td>
                                    <td class="cs_out_of_stock"> <span> @if($order->order_status == 0){{'Pending'}}@elseif($order->order_status == 1){{'Processing'}}@else{{'Completed'}}@endif</span>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan = "8">You donot have any incomplete order.</td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Pagination -->
                @if ($orders->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($orders->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $orders->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                <li class="{{ ($orders->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $orders->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($orders->currentPage() == $orders->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $orders->url($orders->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                @endif 
            </div>
        </div>
    @endsection