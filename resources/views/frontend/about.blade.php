@extends('frontend.master')
    @section('content')
    <div class="ps-wishlist ps-inner-page">
        <div class = "container"><br/>
            <h3 class="ps-wishlist__title">About us</h3><hr/>
            <p>
                <b>Online Aushadhi</b> is a locally owned, independent and licensed first online pharmacy system of Nepal serving since 2015 which aims to provide high quality medical care in all major cities of Nepal which includes Kathmandu, Lalitpur, Bhaktapur, Kirtipur, Pokhara, Biratnagar, Birgunj, Janakpur, Butwal, Nepalgunj, Bharatpur, Dharan, Itahari. Our main goal to provide safe prescription drugs at the most competitive price and to provide quick and efficient customer service. We provide services like any other retail pharmacy near your home, the only difference is, you do not have to come to us, rather we dispense your medications at your doorstep on preferred date, time and location. 
            </p>
            <p>
                OnlineAushadhi.com is a web portal that contains more than 30000 medicines and health equipment information.
            </p>
            <p>
                <b style = "font-size:20px">How our system works ?</b> <br/>
                We have a very simple and easy ordering process as Nepalese currently are not ready for the high tech ordering system. Anyone can place their order from our application, or message us on our Facebook messenger, viber and whatsapp or email us at pharmacist@onlineaushadhi.com. If you are not tech friendly, just give us a call at 9841568568, we will do the rest. 
            </p>
            <p>
                Steps we follow on each order :
            </p>
            <p>
                We receive 3 types of order:
            </p>
            <ol>
                <li>
                    Over the counter medicines <br>
                    We do not require any prescription so our Pharmacist confirms the order, pack it, call customer before the delivery and is delivered on preferred date, time and location.
                </li>
                <li>
                    Prescription Medicines <br>
                    Our Pharmacist verifies the validity of the prescription and confirms order. Pack it, call customer and explains about the doses before the delivery, and is delivered on preferred date, time and location. <br/>
                </li>
                <li>
                    Narcotics Medicines<br/>
                    Narcotics medicines are to be sold from the hospital pharmacies only so we do not sell narcotic medicines.<br/>
                </li>
            </ol>
            <p>
                <b style = "font-size:20px">Payment Methods that we support</b> <br/>
                Our customers can easily pay us by <b>fonePay, eSewa, Khalti</b> any other online payment system and cash on Delivery.
            </p>
        <div/>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="thumbnail thumbnail--no-border">
                    <img src="{{URL::asset('img/about/about_us01.jpg')}}" width = "1050px" alt="Img Title" class="img-responsive">
                    <div class="caption">
                    <br/>
                        <p class="title title--sm m-b-15 text-uppercase">Ordering with Online Aushadhi</p>
                        <p class = "aboutText">Buying prescription drugs online is easy, safe and secure at Online Aushadhi. We offer convenient ordering online
                            as well as through telephone. Every prescription drug order is reviewed by our licensed pharmacist before being
                            dispensed. We treat our product safety with greatest care, our main concern being the safety of our customers,
                            which we take very seriously. To ensure this to our customers, <strong>we procure all our supplies directly from only
                                the authorized distributors of the country</strong>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="thumbnail thumbnail--no-border">
                    <img src="{{URL::asset('img/about/about_us02.jpg')}}" width = "1050px" alt="Img Title" class="img-responsive">
                    <div class="caption">
                    <br/>
                        <p class="title title--sm m-b-15 text-uppercase">Customer Support Team</p>
                        <p class = "aboutText">Our Customer Support Team is accessible Sunday to Friday from 9am to 6pm through email and by phone. If you
                            encounter any issues, questions, concerns regarding your desired medicine availability, its delivery or you
                            just want to obtain more information regarding our company and the services provided by it, please feel free
                            to get in touch with our customer support team. <strong>Your satisfaction is our success, and we work hard to achieve
                                it!</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection