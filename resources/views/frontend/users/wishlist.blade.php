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
                        <a href="{{route('order.index')}}" class="cs_btn ps-btn--primary">My Orders</a>
                    </div>
                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('frontend.list_prescription')}}" class="cs_btn ps-btn--primary">My Prescription</a>
                    </div>
            </div>
                <ul class="ps-breadcrumb" style = "margin-top:-35px">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="{{route('account.index')}}">Account</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Wishlist</li>
                </ul>
                <h3 class="ps-wishlist__title">My wishlist</h3>
                <div class="ps-wishlist__content" style = "margin-top:-30px">

                    <!-- WishList to be displayed for small resolutions only -->
                    <ul class="ps-wishlist__list">
                    @forelse ($wishlist_medicines as $wishlist_medicine)
                         <li>
                            <div class="ps-product ps-product--wishlist">
                                <div class="ps-product__remove"><a href="{{route('wishlist.remove',['medicine_id' => $wishlist_medicine->id])}}"><i class="icon-cross"></i></a></div>
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('frontend.product',['slug' => $wishlist_medicine->slug])}}">
                                        <figure>@if($wishlist_medicine->img == null && $wishlist_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$wishlist_medicine->img ?? $wishlist_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                        </figure>
                                    </a></div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $wishlist_medicine->slug])}}">{{$wishlist_medicine->medicine_name}}</a>
                                    </h5>
                                    <div class="ps-product__row">
                                        <div class="ps-product__label">Price:</div>
                                        <div class="ps-product__value"><span class="ps-product__price sale">Rs
                                        {{App\Models\Stock::where('medicine_id',$wishlist_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $wishlist_medicine->sp_per_piece}}</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__row ps-product__stock">
                                        <div class="ps-product__label">Stock:</div>
                                        <div class="ps-product__value"><span class="ps-product__out-stock ">{{$wishlist_medicine->availability == 1 ? 'In Stock' : 'Out of stock'}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ps-product__cart">
                                        <a href="javascript:add_to_cart({{$wishlist_medicine->id}})" id="{{$wishlist_medicine->id}}" route="{{route('frontend.add_to_cart')}}" class="ps-btn ps-btn--lblue">Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </li>
                       
                    @empty 
                    <li>
                        <div class="ps-product ps-product--wishlist">
                            You haven't placed any items in your wishlist.
                        </div>
                    </li>   
                    @endforelse
                    </ul>
                    <!-- End WishList to be displayed for small resolutions only -->

                    <div class="ps-wishlist__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__remove"></th>
                                    <th class="ps-product__thumbnail"></th>
                                    <th class="ps-product__name">Product name</th>
                                    <th class="ps-product__meta">Unit price</th>
                                    <th class="ps-product__status">Stock status</th>
                                    <th class="ps-product__cart">Quantity</th>
                                    <th class="ps-product__cart"></th>
                                </tr>
                            </thead>
                            <tbody style = "line-height:-10px">
                            @forelse ($wishlist_medicines as $wishlist_medicine)
                            <tr>
                                    <td class="ps-product__remove"> <a href="{{route('wishlist.remove',['medicine_id' => $wishlist_medicine->id])}}"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('frontend.product',['slug' => $wishlist_medicine->slug])}}">
                                            <figure>@if($wishlist_medicine->img == null && $wishlist_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$wishlist_medicine->img ?? $wishlist_medicine->image_url}}" alt="Image unavailable" />
                                                @endif</figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="{{route('frontend.product',['slug' => $wishlist_medicine->slug])}}">{{$wishlist_medicine->medicine_name}}</a>
                                    </td>
                                    <td class="ps-product__meta"> <span class="ps-product__price sale">@php
                                                            $price = App\Models\Stock::where('medicine_id',$wishlist_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $wishlist_medicine->sp_per_piece;
                                                        @endphp
                                                        Rs
                                                    {{$price == 0 ? 'N/A':$price}}</span>
                                            <!-- <span class="ps-product__del">Rs 80.65</span> -->
                                    </td>
                                    <td class="cs_out_of_stock"> <span>{{$wishlist_medicine->availability == 1 ? 'In Stock' : 'Out of stock'}} </span>
                                    </td>
                                                    
                                    <td class="ps-product__cart">
                                        <div class = "number-input">
                                        <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input id = "qtyValue{{$wishlist_medicine->id}}" class="quantity" min="1" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                    <a href="javascript:add_to_cart({{$wishlist_medicine->id}})" id="{{$wishlist_medicine->id}}" route="{{route('frontend.add_to_cart')}}" class="ps-btn ps-btn--lblue">Add to cart</a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan = 6>You haven't placed any items in your wishlist.</td>
                                </tr>
                            @endforelse
                                
                                <!-- <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product.html">
                                            <figure><img src="img/products/011.jpg" alt></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product.html">Hill-Rom Affinity III Progressa
                                            iBed</a></td>
                                    <td class="ps-product__meta"> <span class="ps-product__price">Rs 488.23</span>
                                    </td>
                                    <td class="ps-product__status"> <span>In Stock</span>
                                    </td>
                                    <td class="ps-product__cart">
                                        <a href="product.html" class="ps-btn ps-btn--lblue">Add to cart</a>
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
                                    <td class="ps-product__status"> <span>In Stock</span>
                                    </td>
                                    <td class="ps-product__cart">
                                        <a href="product.html" class="ps-btn ps-btn--lblue">Add to cart</a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Pagination -->
                
               
                @if ($wishlist_medicines->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($wishlist_medicines->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $wishlist_medicines->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $wishlist_medicines->lastPage(); $i++)
                                <li class="{{ ($wishlist_medicines->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $wishlist_medicines->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($wishlist_medicines->currentPage() == $wishlist_medicines->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $wishlist_medicines->url($wishlist_medicines->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                @endif
            </div>
        </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection