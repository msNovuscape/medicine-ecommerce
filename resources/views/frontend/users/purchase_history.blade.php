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
                    <li class="ps-breadcrumb__item active" aria-current="page">Purchase History</li>
                </ul>
                <h3 class="ps-wishlist__title">Purchase History</h3>
                <div class="ps-wishlist__content" style = "margin-top:-20px">

                    <!-- WishList to be displayed for small resolutions only -->
                    <ul class="ps-wishlist__list">
                    @forelse($purchases as $purchase)
                        <li>
                            <div class="ps-product ps-product--wishlist">
                               
                                <div class="ps-product__content">
                                    </h5>
                                    <div class="ps-product__row">
                                        <div class="ps-product__label">Order No.:</div>
                                        <div class="ps-product__value"><span class="ps-product__price sale">{{$purchase->id}}
                                        </div>
                                    </div>
                                    <div class="ps-product__row ps-product__stock">
                                        <div class="ps-product__label">Order Date.:</div>
                                        <div class="ps-product__value"><span class="ps-product__out-stock ">{{$purchase->date}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ps-product__row ps-product__quantity">
                                        <div class="ps-product__label">Delivery Date:</div>
                                        <div class="ps-product__value">{{$purchase->delivery_date}}</div>
                                    </div>
                                    <div class="ps-product__row ps-product__subtotal">
                                        <div class="ps-product__label">Total(NRs):</div>
                                        <div class="ps-product__value">Rs {{$purchase->total_amount}}</div>
                                    </div>
                                    <div class="ps-product__row ps-product__subtotal">
                                        <div class="ps-product__label">Discount(NRs):</div>
                                        <div class="ps-product__value">Rs {{$purchase->discount_amount}}</div>
                                    </div>
                                    <div class="ps-product__row ps-product__subtotal">
                                        <div class="ps-product__label">Net Price(NRs):</div>
                                        <div class="ps-product__value">Rs {{$purchase->net_amount}}</div>
                                    </div>
                                    <div class="ps-product__cart">
                                        <a href = "javascript:viewDetails({{$purchase->id}})" route = "{{route('purchase.view_details')}}" id = "{{$purchase->id}}" class="ps-btn ps-btn--lblue">Details</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                    <li>
                        <div class="ps-product ps-product--wishlist">
                            You donot have any complete order till now.
                        </div>
                    </li>        
                    @endforelse    
                        
                    </ul>
                    <!-- End WishList to be displayed for small resolutions only -->

                    <div class="ps-wishlist__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__name">SN No.</th>
                                    <th class="ps-product__name">Order No.</th>
                                    <th class="ps-product__meta">Order Date</th>
                                    <th class="ps-product__status">Delivery Date</th>
                                    <th class="ps-product__cart">Total(NRs)</th>
                                    <th class="ps-product__cart">Discount(NRs)</th>
                                    <th class="ps-product__cart">Net Price(NRs)</th>
                                    <th class="ps-product__cart">Details</th>
                                </tr>
                            </thead>
                            <tbody style = "line-height:0.2px">
                                @php($i = ($purchases->currentpage()-1)* $purchases->perpage() + 1)
                                @forelse($purchases as $purchase)
                                    <tr height = "10px">
                                        <td class="ps-product__name"> {{$i}}
                                        </td>
                                        <td class="ps-product__meta"> {{$purchase->id}}</span>
                                        </td>
                                        <td class="cs_out_of_stock"> {{$purchase->date}}
                                        </td>
                                        <td class="cs_out_of_stock"> {{$purchase->delivery_date}}
                                        </td>
                                        <td class="ps-product__cart">
                                            {{$purchase->total_amount}}
                                        </td>
                                        <td class="ps-product__cart">
                                            {{$purchase->discount_amount}}
                                        </td>
                                        <td class="ps-product__cart">
                                            {{$purchase->net_amount}}
                                        </td>
                                        <td class="ps-product__cart" data-toggle="tooltip" data-placement="left" title="View Details">
                                            <a href = "javascript:viewDetails({{$purchase->id}})" route = "{{route('purchase.view_details')}}" id = "{{$purchase->id}}">View</a>
                                        </td>
                                    </tr>
                                @php($i++)
                                @empty
                                <td colspan = "16" class="ps-product__cart">You donot have any complete order till now.</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Pagination -->
                @if ($purchases->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($purchases->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $purchases->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $purchases->lastPage(); $i++)
                                <li class="{{ ($purchases->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $purchases->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($purchases->currentPage() == $purchases->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $purchases->url($purchases->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                @endif        
            </div>
        </div> 
        @section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection
    @endsection    