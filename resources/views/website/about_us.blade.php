@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 col-md-4 ms-auto">
                        <h1>Who We Are</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="index.html">Home</a></li>
                            <li>Inside Manama</li>
                            <li>Who We Are</li>
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

                            <div class="row justify-content-center">
                                <div class="col-md-5 col-12">
                                    <h1>Welcome to Manama</h1>
                                    <p class="text-justify">Over fifty years of expertise and right know how along
                                        with innovation
                                        has helped us carrying our family legacy forward from a small hilly town of
                                        Panchgani in India also known as the strawberry bowl of India,
                                        Manama today is synonym for fruit syrups, crushes and jams that are high in
                                        quality & taste.</p>
                                    <p class="text-justify">Over the years we have developed many new products which
                                        are natural in taste and are a boon
                                        for the quality conscious generation of today. This approach of offering new
                                        tastes has made
                                        Manama products extremely popular. Our products are known for their usage of
                                        fruit pulp and
                                        juice which reduces the need for artificial flavouring and colouring, So
                                        when you drink Manama
                                        you drink to your health.</p>
                                </div>
                                <div class="col-md-5 col-12">
                                    <blockquote>
                                        Our endeavour and our constant quest to innovate has brought innovative
                                        and incredible flavours and great tasting products to coffeehouses,
                                        restaurants,
                                        lounge and kitchens across India this is what makes us the most recognised
                                        brand in the business.
                                    </blockquote>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="parallax-pg" style="background-image:url('images/about-img-01.jpg');">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-12 white-bg">
                                <h3 class="has-span manama-red">Why Choose Us</h3>
                                <p>The health and wellness megatrend drives the demand for premium and quality
                                    products which are apex in flavour & taste.
                                    Manama products have higher ratio of fruit juices & pulps when compared with
                                    other products, Our formulation of invert sugar
                                    eliminates crystallisation and enhances taste. We only prefer premium
                                    ingredients in our unique blending process which helps
                                    retain the natural flavours & reduces the usage of synthetic substances &
                                    preservatives during manufacturing process.</p>
                            </div>
                            <div class="col-md-3 col-12 white-bg">
                                <h3 class="has-span manama-red">Being Consistent & Innovative</h3>
                                <p>People seek socially shareable moments and explore newer venues, flavours, taste
                                    and presentation.
                                    These are the factors which creates craveable moments and adds to a recall value
                                    which brings the customer back
                                    again & again to their favourite place. This if maintained consistently is the
                                    making of a brand image.</p>
                            </div>
                            <div class="col-md-3 col-12 white-bg">
                                <h3 class="has-span manama-red">Our Mission</h3>
                                <p>To be synonyms for quality & flavour in the beverage and culinary industry by
                                    providing products and solutions which are the top of the line in quality.</p>
                            </div>
                            <div class="col-md-3 col-12 white-bg">
                                <h3 class="has-span manama-red">Our Vision</h3>
                                <p>To innovate and always bring something new & creative for the beverage and
                                    culinary industry,
                                    We have a passion for perfection and are committed to quality without
                                    compromise.
                                    We take pride in our history and formulation of making only quality products.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center mb-5 pb-5">

                        <div class="row ptb--40 pt-4 justify-content-center">
                            <div class="col-md-5 order-md-2">
                                <figure
                                    class="image-box image-box-w-video-btn btn-right max-w-sm-65 max-w-xs-100 has-shadow">
                                    <a href="https://www.youtube.com/watch?v=IvS27nnP2kY" class="video-popup">
                                        <img src="images/about-bg3.jpg" alt="about">
                                        <span class="video-btn video-btn--2"></span>
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-5 order-md-1">
                                <div class="about-text">
                                    <blockquote>This is the reason you have to set a method,
                                        a formula, to make your signature trademark beverages right from its
                                        presentation,
                                        flavours, colours, textures to give the wow factor every time to your
                                        customer with the same consistency.
                                    </blockquote>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- About us End Here -->


                </div>


                @include('website.account.component.banner-section')
            </div>

        </div>
    </div>

@endsection
