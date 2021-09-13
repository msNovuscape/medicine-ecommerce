@extends('frontend.master')
    @section('content')
                    <div class = "container">
                    <section class="ps-section--featured">
                    <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Search Results</li>
                    </ul>
                        <div class="ps-section__content">
                            
                            <div class="row m-0">
                              @foreach($results as $result)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $result->slug])}}">

                                                    @if($result->img == null && $result->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                    @else    
                                                    <img src="{{$result->img ?? $result->image_url}}" alt="Image unavailable" />
                                                    @endif
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" title="Wishlist"><a href="{{route('wishlist.add',['product_id' => $result->id])}}"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$result->id}})" id="{{$result->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $result->slug])}}">{{$result->medicine_name}}</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price">@php
                                                            $price = App\Models\Stock::where('medicine_id',$result->id)->orderBy('id','desc')->first()->sp_per_tab ?? $result->sp_per_piece;
                                                        @endphp
                                                        Rs
                                                    {{$price == 0 ? 'N/A':$price}}</span>
                                                </div>
                                                
                                                
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$result->id}})" id="{{$result->id}}" route="{{route('frontend.add_to_cart')}}">Add
                                                            to cart</a></div>
                                                    <div class="ps-product__item cart" title="Add to cart"><a href="javascript:add_to_cart({{$result->id}})" id="{{$result->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" title="Wishlist"><a
                                                        href="{{route('wishlist.add',['product_id' => $result->id])}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                                <!-- Pagination -->
                
                            </div>
                            
                            
                        </div>
                    </section>
                    </div>
                @endsection

                    @section('scripts')
                        <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
                    @endsection