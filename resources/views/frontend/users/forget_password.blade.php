@extends('frontend.master')
@section('content')
        <div class="ps-account">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-12 col-md-6">
                        <img src="https://images.onlineaushadhi.com/img/alogin.png" height = "55%" alt="alt" />
                    </div>  -->
                    <div class="col-12 col-md-6">            
                    <form action="{{route('account.send_reset_link')}}" style = "align:center" method="post">
                            @csrf
                            <div class="ps-form--review" >
                                <h2 class="ps-form__title">Reset Password</h2>
                                <div class="flash-message">
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                            @if(Session::has('alert-' . $msg))

                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                            @endif
                                            @endforeach
                                        </div>
                                <div class="ps-form__group" >
                                    <label class="ps-form__label">Email address *</label>
                                    <input class="form-control ps-form__input" type="email" name = 'email' required>
                                </div>
                                
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--lblue">Send reset link</button>
                                    
                                </div>
                                Not registered yet?<a class="ps-account__link" href="{{route('register')}}">Register here.</a>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection 