@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">
        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Order Status</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('my-account')}}">My Account</a></li>
                            <li>Order Status</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-dolly"></i>That's it, we have received your order.
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Area -->
        <div class="page-content-inner enable-full-width pb--50">
            <div class="container thank-you-area  pt--80 pb--80">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="{{asset("web/images/manana-box-mockup.png")}}" alt="Order Recieved"/>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tya-content">
                            <h3><span>Thank you.</span></h3>
                            <p>We have received your order, We have sent an email and sms confirming your order.
                                Incase you haven't received order email in your inbox, wait for upto 15 minutes or
                                please check your spam folder.</p>
                            <h4 class="sub-title"><span>What's Next?</span></h4>
                        </div>
                        <ul class="thank-you-links row justify-content-center g-2">
                            <li class="col-4"><a href="order-details.html"><i class="fas fa-dolly-flatbed"></i>
                                    Track Order<small>Track your Current &amp; Past Orders</small></a></li>
                            <li class="col-4"><a href="{{route('my-account')}}"><i class="fas fa-desktop"></i>
                                    My Account<small>Manage your Account with us</small></a></li>
                            <li class="col-4"><a href="support-centre.html"><i class="far fa-life-ring"></i>
                                    Support Centre<small>Looking for help?</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Area End Here -->


        <!-- Promo Area Start -->

        <div class="banner-area">
            <div class="container-fluid pb--20">
                <div class="row">
                    <div class="order-md-1 col-md-4 col-12">
                        <div class="banner-box banner-type-10 banner-hover-3 ">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/mmtp-recipe.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg bluebg">Looking for Recipes?<span>Visit our Recipe Corner for latest lip-smacking recipes..</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="recipe-corner.html">
                                </a></div>
                        </div>
                    </div>

                    <div class="order-md-3 col-md-4 col-12">

                        <div class="banner-box banner-type-10 banner-hover-3">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/mmtp-tips.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg bluebg">Mix it like a Pro!<span>Tips & Techniques to make that drink of yours more special..</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="tips-techniques.html">
                                </a></div>
                        </div>
                    </div>

                    <div class="order-md-2 col-md-4 col-12">
                        <div class="banner-box banner-type-10">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/grey-bg.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--center">
                                        <h3 class="withoutbg">Experience <i>#ManamaToppings</i><span>Visit our social media pages. Click, Share & Comment.</span>
                                        </h3>
                                        <ul class="social-icons">
                                            <li><a href="https://www.facebook.com/" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/" target="_blank"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://www.youtube.com/" target="_blank"><i
                                                        class="fab fa-youtube"></i></a></li>
                                            <li><a href="https://www.twitter.com/" target="_blank"><i
                                                        class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Promo Area End -->
    </div>
@endsection

