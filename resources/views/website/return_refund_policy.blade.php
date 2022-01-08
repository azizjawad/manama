@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">
        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 col-md-4 ms-auto">
                        <h1>Return & Refund Policy</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li>Terms & Policy</li>
                            <li>Return & Refund Policy</li>
                        </ul>
                    </div>
                    <div class="order-1 col-md-3">
                        <h1 class="big-title">Terms & Policy</h1>
                    </div>
                </div>
            </div>
        </section>
        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner inside-manama-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12" id="main-content">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-12">
                                    <h3>Our Return and Refund Policy</h3>
                                    <ul class="">
                                        <li>We do not have any Refund Policy. Incase your order was damaged during transit, please get in touch with our
                                            <a href="support-centre.html">Support Team</a></li>
                                        <li>In Case of Cancellation we will not be able to give any refund in that case we will serve our product Exchange policy.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('website.account.component.banner-section')
    </div>
@endsection
