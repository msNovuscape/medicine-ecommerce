@extends('frontend.master')
    @section('content')       
        <div class="ps-wishlist">
            <div class="container">
                <div class="row mt-20 mb-30">
                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('purchase.index')}}" class="cs_btn ps-btn--primary">Purchase History</a>
                    </div>

                    <div class="col-10 col-md-2 mb-10">
                        <a href="{{route('wishlist.index')}}" class="cs_btn ps-btn--primary">View Wishlist</a>
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
                    <li class="ps-breadcrumb__item active" aria-current="page">My Prescription</li>
                </ul>
                <h3 class="ps-wishlist__title">My Prescription</h3>
                <div class="ps-wishlist__content">
                @if(Session::has('msg'))
                <div class="ps-noti">
                    <p class="m-0">{{Session::get('msg')}}</p>
                    <a class="ps-noti__close"><i class="icon-cross"></i></a>
                </div>
                    {{Session::forget('msg')}}
                    @endif
                    <!-- WishList to be displayed for small resolutions only -->
                    <ul class="ps-wishlist__list">
                    @forelse($prescriptions as $prescription)
                                    @php
                                        $file = explode('.',$prescription->image_path)[1];
                                    @endphp
                        <li>
                            <div class="ps-product ps-product--wishlist">
                                <div class="ps-product__remove"><a href="{{route('frontend.delete_prescription',['id' => $prescription->id])}}"><i class="icon-cross"></i></a></div>
                                <div class="ps-product__thumbnail">@if($file == 'pdf' || $file == 'docx' || $file == 'doc')
                                        <a download = "MyPrescription" href = "{{ URL::asset( 'storage/' . $prescription->image_path ) }}"><p>Download file<p></a>
                                        @endif
                                        @if($file == 'jpg' || $file == 'png' || $file == 'jpeg')
                                        @php $path = URL::asset( 'storage/' . $prescription->image_path ) ;
                                        @endphp
                                        <a href="javascript:imagePopUp({{$prescription->id}})"><img id = "prescription{{$prescription->id}}" widht = "30px" height = "50px" src = "{{ URL::asset( 'storage/' . $prescription->image_path ) }}" alt = "Image unavailable"></a>
                                        @endif</div>
                                <div class="ps-product__content">
                                    
                                    <div class="ps-product__row">
                                        <div class="ps-product__label">Date:</div>
                                        <div class="ps-product__value"><span class="ps-product__price sale">{{$prescription->date}}</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__row">
                                        <div class="ps-product__label">Remark:</div>
                                        <div class="ps-product__value"><span class="ps-product__price sale">{{$prescription->remark}}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="ps-product__row ps-product__stock">
                                        <div class="ps-product__label">Stock:</div>
                                        <div class="ps-product__value"><span class="ps-product__out-stock ">Out of stock
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ps-product__row ps-product__quantity">
                                        <div class="ps-product__label">Quantity:</div>
                                        <div class="ps-product__value">1</div>
                                    </div>
                                    <div class="ps-product__row ps-product__subtotal">
                                        <div class="ps-product__label">Subtotal:</div>
                                        <div class="ps-product__value">Rs 77.65</div>
                                    </div> -->
                                    
                                </div>
                            </div>
                        </li>
                    @empty    
                    <li>
                        <div class="ps-product ps-product--wishlist">You have not uploaded any prescription.</div>
                    </li>
                    @endforelse    
                    </ul>
                    <!-- End WishList to be displayed for small resolutions only -->

                    <div class="ps-wishlist__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__name">SN No.</th>
                                    
                                    <th class="ps-product__meta">Date</th>
                                    <th class="ps-product__status">Prescription</th>
                                    <th class="ps-product__status">Remarks</th>
                                    <th class="ps-product__cart">Delete</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = ($prescriptions->currentpage()-1)* $prescriptions->perpage() + 1;
                                @endphp
                                @forelse($prescriptions as $prescription)
                                    @php
                                        $file = explode('.',$prescription->image_path)[1];
                                    @endphp
                                <tr>
                                    <td class="ps-product__name"> {{$i}}
                                    </td>
                                    <td class="ps-product__meta"> {{$prescription->date}}
                                    </td>
                                    <td>@if($file == 'pdf' || $file == 'docx' || $file == 'doc')
                                        <a download = "MyPrescription" href = "{{ URL::asset( 'storage/' . $prescription->image_path ) }}"></i><p>Download file<p></a>
                                        @endif
                                        @if($file == 'jpg' || $file == 'png' || $file == 'jpeg')
                                        @php $path = URL::asset( 'storage/' . $prescription->image_path ) ;
                                        @endphp
                                        <a href="javascript:imagePopUp({{$prescription->id}})"><img id = "prescription{{$prescription->id}}" widht = "50px" height = "50px" src = "{{ URL::asset( 'storage/' . $prescription->image_path ) }}" alt = "Image unavailable"></a>
                                        @endif
                                    </td>
                                    <td class="ps-product__meta"> {{$prescription->remark}}
                                    <td class="ps-product__meta"> <a href="{{route('frontend.delete_prescription',['id' => $prescription->id])}}"><i class="icon-cross"></i></i></a>
                                    </td>
                                </tr>
                                @php($i++)
                                @empty
                                <tr>
                                    <td colspan = "4">
                                        You have not uploaded any prescription.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Pagination -->
                @if ($prescriptions->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($prescriptions->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $prescriptions->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $prescriptions->lastPage(); $i++)
                                <li class="{{ ($prescriptions->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $prescriptions->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($prescriptions->currentPage() == $prescriptions->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $prescriptions->url($prescriptions->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
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