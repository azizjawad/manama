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
                            <li><a href="#">Shop Products</a></li>
                            <li>{{ $category->name }}</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <div class="cat-info">
                            <h2>{{ ucwords($category->name) }}</h2>
                            <p>{{ $category->description }}</p>
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
                                        <div class="mmtp-element-carousel nav-slider slick-vertical" data-slick-options='{
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
                                                    }' data-slick-responsive='[
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
                                                <img src="{{ asset('images/uploads/products/' . $product[0]->image) }}"
                                                     alt="Products">
                                            </figure>
                                            @foreach ($gallery as $item)
                                                <figure class="product-gallery__thumb--single has--bg">
                                                    <img src="{{ url('storage/uploads/products-gallery/' . $item->image_path) }}"
                                                         alt="Products">
                                                </figure>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Large Image Area Begins -->

                                <div class="product-gallery__large-image">
                                    <div class="gallery-with-thumbs">
                                        <div class="product-gallery__wrapper">
                                            <div class="mmtp-element-carousel main-slider product-gallery__full-image image-popup"
                                                 data-slick-options='{
                                                            "slidesToShow": 1,
                                                            "slidesToScroll": 1,
                                                            "infinite": true,
                                                            "arrows": false,
                                                            "asNavFor": ".nav-slider"
                                                        }'>

                                                <!-- Image Large Here -->
                                                <figure class="product-gallery__image has--bg">
                                                    <img src="{{ asset('images/uploads/products/' . $product[0]->image) }}"
                                                         alt="Products">
                                                </figure>

                                                @foreach ($gallery as $item)
                                                    <figure class="product-gallery__image has--bg">
                                                        <img src="{{ url('storage/uploads/products-gallery/' . $item->image_path) }}"
                                                             alt="Products">
                                                    </figure>
                                                @endforeach
                                            </div>
                                            <div class="product-gallery__actions">
                                                <button class="action-btn btn-zoom-popup">
                                                    <i class="dl-icon-zoom-in">
                                                    </i>
                                                </button>

                                                <!-- Video will be optional -->

                                                {{-- <a href="https://www.youtube.com/watch?v=IvS27nnP2kY" --}}
                                                {{-- class="action-btn video-popup"> --}}
                                                {{-- <i --}}
                                                {{-- class="dl-icon-format-video"> --}}
                                                {{-- </i> --}}
                                                {{-- </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="product-badge {{LABEL_CLASS[$product[0]['label']]}}">{{ LABEL[$product[0]['label']] }}</span>

                            <!-- Other Tag Codes

                                        <span class="product-badge feature">Feat</span>
                                        <span class="product-badge new">New</span>

                                     -->

                        </div>
                    </div>

                    <div class="col-md-6 product-main-details mt--40 mt-md--10 mt-sm--30">
                        <div class="product-summary">
                            <div class="product-rating float-left"><span>
                                @php
                                    $reviewAvg = $reviews->avg('rating');
                                @endphp
                                 @for ($i = 1; $i <= $reviewAvg; $i++)
                                    <i class="dl-icon-star rated"></i>
                                @endfor
                            </span>
                                <a href="" class="review-link">({{count($reviews)}} customer review)</a>
                            </div>
                            <div class="product-navigation">
                                <a href="#" class="prev">
                                    <i class="dl-icon-left"></i></a>
                                <a href="#" class="next">
                                    <i class="dl-icon-right"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <h3 class="product-title">{{ $product[0]->product_name }}</h3>
                            <div id="product_in_stock">
                                @if ($product[0]->is_in_stock)
                                    <span class="product-stock in-stock float-right">
                                    <i class="dl-icon-check-circle1"></i>in stock
                                </span>
                                @else
                                    <span class="product-stock out-of-stock float-right">
                                    <i class="dl-icon-close"></i>out of stock
                                </span>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                            <form action="#" class="form--action mb--30 mb-sm--20">

                                <div class="product-price-area">
                                    @foreach ($product as $key)
                                        <div class="ppa-each">
                                            <input type="radio" {{ $loop->index == 0 ? 'checked' : '' }}
                                            value="{{ $key->product_info_id }}"
                                                   id="price-tag{{ $loop->index + 1 }}" name="product_info_id">
                                            <label for="price-tag{{ $loop->index + 1 }}">
                                                <i class="fas fa-rupee-sign"></i>
                                                {{ $key->cost_price }}
                                                <small>{{ $key->packaging_weight }}</small>
                                                {{-- <span class="discount-price"> --}}
                                                {{-- <i class="fas fa-rupee-sign"></i>350.00 --}}
                                                {{-- </span> --}}
                                            </label>
                                        </div>
                                    @endforeach


                                </div>

                                <div class="product-action flex-row align-items-center">
                                    <div class="quantity prd-page-qty">
                                        <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1"
                                               max="10">
                                    </div>
                                    <button type="button" data-product_info_id="{{ $key->product_info_id }}" {{ !$product[0]->is_in_stock ? 'disabled' : '' }}
                                    class="btn btn-style-2 btn-large add_from_mini_cart">Add To Cart</button>
                                    <a class="add-to-wishlist  add_to_wishlist_btn" href="javascript:void(0);"
                                       data-product_info_id="{{ $key->product_info_id }}">
                                        <i class="fas fa-heart"></i></a>
                                    <!-- Use <i class="far fa-heart"></i> if not in wishlist -->
                                    <div class="product-extra">
                                        <b>1L</b>, <b>5L</b> is not available for purchase at our estore and can only be
                                        bought from our retail store or
                                        with our distributors and retailers. In case you have any questions,
                                        <a href="{{route('support-center')}}">contact us </a>
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
                                    @foreach ($product as $key)
                                        <tr>
                                            <td>{{ $key->packaging_weight }}</td>
                                            <td>{{ $key->sku_code }}</td>
                                            <td>{{ $key->barcode }}</td>
                                        </tr>
                                    @endforeach
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
                                        id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
                                        role="tab" aria-selected="true">
                                    <span>Description</span></button>
                                <button type="button" class="product-data-tab__link nav-link" id="nav-reviews-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-reviews" role="tab" aria-selected="true">
                                    <span>Reviews {{ count($reviews) > 0 ? '(' . count($reviews) . ')' : '' }}</span></button>
                            </div>


                            <div class="tab-content product-data-tab__content" id="product-tabContent">


                                <!-- Product Description -->

                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                     aria-labelledby="nav-description-tab">
                                    <div class="product-description">
                                        {!! $product[0]->description !!}
                                    </div>
                                </div>

                                <!-- Review Area -->

                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                     aria-labelledby="nav-reviews-tab">
                                    <div class="product-reviews">
                                        <h3 class="review__title"> {{ count($reviews) }}
                                            {{ count($reviews) > 1 ? 'reviews' : 'review' }} for Original Mojito</h3>
                                        <ul class="review__list">
                                            <li class="review__item">
                                                @foreach ($reviews as $review)
                                                    <div class="review__container">

                                                        <div class="review__text">
                                                            <div class="product-rating float-right">
                                                                <span>
                                                                    @for ($i = 1; $i <= $review->rating; $i++)
                                                                        <i class="dl-icon-star rated"></i>
                                                                    @endfor
                                                                </span>
                                                            </div>
                                                            <div class="review__meta">
                                                                <strong class="review__author">{{ $review->user->name }}
                                                                </strong>
                                                                <span class="review__dash">-</span>
                                                                <span
                                                                    class="review__published-date">{{ date('d M, Y', strtotime($review->created_at)) }}</span>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                            <p class="review__description">{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                @endforeach
                                            </li>
                                        </ul>
                                        <div class="review-form-wrapper">
                                            <span class="reply-title">
                                                <h3>Add a review</h3>
                                            </span>
                                            <form action="/submit-review" class="form" type="POST">
                                                <input type="hidden" name="rating" id="rating">
                                                <input type="hidden" name="product_id" id="product_id"
                                                       value="{{ $product[0]->id }}">
                                                <div class="form-notes mb--20">
                                                    <!-- Show only this parar if customer is not logged in. Hide the next para & review form.  -->
                                                    @if (\Auth::id())
                                                        <p>Greetings,<b
                                                                class="required">{{ \Auth::user()->name }}</b>,
                                                            please
                                                            post your
                                                            review using the form. Please note all reviews are moderated to
                                                            check for spamming.</p>
                                                    @else
                                                        <p>Please <a href="javascript:void(0);" onClick="loginValidityForReview('review')">Login</a> to Add Review.</p>
                                                    @endif
                                                </div>
                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="revew__rating">
                                                        <p class="stars selected">
                                                            <a class="star-1 star_rating" data-rating="1" href="#">1</a>
                                                            <a class="star-2 star_rating" data-rating="2" href="#">2</a>
                                                            <a class="star-3 star_rating" data-rating="3" href="#">3</a>
                                                            <a class="star-4 star_rating" data-rating="4" href="#">4</a>
                                                            <a class="star-5 star_rating" data-rating="5" href="#">5</a>
                                                        </p>
                                                        <span class="rating_error error_span" style="color: red"></span>
                                                    </div>
                                                </div>

                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form__label" for="comment">Your Review<span
                                                                    class="required">*</span></label>
                                                            <textarea name="comment" id="comment"
                                                                      class="form__input form__input--textarea"></textarea>
                                                            <span class="comment_error error_span"
                                                                  style="color: red"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="button" value="Submit"
                                                                   class="btn btn-style-1 btn-submit review_submit">
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
                                <div class="mmtp-element-carousel product-carousel nav-vertical-center" data-slick-options='{
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
                                    @foreach ($related_products as $key)
                                        <div class="mmtp-product">
                                            <div class="product-inner">
                                                <figure class="product-image has--bg">
                                                    <div class="product-image--holder">
                                                        <a
                                                            href="{{ route('category_product', [$category->page_slug, $key->product_slug]) }}">
                                                            <img src="{{ asset('images/uploads/products/' . $key->product_image) }}"
                                                                 alt="Kiwi Mojito" class="primary-image">
                                                        </a>
                                                        <a
                                                            href="{{ route('category_product', [$category->page_slug, $key->product_slug]) }}">
                                                            <img src="{{ asset('images/uploads/products/' . $key->product_image) }}"
                                                                 alt="Kiwi Mojito" class="secondary-image">
                                                        </a>
                                                    </div>
                                                    <div class="mmtp-product-action">
                                                        <div class="product-action">
                                                            <a class="quickview-btn action-btn"
                                                               href="{{ route('category_product', [$category->page_slug, $key->product_slug]) }}"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               title="View">
                                                                <i class="dl-icon-view"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="add_to_cart_btn action-btn"
                                                               data-product_id="{{ $key->id }}"
                                                               title="Add to Cart">
                                                                <span>
                                                                    <i class="dl-icon-cart29"></i>
                                                                </span>
                                                            </a>
                                                            <a class="add_wishlist action-btn add_to_wishlist_btn"
                                                               href="javascript:void(0);" data-bs-toggle="tooltip"
                                                               data-product_info_id="{{ $key->product_info_id }}"
                                                               data-bs-placement="left" title="Add to Wishlist">
                                                                <i class="dl-icon-heart4"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="product-badge {{LABEL_CLASS[$key->label]}}">{{ LABEL[$key->label] }}</span>
                                                    <!-- Other Tag Codes

                                                            <span class="product-badge feature">Feat</span>
                                                            <span class="product-badge new">New</span>

                                                            -->

                                                </figure>
                                                <div class="product-info">
                                                    <h3 class="product-title">
                                                        <a href="#">{{ $key->product_name }}</a>
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
{{--                                                    <span class="product-price-wrapper">--}}
{{--                                                        <span class="money"><i--}}
{{--                                                                class="fas fa-rupee-sign"></i>{{ $key->cost_price }}</span>--}}
{{--                                                        <!-- If discount price is there -->--}}
{{--                                                        <!----}}
{{--                                                                <span class="product-price-old">--}}
{{--                                                                    <span class="money">$60.00</span>--}}
{{--                                                                </span>--}}
{{--                                                                -->--}}
{{--                                                    </span>--}}
{{--                                                    <span class="product-weight-wrapper">--}}
{{--                                                        <span--}}
{{--                                                            class="weight">{{ $key->packaging_weight . ' ' . $key->packaging_type }}</span>--}}
{{--                                                    </span>--}}
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

        <!-- Product Details End Here -->


        <!-- Promo Area Start -->

        <div class="banner-area">
            <div class="container-fluid pb--20">
                <div class="row">
                    <div class="order-md-1 col-md-4 col-12">
                        <div class="banner-box banner-type-10 banner-hover-3 ">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('web/images/banners/mmtp-recipe.jpg') }}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg bluebg">Looking for Recipes?<span>Visit our Recipe Corner for
                                                latest lip-smacking recipes..</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="{{ route('recipe-corner') }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="order-md-3 col-md-4 col-12">

                        <div class="banner-box banner-type-10 banner-hover-3">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('web/images/banners/mmtp-tips.jpg') }}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--down">
                                        <h3 class="withbg bluebg">Mix it like a Pro!<span>Tips & Techniques to make that
                                                drink of yours more special..</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="{{ route('tips-techniques') }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="order-md-2 col-md-4 col-12">
                        <div class="banner-box banner-type-10">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('web/images/banners/red-bg.jpg') }}" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <div class="banner-info--inner--center">
                                        <h3 class="withoutbg"><i class="fas fa-headset"></i>Need
                                            Help?<span>Visit our <b>Support Centre</b> for F.A.Qs and other support
                                                options.</span>
                                        </h3>
                                    </div>
                                </div>
                                <a class="banner-link banner-overlay" href="{{route('support-center')}}">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Promo Area End -->


    </div>
    <script>

        const userExists = '{{ \Auth::user() ? true : false }}';
        let wishListProduct = '{{ \Session::get('product_info_id') }}';
        const refreshPage = 'wishlist';
        const reference_type = '{{ \Session::get('reference_type') }}';

        $('input[name="product_info_id"]').click(function (){
            let product_info = $('input[name="product_info_id"]:checked').val();
            $.ajax({
                url: '{{route('get-product-details')}}/'+product_info,
                method: 'get',
                success: function (res){
                    if (res.status == true){
                        if (res.data.is_in_stock == 1){
                        }
                        // $('.product-title').text(res.data.listing_name);
                        $('.add-to-cart').attr('disabled', (res.data.is_in_stock == 0));
                        let span_html = '';
                        if(res.data.is_in_stock == 0) {
                            span_html = `<span class="product-stock out-of-stock float-right">
                                <i class="dl-icon-close"></i>out of stock
                            </span>`;
                        }else{
                            span_html =  `<span class="product-stock in-stock float-right">
                                <i class="dl-icon-check-circle1"></i> in stock
                           <span>`;
                        }

                        $('.product-stock').attr('disabled', (res.data.is_in_stock == 0))
                        $('#product_in_stock').html(span_html);
                    }
                }
            })
        });
    </script>
    <script src="{{ asset('js/wishlist/add_wishlist.js') }}"></script>
    <script src="{{ asset('js/review.js') }}"></script>
@endsection
