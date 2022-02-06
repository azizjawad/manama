@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 col-md-4 ms-auto">
                        <h1>Customer Testimonials</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="index.html">Home</a></li>
                            <li>Inside Manama</li>
                            <li>Customer Testimonials</li>
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
                    <div class="row justify-content-center pb-5 mb-5">

                        <div class="col-md-10col-12" id="main-content">

                            <div class="row justify-content-center">
                                @foreach($customer_reviews as $review)
                                    <div class="col-md-4 col-12">
                                        <div class="testimonial-tabs">
                                            <div class="tt-item" data-content="{{$review->name}}">
                                                <div class="product-rating">
                                                    <span><a href="#">{{$review->product_name}}</a></span>
                                                    <span>
                                                    @for($x = 0; $x < 5; $x++)
                                                            <i class="dl-icon-star {{($x < $review->rating) ? 'rated' : ''}}"></i>
                                                        @endfor
                                                </span>

                                                </div>
                                                <p>{{$review->comment}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
{{--                                <div class="col-md-4 col-12">--}}
{{--                                    <div class="testimonial-tabs">--}}
{{--                                        <div class="tt-item" data-content="Customer Name">--}}
{{--                                            <div class="product-rating">--}}
{{--                                                    <span><a href="product-single.html">Lime Mint Mojito ---}}
{{--                                                            750ml</a></span>--}}
{{--                                                <span>--}}
{{--                                                        <i class="dl-icon-star rated"></i>--}}
{{--                                                        <i class="dl-icon-star rated"></i>--}}
{{--                                                        <i class="dl-icon-star rated"></i>--}}
{{--                                                        <i class="dl-icon-star rated"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </span>--}}

{{--                                            </div>--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc--}}
{{--                                                molestie mi ipsum,--}}
{{--                                                quis luctus est pretium accumsan. Vivamus eu lacinia neque, nec--}}
{{--                                                sagittis tellus.--}}
{{--                                                Quisque quis tincidunt ante.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('website.account.component.banner-section')
    </div>
@endsection
