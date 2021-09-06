@extends('frontend.master')
    @section('content')
    <div class = "container">
            <section class="ps-section--featured">
                        <h3 class="ps-section__title">Covid Essentials</h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                              @foreach($covid_medicines as $covid_medicine)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $covid_medicine->slug])}}">

                                                    @if($covid_medicine->img == null && $covid_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                    @else    
                                                    <img src="{{$covid_medicine->img ?? $covid_medicine->image_url}}" alt="Image unavailable" />
                                                    @endif
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" title="Wishlist"><a href="{{route('wishlist.add',['product_id' => $covid_medicine->id])}}"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$covid_medicine->id}})" id="{{$covid_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $covid_medicine->slug])}}">{{$covid_medicine->medicine_name}}</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                {{App\Models\Stock::where('medicine_id',$covid_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $covid_medicine->sp_per_piece}}</span>
                                                </div>
                                                
                                                
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$covid_medicine->id}})" id="{{$covid_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add
                                                            to cart</a></div>
                                                    <div class="ps-product__item cart" title="Add to cart"><a href="javascript:add_to_cart({{$covid_medicine->id}})" id="{{$covid_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" title="Wishlist"><a
                                                        href="{{route('wishlist.add',['product_id' => $covid_medicine->id])}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                                <!-- Pagination -->
                
                            </div>
                            @if ($covid_medicines->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($covid_medicines->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $covid_medicines->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $covid_medicines->lastPage(); $i++)
                                <li class="{{ ($covid_medicines->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $covid_medicines->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($covid_medicines->currentPage() == $covid_medicines->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $covid_medicines->url($covid_medicines->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
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