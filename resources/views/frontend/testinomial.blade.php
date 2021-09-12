@extends('frontend.master')

    @section('content')
    <div class="ps-categogy--promo ps-testimonail-list">
    <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Testinomial</li>
                </ul>
                <div class="ps-categogy__content">

                <div class = "row">
                @foreach($testinomials as $testinomial)
                    <div class="col-12 col-md-4">
                        <div class="cardHealth">
                            <img style = "width:100%" src="{{$testinomial->image_path}}" alt="Avatar">
                            <div class="containerHealth" >
                                <h3 class = "expertName"><b>{{$testinomial->name}}</b></h3> 
                                <p style = "text-align:center;margin-bottom:-5px">{{$testinomial->designation}}</p> 
                                <p style = "text-align:center" >{{$testinomial->office_name}}</p> 
                                <p>{{$testinomial->contents}}</p> 

                            </div>
                        </div>
                    </div>
                @endforeach

                    <!-- <div class="col-sm">
                        <div class="cardHealth">
                            <img src="img/avatar/img_avatar.png" alt="Avatar">
                            <div class="containerHealth">
                            <h3 class = "expertName"><b>John Doe</b></h3> 
                                <p>Physician</p> 
                                <p>Phone</p> 
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="cardHealth">
                            <img src="img/avatar/img_avatar.png" alt="Avatar">
                            <div class="containerHealth">
                            <h3 class = "expertName"><b>John Doe</b></h3> 
                                <p>Physician</p> 
                                <p>Phone</p> 
                                <p>Email</p> 
                            </div>
                        </div>
                    </div> -->
                </div>

                
                </br>
                <!-- <div class = "row">
                    <div class="col-sm">
                        <div class="cardHealth">
                            <img src="img/avatar/img_avatar.png" alt="Avatar">
                            <div class="containerHealth">
                                <h3 class = "expertName"><b>John Doe</b></h3> 
                                <p>Physician</p> 
                                <p>Phone</p> 
                                <p>Email</p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="cardHealth">
                            <img src="img/avatar/img_avatar.png" alt="Avatar">
                            <div class="containerHealth">
                            <h3 class = "expertName"><b>John Doe</b></h3> 
                                <p>Physician</p> 
                                <p>Phone</p> 
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="cardHealth">
                            <img src="img/avatar/img_avatar.png" alt="Avatar">
                            <div class="containerHealth">
                            <h3 class = "expertName"><b>John Doe</b></h3> 
                                <p>Physician</p> 
                                <p>Phone</p> 
                                <p>Email</p> 
                            </div>
                        </div>
                    </div>
                </div> -->
                @if ($testinomials->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($testinomials->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $testinomials->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $testinomials->lastPage(); $i++)
                                <li class="{{ ($testinomials->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $testinomials->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($testinomials->currentPage() == $testinomials->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $testinomials->url($testinomials->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                    @endif
                </div>
            </div>
        </div>

    @endsection