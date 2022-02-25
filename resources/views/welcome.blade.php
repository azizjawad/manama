@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">
        <!-- Desktop Banners -->
        <div class="homepage-slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                             data-alias="home-05" data-source="gallery"
                             style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                            <!-- START REVOLUTION SLIDER 5.4.7 auto mode -->
                            <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;"
                                 data-version="5.4.7">
                                <ul>

                                    <!-- SLIDE  -->
                                    @foreach($banners as $banner)
                                        <li data-index="rs-{{$loop->index + 1}}" data-transition="parallaxhorizontal" data-slotamount="default"
                                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                            data-easeout="default" data-masterspeed="default"
                                            data-thumb="{{asset("images/homepage/$banner->image_path")}}" data-rotate="0"
                                            data-saveperformance="off" data-title="" data-param1="" data-param2=""
                                            data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                                            data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{asset("images/homepage/$banner->image_path")}}" alt=""
                                                 data-bgposition="center bottom" data-bgfit="cover"
                                                 data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->

                                            <!-- LAYER NR. 6 -->
                                        </li>
                                    @endforeach
{{--                                    <!-- SLIDE  -->--}}
{{--                                    <li data-index="rs-2" data-transition="parallaxhorizontal" data-slotamount="default"--}}
{{--                                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"--}}
{{--                                        data-easeout="default" data-masterspeed="default"--}}
{{--                                        data-thumb="/web/images/banners/sample-seven.jpg" data-rotate="0"--}}
{{--                                        data-saveperformance="off" data-title="02" data-param1="" data-param2=""--}}
{{--                                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""--}}
{{--                                        data-param8="" data-param9="" data-param10="" data-description="">--}}
{{--                                        <!-- MAIN IMAGE -->--}}
{{--                                        <img src="{{asset("web/images/banners/sample-seven.jpg")}}" alt=""--}}
{{--                                             data-bgposition="center bottom" data-bgfit="cover"--}}
{{--                                             data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>--}}
{{--                                        <!-- LAYERS -->--}}

{{--                                        <!-- LAYER NR. 7 -->--}}

{{--                                    </li>--}}
                                </ul>
                                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                            </div>
                        </div><!-- END REVOLUTION SLIDER -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Banners -->
        <div class="mobile-banners">

            <div class="mmtp-element-carousel mb-container"
                 data-slick-options='{
                                    "spaceBetween": 0,
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "autoplaySpeed": 5000,
                                    "speed": 1000,
                                    "dots": false,
                                    "infinite": true,
                                    "centerMode": true,
                                    "centerPadding": "10px"
                                }' data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 1} }
                                ]'>
                @foreach($banners as $banner)
                    <div class="item">
                        <img src="{{asset("images/homepage/$banner->image_path")}}" />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- USP Highlighter -->
        <section class="method-area pt--50 pt-md--50 pb--75 pb-md--55">
            <div class="container">
                <div class="row">

                    <!-- col-lg-4 col-md-4 -->

                    <div class="col-4 mb-md--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{asset("web/images/icons/fresh-natural-fruit.png")}}" alt="Icon">
                            <h4 class="mt--20">Fresh & Natural</h4>
                            <p>Only the best quality fruits used.</p>
                        </div>
                    </div>
                    <div class="col-4 mb-md--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{asset("web/images/icons/free-shippng.png")}}" alt="Icon">
                            <h4 class="mt--20">Free Shipping</h4>
                            <p>Orders above <span class="fa fa-rupee"></span> 700 are shipped FREE!</p> <!-- Shipping Rates to be integrated -->
                        </div>
                    </div>
                    <div class="col-4 mb-sm--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{asset("web/images/icons/highest-quality.png")}}" alt="Icon">
                            <h4 class="mt--20">Always Best Quality</h4>
                            <p>We observe strict & highest production standard.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mobile-usp">
            <div class="nav nav-tabs mobile-usp-tab" id="mobile-usb-tab" role="tablist">
                <button type="button" class="" id="nav-natural-fresh-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-natural-fresh" role="tab" aria-selected="true">
                    <img src="{{asset("web/images/icons/fresh-natural-fruit.png")}}" alt="Icon">
                </button>
                <button type="button" class="active" id="nav-free-shippng-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-free-shippng" role="tab" aria-selected="true">
                    <img src="{{asset("web/images/icons/free-shippng.png")}}" alt="Icon">
                </button>
                <button type="button" class="" id="nav-highest-quality-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-highest-quality" role="tab" aria-selected="true">
                    <img src="{{asset("web/images/icons/highest-quality.png")}}" alt="Icon">
                </button>

            </div>
            <div class="tab-content mobile-usp-tab-content" id="usp-list">
                <div class="tab-pane fade show active" id="nav-natural-fresh" role="tabpanel"
                     aria-labelledby="nav-natural-fresh-tab">
                    <h4>FRESH & NATURAL</h4>
                    <p>Only the best quality fruits used.</p>
                </div>
                <div class="tab-pane fade" id="nav-free-shippng" role="tabpanel"
                     aria-labelledby="nav-free-shippng-tab">
                    <h4>FREE SHIPPING</h4>
                    <p>Orders above  700 are shipped FREE!</p>
                </div>
                <div class="tab-pane fade" id="nav-highest-quality" role="tabpanel"
                     aria-labelledby="nav-highest-quality-tab">
                    <h4>ALWAYS BEST QUALITY</h4>
                    <p>We observe strict & highest production standard.</p>
                </div>
            </div>
        </section>

        <!-- Method area End Here -->


        <!-- Product Tab area Start Here -->
        <section class="product-tab-area pt--25 pt-md--20 pb--40 pb-md--30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-tab tab-style-1">
                            <div class="nav nav-tabs product-tab__head mb--40 mb-md--30" id="product-tab"
                                 role="tablist">
                                @if(isset($new_products) && sizeof($new_products))
                                <button type="button" class="product-tab__link nav-link active" id="nav-new-arrival-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-new-arrival" role="tab" aria-selected="true">
                                    <span>New Arrivals</span>
                                </button>
                                @endif
                                @if(isset($best_selling) && sizeof($best_selling))
                                    <button type="button" class="product-tab__link nav-link" id="nav-top-sale-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-top-sale" role="tab" aria-selected="true">
                                        <span>Top Selling</span>
                                    </button>
                                @endif
                                @if(isset($featured_products) && sizeof($featured_products))
                                <button type="button" class="product-tab__link nav-link" id="nav-sale-featured-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-sale-featured" role="tab" aria-selected="true">
                                    <span>Featured</span>
                                </button>
                                @endif

                            </div>
                            <div class="tab-content product-tab__content" id="product-tabContent">

                                <div class="tab-pane fade show active" id="nav-new-arrival" role="tabpanel"
                                     aria-labelledby="nav-new-arrival-tab">
                                    <div class="row">
                                        <!-- Product Item -->
                                        @foreach($new_products as $key)
                                            <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                                <div class="mmtp-product">
                                                    <div class="product-inner">
                                                        <figure class="product-image has--bg">
                                                            <div class="product-image--holder">
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="primary-image">
                                                                </a>
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="secondary-image">
                                                                </a>
                                                            </div>
                                                            <div class="mmtp-product-action">
                                                                <div class="product-action">
                                                                    <a class="quickview-btn action-btn"
                                                                       href="{{route('category_product',[$key->category_slug, $key->page_slug])}}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="View">
                                                                        <i class="dl-icon-view"></i>
                                                                    </a>
                                                                    {{--                                                            <a class="add_to_cart_btn action-btn" data-product_info_id="{{$key->product_info_id}}" data-bs-toggle="tooltip"--}}
                                                                    {{--                                                               data-bs-placement="left" title="Add to Cart">--}}
                                                                    {{--                                                                        <span data-bs-toggle="modal" data-bs-target="#addtoCart">--}}
                                                                    {{--                                                                        	<i class="dl-icon-cart29"></i>--}}
                                                                    {{--                                                                        </span>--}}
                                                                    {{--                                                            </a>--}}
                                                                    <a class="add_to_cart_btn action-btn" data-product_id="{{$key->id}}" title="Add to Cart">
                                                                        <span>
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a class="add_wishlist action-btn"
                                                                       href="wishlist.html" data-bs-toggle="tooltip"
                                                                       data-bs-placement="left" title="Add to Wishlist">
                                                                        <i class="dl-icon-heart4"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="product-badge new">{{LABEL[$key->label]}}</span>
                                                            <!-- Other Tag Codes

                                                            <span class="product-badge feature">Feat</span>
                                                            <span class="product-badge new">New</span>

                                                            -->

                                                        </figure>
                                                        <div class="product-info">
                                                            <h3 class="product-title">
                                                                <a href="#">{{$key->product_name}}</a>
                                                            </h3>
                                                            <div class="product-rating">
                                                                <span>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star"></i>
                                                                </span>
                                                            </div>
{{--                                                            <span class="product-price-wrapper">--}}
{{--                                                                <span class="money"><i class="fas fa-rupee-sign"></i>{{$key->cost_price}}</span>--}}
{{--                                                                <!-- If discount price is there -->--}}
{{--                                                                <!----}}
{{--                                                                <span class="product-price-old">--}}
{{--                                                                    <span class="money">$60.00</span>--}}
{{--                                                                </span>--}}
{{--                                                                -->--}}
{{--                                                            </span>--}}
{{--                                                            <span class="product-weight-wrapper">--}}
{{--                                                             <span class="weight">{{$key->packaging_weight .' '. $key->packaging_type}}</span>--}}
{{--                                                             </span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
{{--                                        <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">--}}
{{--                                            <div class="mmtp-product">--}}
{{--                                                <div class="product-inner">--}}
{{--                                                    <figure class="product-image has--bg">--}}
{{--                                                        <div class="product-image--holder">--}}
{{--                                                            <a href="product-single.html">--}}
{{--                                                                <img src="{{asset("web/images/products/caramel-sauces.png")}}"--}}
{{--                                                                     alt="Caramel Sauces" class="primary-image">--}}
{{--                                                            </a>--}}
{{--                                                            <a href="product-single.html">--}}
{{--                                                                <img src="{{asset("web/images/products/caramel-sauces.png")}}"--}}
{{--                                                                     alt="Caramel Sauces" class="secondary-image">--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="mmtp-product-action">--}}
{{--                                                            <div class="product-action">--}}
{{--                                                                <a class="quickview-btn action-btn"--}}
{{--                                                                   href="product-single.html"--}}
{{--                                                                   data-bs-toggle="tooltip" data-bs-placement="left"--}}
{{--                                                                   title="View">--}}
{{--                                                                    <i class="dl-icon-view"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <a class="add_to_cart_btn action-btn" data-bs-toggle="tooltip"--}}
{{--                                                                   data-bs-placement="left" title="Add to Cart">--}}
{{--                                                                        <span data-bs-toggle="modal" data-bs-target="#addtoCart">--}}
{{--                                                                        	<i class="dl-icon-cart29"></i>--}}
{{--                                                                        </span>--}}
{{--                                                                </a>--}}
{{--                                                                <a class="add_wishlist action-btn"--}}
{{--                                                                   href="wishlist.html" data-bs-toggle="tooltip"--}}
{{--                                                                   data-bs-placement="left" title="Add to Wishlist">--}}
{{--                                                                    <i class="dl-icon-heart4"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <!-- To activate remove from wishlist ----}}
{{--                                                                <a class="add_wishlist action-btn"--}}
{{--                                                                    href="wishlist.html" data-bs-toggle="tooltip"--}}
{{--                                                                    data-bs-placement="left" title="Remove from Wishlist">--}}
{{--                                                                    <i class="dl-icon-heart"></i>--}}
{{--                                                                </a>--}}

{{--                                                                -->--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="product-badge new">New</span>--}}

{{--                                                        <!-- Other Tag Codes--}}

{{--                                                        <span class="product-badge feature">Feat</span>--}}
{{--                                                        <span class="product-badge new">New</span>--}}

{{--                                                        -->--}}

{{--                                                    </figure>--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="product-title">--}}
{{--                                                            <a href="product-single.html">Caramel Sauces</a>--}}
{{--                                                        </h3>--}}
{{--                                                        <div class="product-rating">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="dl-icon-star rated"></i>--}}
{{--                                                                    <i class="dl-icon-star rated"></i>--}}
{{--                                                                    <i class="dl-icon-star rated"></i>--}}
{{--                                                                    <i class="dl-icon-star rated"></i>--}}
{{--                                                                    <i class="dl-icon-star"></i>--}}
{{--                                                                </span>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="product-price-wrapper">--}}
{{--                                                                <span class="money"><i class="fas fa-rupee-sign"></i>160.00</span>--}}
{{--                                                            <!-- If discount price is there -->--}}
{{--                                                            <!----}}
{{--                                                            <span class="product-price-old">--}}
{{--                                                                <span class="money">$60.00</span>--}}
{{--                                                            </span>--}}
{{--                                                            -->--}}
{{--                                                            </span>--}}
{{--                                                        <span class="product-weight-wrapper">--}}
{{--                                                             <span class="weight">1L PET Bottle</span>--}}
{{--                                                             </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-top-sale" role="tabpanel"
                                     aria-labelledby="nav-sale-featured-tab">
                                    <div class="row">

                                        @foreach($best_selling as $key)
                                            <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                                <div class="mmtp-product">
                                                    <div class="product-inner">
                                                        <figure class="product-image has--bg">
                                                            <div class="product-image--holder">
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="primary-image">
                                                                </a>
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="secondary-image">
                                                                </a>
                                                            </div>
                                                            <div class="mmtp-product-action">
                                                                <div class="product-action">
                                                                    <a class="quickview-btn action-btn"
                                                                       href="{{route('category_product',[$key->category_slug, $key->page_slug])}}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="View">
                                                                        <i class="dl-icon-view"></i>
                                                                    </a>
                                                                    {{--                                                            <a class="add_to_cart_btn action-btn" data-product_info_id="{{$key->product_info_id}}" data-bs-toggle="tooltip"--}}
                                                                    {{--                                                               data-bs-placement="left" title="Add to Cart">--}}
                                                                    {{--                                                                        <span data-bs-toggle="modal" data-bs-target="#addtoCart">--}}
                                                                    {{--                                                                        	<i class="dl-icon-cart29"></i>--}}
                                                                    {{--                                                                        </span>--}}
                                                                    {{--                                                            </a>--}}
                                                                    <a class="add_to_cart_btn action-btn" data-product_id="{{$key->id}}" title="Add to Cart">
                                                                        <span>
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a class="add_wishlist action-btn"
                                                                       href="wishlist.html" data-bs-toggle="tooltip"
                                                                       data-bs-placement="left" title="Add to Wishlist">
                                                                        <i class="dl-icon-heart4"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="product-badge hot">TOP</span>
                                                            <!-- Other Tag Codes

                                                            <span class="product-badge feature">Feat</span>
                                                            <span class="product-badge new">New</span>

                                                            -->

                                                        </figure>
                                                        <div class="product-info">
                                                            <h3 class="product-title">
                                                                <a href="#">{{$key->product_name}}</a>
                                                            </h3>
                                                            <div class="product-rating">
                                                                <span>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star"></i>
                                                                </span>
                                                            </div>
{{--                                                            <span class="product-price-wrapper">--}}
{{--                                                                <span class="money"><i class="fas fa-rupee-sign"></i>{{$key->cost_price}}</span>--}}
{{--                                                                <!-- If discount price is there -->--}}
{{--                                                                <!----}}
{{--                                                                <span class="product-price-old">--}}
{{--                                                                    <span class="money">$60.00</span>--}}
{{--                                                                </span>--}}
{{--                                                                -->--}}
{{--                                                            </span>--}}
{{--                                                            <span class="product-weight-wrapper">--}}
{{--                                                             <span class="weight">{{$key->packaging_weight .' '. $key->packaging_type}}</span>--}}
{{--                                                             </span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-sale-featured" role="tabpanel"
                                     aria-labelledby="nav-sale-featured-tab">
                                    <div class="row">

                                        @foreach($featured_products as $key)
                                            <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                                <div class="mmtp-product">
                                                    <div class="product-inner">
                                                        <figure class="product-image has--bg">
                                                            <div class="product-image--holder">
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="primary-image">
                                                                </a>
                                                                <a href="{{route('category_product',[$key->category_slug, $key->page_slug])}}">
                                                                    <img src="{{asset("images/uploads/products/". $key->image)}}"
                                                                         alt="Kiwi Mojito" class="secondary-image">
                                                                </a>
                                                            </div>
                                                            <div class="mmtp-product-action">
                                                                <div class="product-action">
                                                                    <a class="quickview-btn action-btn"
                                                                       href="{{route('category_product',[$key->category_slug, $key->page_slug])}}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="View">
                                                                        <i class="dl-icon-view"></i>
                                                                    </a>
                                                                    {{--                                                            <a class="add_to_cart_btn action-btn" data-product_info_id="{{$key->product_info_id}}" data-bs-toggle="tooltip"--}}
                                                                    {{--                                                               data-bs-placement="left" title="Add to Cart">--}}
                                                                    {{--                                                                        <span data-bs-toggle="modal" data-bs-target="#addtoCart">--}}
                                                                    {{--                                                                        	<i class="dl-icon-cart29"></i>--}}
                                                                    {{--                                                                        </span>--}}
                                                                    {{--                                                            </a>--}}
                                                                    <a class="add_to_cart_btn action-btn" data-product_id="{{$key->id}}" title="Add to Cart">
                                                                        <span>
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a class="add_wishlist action-btn"
                                                                       href="wishlist.html" data-bs-toggle="tooltip"
                                                                       data-bs-placement="left" title="Add to Wishlist">
                                                                        <i class="dl-icon-heart4"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="product-badge feature">{{LABEL[$key->label]}}</span>
                                                            <!-- Other Tag Codes

                                                            <span class="product-badge feature">Feat</span>
                                                            <span class="product-badge new">New</span>

                                                            -->

                                                        </figure>
                                                        <div class="product-info">
                                                            <h3 class="product-title">
                                                                <a href="#">{{$key->product_name}}</a>
                                                            </h3>
                                                            <div class="product-rating">
                                                                <span>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star rated"></i>
                                                                    <i class="dl-icon-star"></i>
                                                                </span>
                                                            </div>
{{--                                                            <span class="product-price-wrapper">--}}
{{--                                                                <span class="money"><i class="fas fa-rupee-sign"></i>{{$key->cost_price}}</span>--}}
{{--                                                                <!-- If discount price is there -->--}}
{{--                                                                <!----}}
{{--                                                                <span class="product-price-old">--}}
{{--                                                                    <span class="money">$60.00</span>--}}
{{--                                                                </span>--}}
{{--                                                                -->--}}
{{--                                                            </span>--}}
{{--                                                            <span class="product-weight-wrapper">--}}
{{--                                                             <span class="weight">{{$key->packaging_weight .' '. $key->packaging_type}}</span>--}}
{{--                                                             </span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Product Tab area End Here -->

        <!-- Category Promo Area Start -->

        <div class="banner-area">
            <div class="container-fluid pb--20">
                <div class="row">
                    <div class="col-lg-6 col-md-6 pt--30">
                        <div class="banner-box banner-type-10 banner-hover-3 ">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/mmtp-cakes.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg greybg"><i>The Ultimate</i>Manama Fruit Fillings</h3>
                                    </div></div>
                                <a class="banner-link banner-overlay" href="{{route('category_product')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 pt--30">
                        <div class="banner-box banner-type-10 banner-hover-3 ">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/mmtp-breakfast.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg greybg"><i>Make your morning breafast</i>Fruitful & Healthy</h3>
                                    </div></div>
                                <a class="banner-link banner-overlay" href="{{route('category_product')}}">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Category Promo Area End -->


        <!-- Video Banner area Start Here -->
        <section class="video-banner-area video-banner-bg-1 ptb--150 ptb-lg--75">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="mmtp-spl"><span>What started over fifty years back in the hilly town of Panchgani in India also known as the strawberry bowl of India</span></h5>
                        <a href="https://www.youtube.com/watch?v=IvS27nnP2kY"
                           class="video-btn video-popup">video</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Video Banner area End Here -->


        <!-- Promo Area Start -->

        <div class="banner-area">
            <div class="container-fluid pb--20">
                <div class="row">
                    <div class="order-lg-2 col-lg-4 col-md-6 pt--30">
                        <div class="banner-box banner-type-10 banner-hover-3">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{asset("web/images/banners/mmtp-idea.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg three-qtr">Why Manama?<span>Manama today is synonym for flavored cordials and blends that are next to the real fruit. Our years of research, experience and our endeavour to innovate and bring incredible flavors and great tasting products to coffeehouses, restaurants, lounges and kitchens pan India is what makes us the most recognised brand in the business of flavored cordials and fruit crushes..</span></h3>
                                    </div></div>
                                <a class="banner-link banner-overlay" href="{{route('about-us')}}">
                                </a></div></div></div>
                    <div class="order-lg-1 col-lg-4 d-md-flex d-lg-block">
                        <div class="row">
                            <div class="col-12 pt--20">
                                <div class="banner-box banner-type-10 banner-hover-3 ">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{asset("web/images/banners/mmtp-recipe.jpg")}}" alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <div class="banner-info--inner--down">
                                                <h3 class="withbg bluebg">Looking for Recipes?<span>Visit our Recipe Corner for latest lip-smacking recipes..</span></h3>
                                            </div></div>
                                        <a class="banner-link banner-overlay" href="{{route('recipe-corner')}}">
                                        </a></div></div>
                            </div>
                            <div class="col-12 pt--20">
                                <div class="banner-box banner-type-10 banner-hover-3">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{asset("web/images/banners/mmtp-tips.jpg")}}" alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <div class="banner-info--inner--down">
                                                <h3 class="withbg bluebg">Mix it like a Pro!<span>Tips & Techniques to make that drink of yours more special..</span></h3>
                                            </div></div>
                                        <a class="banner-link banner-overlay" href="{{route('tips-techniques')}}">
                                        </a></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-lg-3 col-lg-4 d-md-flex d-lg-block">
                        <div class="row">
                            <div class="col-12 pt--20">
                                <div class="banner-box banner-type-10">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{asset("web/images/banners/red-bg.jpg")}}" alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <div class="banner-info--inner--center">
                                                <h3 class="withoutbg"><i class="fas fa-headset"></i>Need Help?<span>Visit our <b>Support Centre</b> for F.A.Qs and other support options.</span></h3>
                                            </div></div>
                                        <a class="banner-link banner-overlay" href="{{route('support-center')}}">
                                        </a></div></div>
                            </div>
                            <div class="col-12 pt--20">
                                <div class="banner-box banner-type-10">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{asset("web/images/banners/grey-bg.jpg")}}" alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <div class="banner-info--inner--center">
                                                <h3 class="withoutbg">Experience <i>#ManamaToppings</i><span>Visit our social media pages. Click, Share & Comment.</span></h3>
                                                <ul class="social-icons">
                                                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                </ul>
                                            </div></div>
                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Area Start Here -->
        <section class="testimonial-area">
            <div class="container p-0">
                <div class="row mb--30 mb-md--20 justify-content-md-center">
                    <div class="col-md-3 col-12">
                        <h3>Customer<br>Testimonials</h3>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="mmtp-element-carousel product-carousel dot-style-1 dark-dot slick-dot-mb-40 slick-dot-mb-md-30"
                             data-slick-options='{
                                    "spaceBetween":0,
                                    "slidesToShow": 2,
                                    "slidesToScroll": 2,
                                    "autoplaySpeed": 5000,
                                    "speed": 1000,
                                    "dots": true,
                                    "infinite": true,
                                    "centerMode": true,
                                    "centerPadding": "0%"
                                }' data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 1} }
                                ]'>
                            @foreach($customer_reviews as $review)
                                <div class="item">
                                    <div class="ct-container">
                                        <div class="ct-content" data-content="{{$review->name}}">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Area  End Here -->

        <!-- Promo Area End -->
    </div>
@endsection
