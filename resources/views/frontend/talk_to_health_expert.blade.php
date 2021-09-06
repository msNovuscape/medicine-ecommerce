@extends('frontend.master')

@section('content')

<div class="ps-categogy--promo">

            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Talk to health expert</li>
                </ul>
                <div class="ps-categogy__content">

                <div class = "row">
                @foreach($health_experts as $health_expert)
                    <div class="col-sm">
                        <div class="cardHealth">
                            <img src="{{$health_expert->image_path}}" alt="Avatar">
                            <div class="containerHealth">
                                <h3 class = "expertName"><b>{{$health_expert->name}}</b></h3> 
                                <p>{{$health_expert->specialization}}</p> 
                                <p>{{$health_expert->phone}}</p> 
                                <p>{{$health_expert->email}}</p> 
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
                @if ($health_experts->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($health_experts->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $health_experts->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $health_experts->lastPage(); $i++)
                                <li class="{{ ($health_experts->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $health_experts->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($health_experts->currentPage() == $health_experts->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $health_experts->url($health_experts->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                    @endif
            </div>
        </div>

@endsection