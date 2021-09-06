@extends('frontend.master')
    @section('content')
        <div class="ps-account">
            <div class="container">


                <!-- Account Page's topbar -->
              

                <!-- <hr> -->
                
                <div class="flash-message">
                
                                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                            @if(Session::has('alert-' . $msg))

                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                            @endif
                                            @endforeach
                                        </div>
                <div class="row">
                    <!-- <div class="col-12 col-md-4">
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
                    </div> -->
                    <div class="col-12 col-md-12 card">
                        <form action="{{route('frontend.add_prescription')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Upload Prescription</h2>

                                @if($errors->has('attachment'))
                                            <div class="alert alert-danger">{{ $errors->first('attachment') }}</div>
                                        @endif

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                        
                                            <label class="ps-form__label">Choose your files*</label>
                                            <input type='file' name = "attachment" required  class="form-control ps-form__input">
                                        </div>
                                        
                                        <div class="input-group-btn"> 

                                    </div>
                                    <!-- <button class="btn btn-success" type="button"> <i class="fldemo glyphicon glyphicon-plus"></i>Add</button> -->
                                    </div>
                                    <!-- <div class="clone fade">
                                    <div class="realprocode control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                    </div> -->

                                    <div class="col-12 col-md-6">
                                        <div class="ps-form__group">
                                            <label class="ps-form__label">Remarks </label>
                                            <input type='text' name = "remarks" required  class="form-control ps-form__input">
                                        </div>
                                    </div>

                                </div>

                          
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--lblue">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-success").click(function(){ 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".realprocode").remove();
        });
        });
    </script>
   
    
  

  