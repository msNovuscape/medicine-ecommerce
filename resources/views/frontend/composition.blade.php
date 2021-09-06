@extends('frontend.master')
    @section('content')
        <div class="ps-page--product">
            <div class="container">
                <!-- <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="index.html">Composition Details</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Amlodipine 2.5mg

                    </li>
                </ul> -->
                <div class="ps-page__content">
                    <div class="ps-product--detail">
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                

                            </ul>
                            <div class="tab-content" id="productContent" style="margin-bottom: 80px;">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <h2 class="ps-title">{{$composition->first()->composition}}</h2>

                                        <table class="table ps-table ps-table--oriented m-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-table__th">Composition</th>
                                                    <td>{{$composition->first()->composition}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Indications</th>
                                                    <td>{{strip_tags($composition->first()->indications)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Uses</th>
                                                    <td>{{strip_tags($composition->first()->uses)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-table__th">Side effects
                                                    </th>
                                                    <td>{{strip_tags($composition->first()->side_effects)}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <section class="ps-section--latest mb-50">
                            <h3 class="ps-section__title"> Available Brands</h3>
                            <div class="ps-section__carousel">
                                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                    data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                    data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                    @foreach($medicines as $medicine)
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                        href="{{route('frontend.product',['slug' => $medicine->slug])}}">
                                                        <figure>
                                                        @if($medicine->img == null && $medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else 
                                                    <img src="{{$medicine->img ?? $medicine->image_url}}" alt="Image unavailable" />
                                                @endif   
                                                        </figure>
                                                    </a>
                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $medicine->id])}}"><i class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$medicine->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                    </div>
                                                    <!-- <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--sold">Sold Out</div>
                                                    </div> -->
                                                </div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $medicine->slug])}}">{{$medicine->medicine_name}}</a></h5>
                                                    <div class="ps-product__meta"><span class="ps-product__price sale">
                                                        @php
                                                            $price = App\Models\Stock::where('medicine_id',$medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $medicine->sp_per_piece;
                                                        @endphp
                                                        Rs
                                                    {{$price == 0 ? 'N/A':$price}}</span>
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
                                                        href="javascript:add_to_cart({{$medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$medicine->id}}">Add to
                                                                cart</a></div>
                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$medicine->id}})" route = "{{route('frontend.add_to_cart')}}" id = "{{$medicine->id}}"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist">
                                                            <a href="{{route('wishlist.add',['product_id' => $medicine->id])}}"><i class="fa fa-heart-o"></i></a>
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
        </div>
    @endsection