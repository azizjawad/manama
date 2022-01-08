@extends('layouts.main')

@section('content')
    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 col-md-4 ms-auto">
                        <h1>Download Brochure</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li>Inside Manama</li>
                            <li>Download Brochure</li>
                        </ul>
                    </div>
                    <div class="order-1 col-md-3">
                        <h1 class="big-title">Inside Manama</h1>
                    </div>
                </div>
            </div>
        </section>
        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner inside-manama-content">
                <!-- About us Area -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12" id="main-content">
                            <div class="row justify-content-center pb-5 mb-5">
                                <div class="col-md-9 col-12">
                                    <h1 class="text-center">Download Manama Catalog</h1>
                                    <a href="{{asset('web/images/manama-catalog.pdf')}}" target="_blank" class="download-image">
                                        <img src="{{asset('web/images/download-image-pdf.jpg')}}" alt="Download PDF" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('website.account.component.banner-section')
    </div>
        <!-- Main Wrapper End -->
@endsection
