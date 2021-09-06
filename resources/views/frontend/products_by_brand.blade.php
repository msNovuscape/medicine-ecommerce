@extends('frontend.master')


@section('content')

                    <div class = "container">
                    <section class="ps-section--featured">
                        <h3 class="ps-section__title">{{$brand_name}}</h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach($medicines as $medicine)
                                    <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="{{route('frontend.product',['slug' => $medicine->slug])}}">
                                                        <figure>@if($medicine->img == null && $medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$medicine->img ?? $medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" title="Wishlist"><a href="javascript:add_to_wishlist({{$medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$medicine->id}}wishlist"><i
                                                                    class="fa fa-heart-o"></i></a></div>
               
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$medicine->id}})" id="{{$medicine->id}}" route="{{route('frontend.add_to_cart')}}"
                                                                ><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                    </div>
                                                    <!-- <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--sale">Sale</div>
                                                    </div> -->
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $medicine->slug])}}">{{$medicine->medicine_name}}</a></h5>
                                                    <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                    {{App\Models\Stock::where('medicine_id',$medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $medicine->sp_per_piece}}</span>
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
                                                                to cart</a></div>
                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$medicine->id}})" id="{{$medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                        <div class="ps-product__item" title="Wishlist"><a
                                                        href="javascript:add_to_wishlist({{$medicine->id}})" route = "{{route('wishlist.add')}}" id = "{{$medicine->id}}wishlist"><i class="fa fa-heart-o"></i></a></div>
                                                        
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

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection