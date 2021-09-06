@extends('frontend.master')
    @section('content')
        <div class="ps-account">
            <div class="container">


                <!-- Account Page's topbar -->
                <div class="row mt-20 mb-30">
                    <div class="col-10 col-md-2 mb-2">
                        <a href="{{route('purchase.index')}}" class="cs_btn ps-btn--primary">Purchase History</a>
                    </div>

                    <div class="col-10 col-md-2 mb-2">
                        <a href="{{route('wishlist.index')}}" class="cs_btn ps-btn--primary">View Wish List</a>
                    </div>

                    <div class="col-10 col-md-2 mb-2">
                        <a href="{{route('shopping_cart.index')}}" class="cs_btn ps-btn--primary">View Cart</a>
                    </div>

                    <div class="col-10 col-md-2 mb-2">
                        <a href="{{route('order.index')}}" class="cs_btn ps-btn--primary">My Orders</a>
                    </div>
                    <div class="col-10 col-md-2 mb-2">
                        <a href="{{route('frontend.list_prescription')}}" class="cs_btn ps-btn--primary">My Prescription</a>
                    </div>
                </div>

                <!-- <hr> -->
                <div class="flash-message">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                            @if(Session::has('alert-' . $msg))

                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                            @endif
                                            @endforeach
                                        </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <form action="{{route('account.update')}}" method="post">
                            @csrf
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Change Password</h2>
                                
                                <div class="ps-form__group">
                                    <label class="ps-form__label">New Password *</label>
                                    <div class="input-group">
                                        <input class="form-control ps-form__input" type="password" name = "password" required>
                                        <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                                href="javascript: vois(0);"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Confirm Password *</label>
                                    <div class="input-group">
                                        <input class="form-control ps-form__input" type="password" name = "confirm_password" required>
                                        <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                                href="javascript: vois(0);"></a></div>
                                    </div>
                                </div>
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--lblue">Update Password</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8 card">
                        <form action="{{route('account.update')}}" method="post">
                            @csrf
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Update Information</h2>

                                <div class="ps-form__group">
                                    <label class="ps-form__label">Full Name *</label>
                                    <input class="form-control ps-form__input" type="text" required name = "name" value = "{{$user->name}}">
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <label class="ps-form__label">Phone *</label>
                                            <input type='text' name = "phone" required value = "{{$user->phone}}" class="form-control ps-form__input">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <label class="ps-form__label">Address *</label>
                                            <input type='text' name = "address" required value = "{{$user->address}}" class="form-control ps-form__input">
                                        </div>
                                    </div>
                                </div>

                                 <div class="ps-form__group">
                                    <label class="ps-form__label">Email address *</label>
                                    <input class="form-control ps-form__input" type="email" required name = "email" value = "{{$user->email}}">
                                </div>
                                 <input type = "hidden" name = 'id' value = '{{$user->id}}'>  
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--lblue">Update Information</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection    
   
    
  

  