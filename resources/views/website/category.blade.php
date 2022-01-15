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
                            <li>Shop Products</li>
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


        <!-- USP Highlighter -->
        <section class="method-area pt--25 pt-md--50 pb--25 pb-md--55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 mb-md--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{ asset('web/images/icons/fresh-natural-fruit.png') }}" alt="Icon">
                            <h4 class="mt--20">Fresh & Natural</h4>
                            <p>Only the best quality fruits used.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-md--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{ asset('web/images/icons/free-shippng.png') }}" alt="Icon">
                            <h4 class="mt--20">Free Shipping</h4>
                            <p>Orders above <span class="fa fa-rupee"></span> 700 are shipped FREE!</p>
                            <!-- Shipping Rates to be integrated -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-sm--30">
                        <div class="method-box method-box-2 text-center">
                            <img src="{{ asset('web/images/icons/highest-quality.png') }}" alt="Icon">
                            <h4 class="mt--20">Always Best Quality</h4>
                            <p>We observe strict & highest production standard</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mobile-usp">
            <div class="nav nav-tabs mobile-usp-tab" id="mobile-usb-tab" role="tablist">
                <button type="button" class="" id="nav-natural-fresh-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-natural-fresh" role="tab" aria-selected="true">
                    <img src="{{ asset('web/images/icons/fresh-natural-fruit.png') }}" alt="Icon">
                </button>
                <button type="button" class="active" id="nav-free-shippng-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-free-shippng" role="tab" aria-selected="true">
                    <img src="{{ asset('web/images/icons/free-shippng.png') }}" alt="Icon">
                </button>
                <button type="button" class="" id="nav-highest-quality-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-highest-quality" role="tab" aria-selected="true">
                    <img src="{{ asset('web/images/icons/highest-quality.png') }}" alt="Icon">
                </button>

            </div>
            <div class="tab-content mobile-usp-tab-content" id="usp-list">
                <div class="tab-pane fade show active" id="nav-natural-fresh" role="tabpanel"
                    aria-labelledby="nav-natural-fresh-tab">
                    <h4>FRESH & NATURAL</h4>
                    <p>Only the best quality fruits used.</p>
                </div>
                <div class="tab-pane fade" id="nav-free-shippng" role="tabpanel" aria-labelledby="nav-free-shippng-tab">
                    <h4>FREE SHIPPING</h4>
                    <p>Orders above 700 are shipped FREE!</p>
                </div>
                <div class="tab-pane fade" id="nav-highest-quality" role="tabpanel"
                    aria-labelledby="nav-highest-quality-tab">
                    <h4>ALWAYS BEST QUALITY</h4>
                    <p>We observe strict & highest production standard.</p>
                </div>
            </div>
        </section>

        <!-- Method area End Here -->


        <!-- Product area Start Here -->

        <div class="shop-page-wrapper">
            <div class="container">
                <div class="row pb--75">
                    <div class="col-12">

                        <!-- Pager & Sort -->

                        <div class="shop-toolbar">
                            <div class="shop-toolbar__inner">
                                <div class="row align-items-center">
                                    <div class="col-md-6 text-md-start text-center mb-sm--20">
                                        <div class="shop-toolbar__left">
                                            <p class="product-pages">Showing {{$products->count()}} of {{$products->total()}} results</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-toolbar__right">
                                            <div class="product-ordering">
                                                <a href="javascript:void(0);"
                                                    class="product-ordering__btn shop-toolbar__btn">
                                                    <span>Sort By</span>
                                                    <i></i>
                                                </a>
                                                <ul class="product-ordering__list">
                                                    {{-- <li class=""><a href="#">Sort by popularity</a></li> --}}
                                                    <li class="{{ (isset($sortBy) && $sortBy == 'newness') ? 'active':''}}"><a href="{{route('category_product',[$category->page_slug]).'?sort_by=newness'}}" >Sort by newness</a></li>
                                                    <li class="{{ (isset($sortBy) && $sortBy == 'low_to_high') ? 'active':''}}"><a href="{{route('category_product',[$category->page_slug]).'?sort_by=low_to_high'}}" >Sort by price: low to high</a></li>
                                                    <li class="{{ (isset($sortBy) && $sortBy == 'high_to_low') ? 'active':''}}"><a href="{{route('category_product',[$category->page_slug]).'?sort_by=high_to_low'}}" >Sort by price: high to low</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product List -->

                        <div class="shop-products">
                            <div class="row grid-space-30">
                                <!-- Each Product -->
                                @foreach ($products as $key)
                                    <div class="col-xl-4 col-md-6 mb--40 mb-md--30">
                                        <div class="mmtp-product">
                                            <div class="product-inner">
                                                <figure class="product-image has--bg">
                                                    <div class="product-image--holder">
                                                        <a
                                                            href="{{ route('category_product', [$category->page_slug, $key->product_slug]) }}">
                                                            <img src="{{ asset('images/uploads/products/' . $key->product_image) }}"
                                                                alt="{{ $category->name }}" class="primary-image">
                                                        </a>
                                                        <a
                                                            href="{{ route('category_product', [$category->page_slug, $key->product_slug]) }}">
                                                            <img src="{{ asset('images/uploads/products/' . $key->product_image) }}"
                                                                alt="{{ $category->name }}" class="secondary-image">
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
                                                            {{-- <a class="add_to_cart_btn action-btn" data-product_info_id="{{$key->product_info_id}}" data-bs-toggle="tooltip" --}}
                                                            {{-- data-bs-placement="left" title="Add to Cart"> --}}
                                                            {{-- <span data-bs-toggle="modal" data-bs-target="#addtoCart"> --}}
                                                            {{-- <i class="dl-icon-cart29"></i> --}}
                                                            {{-- </span> --}}
                                                            {{-- </a> --}}
                                                            <a href="javascript:void(0)" class="add_to_cart_btn action-btn"
                                                                data-product_info_id="{{ $key->product_info_id }}"
                                                                title="Add to Cart">
                                                                <span>
                                                                    <i class="dl-icon-cart29"></i>
                                                                </span>
                                                            </a>
                                                            <a class="add_wishlist action-btn add_to_wishlist_btn" href="javascript:void(0);"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                data-product_info_id="{{$key->product_info_id}}"
                                                                title="Add to Wishlist">
                                                                <i class="dl-icon-heart4"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <span class="product-badge hot">{{ LABEL[$key->label] }}</span>
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
                                                    <span class="product-price-wrapper">
                                                        <span class="money"><i
                                                                class="fas fa-rupee-sign"></i>{{ $key->cost_price }}</span>
                                                        <!-- If discount price is there -->
                                                        <!--
                                                            <span class="product-price-old">
                                                                <span class="money">$60.00</span>
                                                            </span>
                                                            -->
                                                    </span>
                                                    <span class="product-weight-wrapper">
                                                        <span
                                                            class="weight">{{ $key->packaging_weight . ' ' . $key->packaging_type }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                <li>
                                    <a href="{{$products->previousPageUrl()}}" class="prev page-number">
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $products->url($i) }}">
                                            <span class="{{ ($products->currentPage() == $i) ? ' current' : '' }} page-number">{{ $i }}</span>
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{$products->nextPageUrl()}}" class="next page-number">
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>

        <!-- Product area End Here -->


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
                                                latest lip-smacking recipes..</span></h3>
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
                                                drink of yours more special..</span></h3>
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
                                        <h3 class="withoutbg"><i class="fas fa-headset"></i>Need Help?<span>Visit our
                                                <b>Support Centre</b> for F.A.Qs and other support options.</span></h3>
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
        const userExists = '{{ (\Auth::user()) ? true:false }}';
        let wishListProduct = '{{\Session::get("product_info_id")}}';
        const refreshPage = 'reload';
    </script>
    <script src="{{asset('js/wishlist/add_wishlist.js')}}"></script>
@endsection
