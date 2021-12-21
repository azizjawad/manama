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
                            <li><a href="index.html">Home</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li>Order Status</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="far fa-frown-open"></i>Something went wrong. Let's investigate.</h3>
                    </div>
                </div>
            </div>
        </section>


        <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container thank-you-area failure  pt--80 pb--80">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="/web/images/manama-error.png" alt="Order Recieved"/>

                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tya-content">
                            <h3 class=""><span>Order Failed.</span></h3>
                            <p>There was an error in processing your payment. If your money was debited, please share the payment transaction details, we will verify and process your order.</p>
                            <h4 class="sub-title"><span>What's Next?</span></h4>
                        </div>
                        <ul class="thank-you-links row justify-content-center g-2">
                            <li class="col-4"><a href="order-details.html"><i class="fas fa-dolly-flatbed"></i>
                                    Track Order<small>Track your Current &amp; Past Orders</small></a></li>
                            <li class="col-4"><a href="my-account.html"><i class="fas fa-desktop"></i>
                                    My Account<small>Manage your Account with us</small></a></li>
                            <li class="col-4"><a href="support-centre.html"><i class="far fa-life-ring"></i>
                                    Support Centre<small>Looking for help?</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Cart Area End Here -->

        @include('website.account.component.banner-section');

    </div>
@endsection

