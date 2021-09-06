
@extends('frontend.master')

@section('content')
        <div class="ps-account">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="https://images.onlineaushadhi.com/img/aregister.png" alt="alt" height = "60%" />
                    </div>
                    <div class="col-12 col-md-6">
                    <form action="{{route('post_register')}}" method="post">
                                @csrf
                                <div class="flash-message">
                                
                                
                                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                    @if(Session::has('alert-validation-' . $msg))

                                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-validation-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                    @endif
                                                @endforeach
                                            </div>
                                <div style = "" class="ps-form--review">
                                    <h2 class="ps-form__title">Register</h2>
                                    @if($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                        @if($errors->has('password'))
                                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    <div class = "row">
                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Full Name *</label>
                                                <input class="form-control ps-form__input" type="text" name = "name" value = "{{old('name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Address *</label>
                                                <input type='text' name = "address" value = "{{old('address')}}" class="form-control ps-form__input" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Phone *</label>
                                                <input type='text' name = "phone" value = "{{old('phone')}}" class="form-control ps-form__input" required>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Email address *</label>
                                                <input class="form-control ps-form__input" type="email" name = "email" value = "{{old('email')}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Password *</label>
                                                <div class="input-group">
                                                    <input class="form-control ps-form__input" type="password" name = "password" required>
                                                    <div class="input-group-append"><a
                                                            class="fa fa-eye-slash toogle-password"
                                                            href="javascript: vois(0);"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="ps-form__group">
                                                <label class="ps-form__label">Confirm Password *</label>
                                                <div class="input-group">
                                                    <input class="form-control ps-form__input" type="password" name = "confirm_password" required>
                                                    <div class="input-group-append"><a
                                                            class="fa fa-eye-slash toogle-password"
                                                            href="javascript: vois(0);"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-form__submit">
                                        <button class="ps-btn ps-btn--lblue">Register</button>
                                    </div>
                                    Already registered?<a class="ps-account__link" href="{{route('login')}}">Login here.</a>
                    </form>
                                
                            
                </div>    
            </div>
            </div>
        </div>
@endsection        
   
    
   