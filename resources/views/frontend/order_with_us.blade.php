@extends('frontend.master')
    @section('content')
    <section class="ps-inner-page">

        <div class = "container">
        <div class="row">
                        <div class="col-lg-12">
                            <div class="content__gutter-up-down content__gutter-left-right">
                                    <div class="col-lg-12">
                                            <h3 class="ps-inner-page__title" style = "font-size:30px">{{$page->first()->title}}</h3> <hr>
                                            {!!html_entity_decode($page->first()->contents)!!}
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="thumbnail thumbnail--no-border">
                                            <img src="https://onlineaushadhi.com/img/001.jpg" alt="Img Title" class="img-responsiveÎ">
                                            <div class="caption">
                                                <br>
                                                <p class="title title--md m-b-10 text-uppercase">Ordering with Online Aushadhi</p>
                                                <p>Buying prescription drugs online is easy, safe and secure at Online Aushadhi. We offer convenient ordering online
                                                    as well as through telephone. Every prescription drug order is reviewed by our licensed pharmacist before being
                                                    dispensed. We treat our product safety with greatest care, our main concern being the safety of our customers,
                                                    which we take very seriously. To ensure this to our customers, <strong>we procure all our supplies directly from only
                                                        the authorized distributors of the country</strong>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="thumbnail thumbnail--no-border">
                                            <img src="https://onlineaushadhi.com/img/002.jpg" alt="Img Title" class="img-responsiveÎ">
                                            <div class="caption">
                                                <br>
                                                <p class="title title--md m-b-10 text-uppercase">Customer Support Team</p>
                                                <p>Our Customer Support Team is accessible Sunday to Friday from 9am to 6pm through email and by phone. If you
                                                    encounter any issues, questions, concerns regarding your desired medicine availability, its delivery or you
                                                    just want to obtain more information regarding our company and the services provided by it, please feel free
                                                    to get in touch with our customer support team. <strong>Your satisfaction is our success, and we work hard to achieve
                                                        it!</strong></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>    
    </section>
    @endsection