@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Shop Products</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('category')}}">Shop Products</a></li>
                            <li>Mojitos</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <div class="cat-info">
                            <h2>Mojitos</h2>
                            <p>Sugar, Lime & Mint a perfect combination for a hot summer's day. 10
                                Refreshing fruit infused flavours to make that perfect mocktail & cocktail.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Product Details Start Here -->

        <div class="page-content-inner enable-full-width pb--50">
            <div class="container">
                <div class="row pt--40">
                    <div class="col-md-6 product-main-image">
                        <div class="product-image">

                            <!-- Thumbnail Area Begins -->

                            <div class="product-gallery vertical-slide-nav">
                                <div class="product-gallery__thumb">
                                    <div class="product-gallery__thumb--image">
                                        <div class="mmtp-element-carousel nav-slider slick-vertical"
                                             data-slick-options='{
                                                "slidesToShow": 3,
                                                "slidesToScroll": 1,
                                                "vertical": true,
                                                "swipe": true,
                                                "verticalSwiping": true,
                                                "infinite": true,
                                                "focusOnSelect": true,
                                                "asNavFor": ".main-slider",
                                                "arrows": true,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                            }'
                                             data-slick-responsive='[
                                                {
                                                    "breakpoint":992,
                                                    "settings": {
                                                        "slidesToShow": 4,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":575,
                                                    "settings": {
                                                        "slidesToShow": 3,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":480,
                                                    "settings": {
                                                        "slidesToShow": 2,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                }
                                            ]'>

                                            <!-- Image Thumbs here -->

                                            <figure class="product-gallery__thumb--single has--bg">
                                                <img src="{{asset("web/images/products/original-mojito.png")}}" alt="Products">
                                            </figure>
                                            <figure class="product-gallery__thumb--single has--bg">
                                                <img src="{{asset("web/images/products/original-mojito-500ml.png")}}" alt="Products">
                                            </figure>
                                        </div>
                                    </div>
                                </div>

                                <!-- Large Image Area Begins -->

                                <div class="product-gallery__large-image">
                                    <div class="gallery-with-thumbs">
                                        <div class="product-gallery__wrapper">
                                            <div
                                                class="mmtp-element-carousel main-slider product-gallery__full-image image-popup"
                                                data-slick-options='{
                                                    "slidesToShow": 1,
                                                    "slidesToScroll": 1,
                                                    "infinite": true,
                                                    "arrows": false,
                                                    "asNavFor": ".nav-slider"
                                                }'>

                                                <!-- Image Large Here -->

                                                <figure class="product-gallery__image has--bg">
                                                    <img src="{{asset("web/images/products/original-mojito.png")}}" alt="Product">
                                                </figure>
                                                <figure class="product-gallery__image has--bg">
                                                    <img src="{{asset("web/images/products/original-mojito-500ml.png")}}" alt="Product">
                                                </figure>
                                            </div>
                                            <div class="product-gallery__actions">
                                                <button class="action-btn btn-zoom-popup">
                                                    <i
                                                        class="dl-icon-zoom-in">
                                                    </i></button>

                                                <!-- Video will be optional -->

                                                <a href="https://www.youtube.com/watch?v=IvS27nnP2kY"
                                                   class="action-btn video-popup">
                                                    <i
                                                        class="dl-icon-format-video">
                                                    </i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="product-badge hot">Top</span>

                            <!-- Other Tag Codes

                                <span class="product-badge feature">Feat</span>
                                <span class="product-badge new">New</span>

                             -->

                        </div>
                    </div>
                    <div class="col-md-6 product-main-details mt--40 mt-md--10 mt-sm--30">
                        <div class="product-summary">
                            <div class="product-rating float-left"><span>
									<i class="dl-icon-star rated"></i>
									<i class="dl-icon-star rated"></i>
									<i class="dl-icon-star rated"></i>
									<i class="dl-icon-star rated"></i>
									<i class="dl-icon-star rated"></i></span>
                                <a href="" class="review-link">(1 customer review)</a>
                            </div>
                            <div class="product-navigation">
                                <a href="{{route("product")}}" class="prev">
                                    <i class="dl-icon-left"></i></a>
                                <a href="{{route("product")}}" class="next">
                                    <i class="dl-icon-right"></i></a></div>
                            <div class="clearfix"></div>
                            <h3 class="product-title">Original Mojitos</h3>
                            <span class="product-stock in-stock float-right">
								<i class="dl-icon-check-circle1"></i>in stock
                                </span>
                            <span class="product-stock out-of-stock float-right">
								<i class="dl-icon-close"></i>out of stock
                                </span>
                            <div class="clearfix"></div>
                            <form action="#" class="form--action mb--30 mb-sm--20">

                                <div class="product-price-area">

                                    <div class="ppa-each">
                                        <input type="radio" id="price-tag1" name="radio-group">
                                        <label for="price-tag1"><i
                                                class="fas fa-rupee-sign"></i>350.00<small>750ml</small><span
                                                class="discount-price"><i
                                                    class="fas fa-rupee-sign"></i>350.00</span></label>
                                    </div>

                                    <div class="ppa-each">
                                        <input type="radio" id="price-tag2" name="radio-group">
                                        <label for="price-tag2"><i
                                                class="fas fa-rupee-sign"></i>210.00<small>500ml</small></label>
                                    </div>

                                </div>

                                <div class="product-action flex-row align-items-center">
                                    <div class="quantity prd-page-qty">
                                        <input type="number" class="quantity-input" name="qty" id="qty" value="1"
                                               min="1" max="10"></div>
                                    <button type="button" class="btn btn-style-2 btn-large add-to-cart"
                                            onclick="location.href='{{route("cart")}}'">Add To Cart
                                    </button>
                                    <a class="add-to-wishlist" href="{{route("my-wishlist")}}">
                                        <i class="fas fa-heart"></i></a>
                                    <!-- Use <i class="far fa-heart"></i> if not in wishlist -->
                                    <div class="product-extra">
                                        <b>1L</b>, <b>5L</b> is not available for purchase at our estore and can only be
                                        bought from our retail store or
                                        with our distributors and retailers. In case you have any questions,
                                        <a href="support-centre.html">contact us </a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive product-meta-table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>PKG</th>
                                        <th>SKU</th>
                                        <th>BARCODE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>750ml</td>
                                        <td>3001</td>
                                        <td>8906000483015</td>
                                    </tr>
                                    <tr>
                                        <td>500ml</td>
                                        <td>3002</td>
                                        <td>8906000483010</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Product Description / Review Area Tabs -->

                <div class="row justify-content-center pt--45 pt-lg--50 pt-md--55 pt-sm--35 pb--50">
                    <div class="col-md-8 col-12">
                        <div class="product-data-tab tab-style-1">
                            <div class="nav nav-tabs product-data-tab__head mb--40 mb-md--30" id="product-tab"
                                 role="tablist">
                                <button type="button" class="product-data-tab__link nav-link active"
                                        id="nav-description-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-description" role="tab"
                                        aria-selected="true">
                                    <span>Description</span></button>
                                <button type="button" class="product-data-tab__link nav-link" id="nav-reviews-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#nav-reviews" role="tab" aria-selected="true">
                                    <span>Reviews(1)</span></button>
                            </div>


                            <div class="tab-content product-data-tab__content" id="product-tabContent">


                                <!-- Product Description -->

                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                     aria-labelledby="nav-description-tab">
                                    <div class="product-description">
                                        <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna
                                            molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci.
                                            Aliquam egestas libero ac turpis pharetra, in vehicula lacus
                                            scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit
                                            arcu.

                                        <p>Nunc lacus elit, faucibus ac laoreet sed, dapibus ac mi. Maecenas eu
                                            ante a elit tempus fermentum. Aliquam commodo tincidunt semper.
                                            Phasellus accumsan, justo ac mollis pharetra, ex dui pharetra nisl,
                                            a scelerisque ipsum nulla ac sem. Cras eu risus urna. Duis lorem
                                            sapien, congue eget nisl sit amet, rutrum faucibus elit.</p>
                                        <ul>
                                            <li>Maecenas eu ante a elit tempus fermentum. Aliquam commodo
                                                tincidunt semper
                                            </li>
                                            <li>Aliquam est et tempus. Eaecenas libero ante, tincidunt vel</li>
                                        </ul>
                                        <p>Curabitur sodales euismod nibh. Sed iaculis sed orci eget semper. Nam
                                            auctor, augue et eleifend tincidunt, felis mauris convallis neque,
                                            in placerat metus urna laoreet diam. Morbi sagittis facilisis arcu
                                            sed ornare. Maecenas dictum urna ut facilisis rhoncus.iaculis sed
                                            orci eget semper. Nam auctor, augue et eleifend tincidunt, felis
                                            mauris</p>
                                    </div>
                                </div>

                                <!-- Review Area -->

                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                     aria-labelledby="nav-reviews-tab">
                                    <div class="product-reviews">
                                        <h3 class="review__title">1 review for Original Mojito</h3>
                                        <ul class="review__list">
                                            <li class="review__item">
                                                <div class="review__container">

                                                    <div class="review__text">
                                                        <div class="product-rating float-right">
															<span>
															<i class="dl-icon-star rated">
															</i>
															<i class="dl-icon-star rated">
															</i>
															<i class="dl-icon-star rated">
															</i>
															<i class="dl-icon-star rated">
															</i>
															<i class="dl-icon-star rated">
															</i></span></div>
                                                        <div class="review__meta">
                                                            <strong class="review__author">John Snow
                                                            </strong>
                                                            <span class="review__dash">-</span>
                                                            <span class="review__published-date">November 20,
                                                                    2018</span>
                                                        </div>
                                                        <div class="clearfix">
                                                        </div>
                                                        <p class="review__description">Aliquam egestas libero ac
                                                            turpis pharetra, in vehicula lacus scelerisque.
                                                            Vestibulum ut sem laoreet, feugiat tellus at, hendrerit
                                                            arcu.</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="review-form-wrapper">
												<span class="reply-title">
												<h3>Add a review</h3>
												</span>
                                            <form action="#" class="form">
                                                <div class="form-notes mb--20">
                                                    <!-- Show only this parar if customer is not logged in. Hide the next para & review form.  -->
                                                    <p>Please <a href="login.html">Login</a> to Add Review.</p>
                                                    <p>Greetings,<b class="required">Customer Name</b>, please post your
                                                        review using the form. Please note all reviews are moderated to
                                                        check for spamming.</p>
                                                </div>
                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="revew__rating">
                                                        <p class="stars selected">
                                                            <a class="star-1 active" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </p></div>
                                                </div>

                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form__label" for="email">Your Review<span
                                                                    class="required">*</span></label>
                                                            <textarea name="review" id="review"
                                                                      class="form__input form__input--textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="submit" value="Submit"
                                                                   class="btn btn-style-1 btn-submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt--35 pt-md--25 pt-sm--15 pb--75 pb-md--55 pb-sm--35">
                    <div class="col-12">
                        <div class="row mb--40 mb-md--30">
                            <div class="col-12 text-center">
                                <h2 class="heading-secondary">Related Products</h2>
                                <hr class="separator center mt--25 mt-md--15">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mmtp-element-carousel product-carousel nav-vertical-center"
                                     data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": "dl-icon-left",
                                    "nextArrow": "dl-icon-right"
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":450, "settings": {"slidesToShow": 1} }
                                    ]'>
                                    <div class="mmtp-product">
                                        <div class="product-inner">
                                            <figure class="product-image has--bg">
                                                <div class="product-image--holder">
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/lime-mint-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="primary-image">
                                                    </a>
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/lime-mint-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="secondary-image">
                                                    </a>
                                                </div>
                                                <div class="mmtp-product-action">
                                                    <div class="product-action">
                                                        <a class="quickview-btn action-btn"
                                                           href="{{route("product")}}"
                                                           data-bs-toggle="tooltip" data-bs-placement="left"
                                                           title="View">
                                                            <i class="dl-icon-view"></i>
                                                        </a>
                                                        <a class="add_to_cart_btn action-btn" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Cart">
                                                                        <span data-bs-toggle="modal"
                                                                              data-bs-target="#addtoCart">
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                        </a>
                                                        <a class="add_wishlist action-btn"
                                                           href="{{route("my-wishlist")}}" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Wishlist">
                                                            <i class="dl-icon-heart4"></i>
                                                        </a>
                                                        <!-- To activate remove from wishlist --
                                                        <a class="add_wishlist action-btn"
                                                            href="{{route("my-wishlist")}}" data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Remove from Wishlist">
                                                            <i class="dl-icon-heart"></i>
                                                        </a>

                                                        -->
                                                    </div>
                                                </div>
                                                <span class="product-badge hot">Top</span>
                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{route("product")}}">Lime & Mint Mojito</a>
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
                                                <span class="product-price-wrapper">
                                                                <span class="money"><i class="fas fa-rupee-sign"></i>295.00</span>
                                                    <!-- If discount price is there -->
                                                    <!--
                                                    <span class="product-price-old">
                                                        <span class="money">$60.00</span>
                                                    </span>
                                                    -->
                                                            </span>
                                                <span class="product-weight-wrapper">
                                                             <span class="weight">750ml PET Bottle</span>
                                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mmtp-product">
                                        <div class="product-inner">
                                            <figure class="product-image has--bg">
                                                <div class="product-image--holder">
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/raspberry-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="primary-image">
                                                    </a>
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/raspberry-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="secondary-image">
                                                    </a>
                                                </div>
                                                <div class="mmtp-product-action">
                                                    <div class="product-action">
                                                        <a class="quickview-btn action-btn"
                                                           href="{{route("product")}}"
                                                           data-bs-toggle="tooltip" data-bs-placement="left"
                                                           title="View">
                                                            <i class="dl-icon-view"></i>
                                                        </a>
                                                        <a class="add_to_cart_btn action-btn" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Cart">
                                                                        <span data-bs-toggle="modal"
                                                                              data-bs-target="#addtoCart">
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                        </a>
                                                        <a class="add_wishlist action-btn"
                                                           href="{{route("my-wishlist")}}" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Wishlist">
                                                            <i class="dl-icon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-badge new">New</span> -->
                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{route("product")}}">Raspberry Mojito</a>
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
                                                <span class="product-price-wrapper">
                                                                <span class="money"><i class="fas fa-rupee-sign"></i>215.00</span>
                                                    <!-- If discount price is there -->
                                                    <!--
                                                    <span class="product-price-old">
                                                        <span class="money">$60.00</span>
                                                    </span>
                                                    -->
                                                            </span>
                                                <span class="product-weight-wrapper">
                                                             <span class="weight">500ml PET Bottle</span>
                                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mmtp-product">
                                        <div class="product-inner">
                                            <figure class="product-image has--bg">
                                                <div class="product-image--holder">
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/green-apple-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="primary-image">
                                                    </a>
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/green-apple-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="secondary-image">
                                                    </a>
                                                </div>
                                                <div class="mmtp-product-action">
                                                    <div class="product-action">
                                                        <a class="quickview-btn action-btn"
                                                           href="{{route("product")}}"
                                                           data-bs-toggle="tooltip" data-bs-placement="left"
                                                           title="View">
                                                            <i class="dl-icon-view"></i>
                                                        </a>
                                                        <a class="add_to_cart_btn action-btn" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Cart">
                                                                        <span data-bs-toggle="modal"
                                                                              data-bs-target="#addtoCart">
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                        </a>
                                                        <a class="add_wishlist action-btn"
                                                           href="{{route("my-wishlist")}}" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Wishlist">
                                                            <i class="dl-icon-heart4"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                                <!-- <span class="product-badge new">New</span> -->
                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{route("product")}}">Green Apple Mojito</a>
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
                                                <span class="product-price-wrapper">
                                                                <span class="money"><i class="fas fa-rupee-sign"></i>215.00</span>
                                                    <!-- If discount price is there -->
                                                    <!--
                                                    <span class="product-price-old">
                                                        <span class="money">$60.00</span>
                                                    </span>
                                                    -->
                                                            </span>
                                                <span class="product-weight-wrapper">
                                                             <span class="weight">500ml PET Bottle</span>
                                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mmtp-product">
                                        <div class="product-inner">
                                            <figure class="product-image has--bg">
                                                <div class="product-image--holder">
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/kiwi-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="primary-image">
                                                    </a>
                                                    <a href="{{route("product")}}">
                                                        <img src="{{asset("web/images/products/kiwi-mojito.png")}}"
                                                             alt="Kiwi Mojito" class="secondary-image">
                                                    </a>
                                                </div>
                                                <div class="mmtp-product-action">
                                                    <div class="product-action">
                                                        <a class="quickview-btn action-btn"
                                                           href="{{route("product")}}"
                                                           data-bs-toggle="tooltip" data-bs-placement="left"
                                                           title="View">
                                                            <i class="dl-icon-view"></i>
                                                        </a>
                                                        <a class="add_to_cart_btn action-btn" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Cart">
                                                                        <span data-bs-toggle="modal"
                                                                              data-bs-target="#addtoCart">
                                                                        	<i class="dl-icon-cart29"></i>
                                                                        </span>
                                                        </a>
                                                        <a class="add_wishlist action-btn"
                                                           href="{{route("my-wishlist")}}" data-bs-toggle="tooltip"
                                                           data-bs-placement="left" title="Add to Wishlist">
                                                            <i class="dl-icon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <span class="product-badge new">New</span>
                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{route("product")}}">Kiwi Mojito</a>
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
                                                <span class="product-price-wrapper">
                                                                <span class="money"><i class="fas fa-rupee-sign"></i>215.00</span>
                                                    <!-- If discount price is there -->
                                                    <!--
                                                    <span class="product-price-old">
                                                        <span class="money">$60.00</span>
                                                    </span>
                                                    -->
                                                            </span>
                                                <span class="product-weight-wrapper">
                                                             <span class="weight">500ml PET Bottle</span>
                                                             </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details End Here -->


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
                                    <img src="{{asset("web/images/banners/red-bg.jpg")}}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--center">
                                        <h3 class="withoutbg"><i class="fas fa-headset"></i>Need
                                            Help?<span>Visit our <b>Support Centre</b> for F.A.Qs and other support options.</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="support-centre.html">
                                </a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Promo Area End -->


    </div>
@endsection
