@extends('frontend.master')
    @section('content')
        <div class = "container">
        <section class="ps-section--featured">
                        <h3 class="ps-section__title">Best Deal Products</h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach($best_deal_medicines as $best_deal_medicine)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $best_deal_medicine->slug])}}">
                                                    @if($best_deal_medicine->img == null && $best_deal_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$best_deal_medicine->img ?? $best_deal_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" title="Wishlist"><a href="{{route('wishlist.add',['product_id' => $best_deal_medicine->id])}}"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$best_deal_medicine->id}})" id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $best_deal_medicine->slug])}}">{{$best_deal_medicine->medicine_name}}</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                {{App\Models\Stock::where('medicine_id',$best_deal_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $best_deal_medicine->sp_per_piece}}</span>
                                                </div>
                                                
                                                
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                    href="javascript:add_to_cart({{$best_deal_medicine->id}})" id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add
                                                            to cart</a></div>
                                                    <div class="ps-product__item cart" title="Add to cart"><a href="javascript:add_to_cart({{$best_deal_medicine->id}})" id="{{$best_deal_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" title="Wishlist"><a
                                                        href="{{route('wishlist.add',['product_id' => $best_deal_medicine->id])}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Pagination -->
                
                            </div>
                            @if ($best_deal_medicines->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($best_deal_medicines->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $best_deal_medicines->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $best_deal_medicines->lastPage(); $i++)
                                <li class="{{ ($best_deal_medicines->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $best_deal_medicines->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($best_deal_medicines->currentPage() == $best_deal_medicines->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $best_deal_medicines->url($best_deal_medicines->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                @endif 
                            
                        </div>
            </section>
        </div>
            
    @endsection

                    @section('scripts')
                        <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
                    @endsection