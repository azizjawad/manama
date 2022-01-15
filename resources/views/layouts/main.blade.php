<!doctype html>
<html lang="en">
<head>
    <title>{{(isset($meta_title) && !empty($meta_title)) ? $meta_title : "Manama Toppings - Always Something New"}}</title>
    <!-- Basic metas -->
    <!-- =================================================================================================== -->
    <meta charset="utf-8" />
    <meta name="title" content="{{(isset($meta_title) && !empty($meta_title)) ? $meta_title : "Manama Toppings - Always Something New"}}" />
    <meta name="description" content="{{(isset($meta_description) && !empty($meta_description)) ? $meta_description : ""}}" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile metas -->
    <!-- =================================================================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="mobile-web-app-capable" content="yes" />
    <!-- Favicons -->
    <!-- =================================================================================================== -->
    <link rel="shortcut icon" href="{{asset("web/images/favicons/favicon.png")}}" />
    <link rel="apple-touch-icon" href="{{asset("web/images/favicons/apple-touch-icon.png")}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("web/images/favicons/apple-touch-icon-72x72.png")}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("web/images/favicons/apple-touch-icon-114x114.png")}}" />

    <!-- Windows tiles -->
    <!-- =================================================================================================== -->
    <meta name="application-name" content="Manama Toppings - Always Something New" />
    <meta name="msapplication-TileColor" content="#FFF" />
    <meta name="msapplication-square70x70logo" content="{{asset("web/images/favicons/msapplication-tiny.png")}}" />
    <meta name="msapplication-square150x150logo" content="{{asset("web/images/favicons/msapplication-square.png")}}" />

    <!-- Mobile browser coloring -->
    <!-- =================================================================================================== -->

    <meta name="theme-color" content="#952724" />
    <meta name="msapplication-navbutton-color" content="#952724" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#952724" />
    <!-- CSS -->
    <!-- =================================================================================================== -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("web/css/bootstrap.css")}}">

    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/e33c582dd4.js" crossorigin="anonymous"></script>

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href={{asset("web/css/dl-icon.css")}}>

    <!-- All Plugins CSS css -->
    <link rel="stylesheet" href={{asset("web/css/plugins.css")}}>

    <!-- Revoulation Slider CSS  -->
    <link rel="stylesheet" href={{asset("web/css/revolution.css")}}>

    <!-- style CSS -->
    <link rel="stylesheet" href={{asset("web/css/main.css")}}>

    <!-- modernizr JS
    ============================================ -->
    <script src="{{asset("web/js/vendor/modernizr-2.8.3.min.js")}}"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset("web/js/vendor/jquery.min.js")}}"></script>

</head>

<body>

<div class="ai-preloader active">
    <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
        <div class="ai-child ai-bounce1"></div>
        <div class="ai-child ai-bounce2"></div>
        <div class="ai-child ai-bounce3"></div>
    </div>
</div>

<!-- Main Wrapper Start -->
<div class="wrapper">
    <!-- Header Area Start -->
    <header class="header header-fullwidth header-style-4">
        <div class="header-outer">
            <div class="header-inner fixed-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-4 order-1">
                            <div class="header-left d-flex">
                                <!-- Logo Start Here -->
                                <a href="/" class="logo-box">
                                    <figure class="logo--normal">
                                        <img src="{{asset("web/images/logo.png")}}" alt="Logo" />
                                    </figure>
                                </a>
                                <!-- Logo End Here -->


                            </div>
                        </div>

                        <div class="col-lg-8 order-3 order-lg-2">
                            <!-- Main Navigation Start Here -->
                            <nav class="main-navigation">
                                <ul class="mainmenu mainmenu--centered">
                                    <li class="mainmenu__item active">
                                        <a href="/" class="mainmenu__link">
                                            <span class="mm-text">Home</span>
                                        </a>

                                    </li>
                                    <li class="mainmenu__item menu-item-has-children">
                                        <a href="javacript:void(0);" class="mainmenu__link">
                                            <span class="mm-text">Shop Products</span>
                                        </a>
                                        @php
                                            $categoryMenu = Helpers::fetchProductMenu();
                                        @endphp
                                        @if (!empty($categoryMenu))
                                            <ul class="megamenu four-column">
                                                @foreach($categoryMenu->chunk(3) as $chunk)
                                                    <li>
                                                        <ul>
                                                            @foreach ($chunk as $category)
                                                                <li>
                                                                    <a href="{{route('category_product',[$category->page_slug])}}" class="menu-item-img">
                                                                        <img src="{{asset("images/uploads/products/$category->product_image")}}" alt="{{$category->name}}"/>
                                                                        <span>{{$category->name}}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                                <li class="d-none d-lg-block banner-holder">
                                                    <div class="megamenu-banner">
                                                        <div class="megamenu-banner-image"></div>
                                                        <div class="megamenu-banner-info">
                                                            <h3><span>build</span><br><span>flavour box</span></h3>
                                                            <span>
                                                                    <a href="#">start here</a>
                                                                </span>
                                                        </div>
                                                        <a href="#" class="megamenu-banner-link"></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                        {{-- <ul class="megamenu four-column">
                                            <li>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('category_product',['mojitos'])}}" class="menu-item-img">
                                                            <img src="{{asset("web/images/products/original-mojito.png")}}" />
                                                            <span>Mojitos</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}" class="menu-item-img">
                                                            <img src="{{asset("web/images/products/mango-fruit-syrup.png")}}" />
                                                            <span>Fruit Twists</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}" class="menu-item-img">
                                                            <img src="{{asset("web/images/products/litchi-crush.png")}}" />
                                                            <span>Crushes</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('category_product')}}" class="menu-item-img">
                                                            <img src="{{asset("web/images/products/lime-mint-sweet-chilli-dip-chutney.png")}}" />
                                                            <span>Sweet Chilli Chutneys</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}" class="menu-item-img">
                                                            <img src="{{asset("web/images/products/cherry-fruit-fillings.png")}}" />
                                                            <span>Fruit Fillings</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="d-none d-lg-block banner-holder">
                                                <div class="megamenu-banner">
                                                    <div class="megamenu-banner-image"></div>
                                                    <div class="megamenu-banner-info">
                                                        <h3><span>build</span><br><span>flavour box</span></h3>
                                                        <span>
                                                                <a href="flavour-box.html">start here</a>
                                                            </span>
                                                    </div>
                                                    <a href="shop-sidebar.html" class="megamenu-banner-link"></a>
                                                </div>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    <li class="mainmenu__item">
                                        <a href="{{route('recipe-corner')}}" class="mainmenu__link">
                                            <span class="mm-text">Recipe Corner</span>
                                        </a>
                                    </li>
                                    <li class="mainmenu__item">
                                        <a href="{{route('tips-techniques')}}" class="mainmenu__link">
                                            <span class="mm-text">Tips & Techniques</span>
                                        </a>

                                    </li>
                                    <li class="mainmenu__item menu-item-has-children has-children">
                                        <a href="javacript:void(0);" class="mainmenu__link">
                                            <span class="mm-text">Inside Manama</span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{route('about-us')}}">
                                                    <span class="mm-text">Who We Are</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('our-distributors')}}">
                                                    <span class="mm-text">Our Distributors</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('customer-testimonials')}}"><span class="mm-text">Customer Testimonials</span></a>
                                            </li>
                                            <li>
                                                <a href="{{route('contact-us')}}">
                                                    <span class="mm-text">Contact Us</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <!-- Main Navigation End Here -->
                        </div>

                        <div class="col-lg-2 col-md-9 col-8 order-2 order-lg-3">
                            <ul class="header-toolbar text-end main-menu">
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="#">
                                        <img src="{{asset("web/images/icons/003-user.png")}}" />
                                    </a>
                                    <ul class="user-info-menu">
                                        @if(Auth::user())
                                            <li>
                                                <a href="{{route("my-account")}}">My Account</a>
                                            </li>
                                            <li>
                                                <a href="{{route('my-wishlist')}}">My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="{{route("change-password")}}">Change Password</a>
                                            </li>
                                            <li>
                                                <a href="{{route("logout")}}">Logout</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route("register")}}">Register</a>
                                            </li>
                                            <li>
                                                <a href="{{route("login")}}">Login</a>
                                            </li>
                                        @endif

                                    </ul>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                        <img src="{{asset("web/images/icons/006-bag.png")}}" />
                                        <sup class="mini-cart-count">2</sup>
                                    </a>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="search-btn toolbar-btn">
                                        <img src="{{asset("web/images/icons/007-magnifying-glass.png")}}" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-sticky-header-height"></div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Mobile Header area Start -->
    <header class="header-mobile">
        <div class="header-mobile__outer">
            <div class="header-mobile__inner fixed-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <a href="/" class="logo-box">
                                <figure class="logo--normal">
                                    <img src="{{asset("web/images/logo-icon.png")}}" alt="Logo">
                                </figure>
                            </a>
                        </div>
                        <div class="col-8">
                            <ul class="header-toolbar text-end">
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="#">
                                        <img src="{{asset("web/images/icons/003-user.png")}}" />
                                    </a>
                                    <ul class="user-info-menu">
                                        <li>
                                            <a href="{{route('my-account')}}">My Account</a>
                                        </li>
                                        <li>
                                            <a href="{{route('my-wishlist')}}">My Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="{{route('change-password')}}">Change Password</a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}">Logout</a>
                                        </li>
                                        <li>
                                            <a href="{{route('register')}}">Register</a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}">Login</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                        <img src="{{asset("web/images/icons/006-bag.png")}}" />
                                        <sup class="mini-cart-count">2</sup>
                                    </a>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="search-btn toolbar-btn">
                                        <img src="{{asset("web/images/icons/007-magnifying-glass.png")}}" />
                                    </a>
                                </li>
                                <li class="header-toolbar__item d-lg-none">
                                    <a href="#" class="menu-btn"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Mobile Navigation Start Here -->
                            <div class="mobile-navigation dl-menuwrapper" id="dl-menu">
                                <button class="dl-trigger">Open Menu</button>
                                <ul class="dl-menu">
                                    <li><a href="/">Home</a></li>
                                    <li>
                                        <a href="#">
                                            Shop Products
                                        </a>
                                        <ul class="dl-submenu">
                                            <li>
                                                <a class="megamenu-title" href="#">
                                                    Choose your Flavour
                                                </a>
                                                <ul class="dl-submenu">
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/original-mojito.png")}}" /> <span class="mm-text">Mojitos</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/mango-fruit-syrup.png")}}" /> <span class="mm-text">Fruit Twists</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/litchi-crush.png")}}" /> <span class="mm-text">Crushes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/caramel-sauces.png")}}" /> <span class="mm-text">Sauces</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/peach-ice-tea.png")}}" /> <span class="mm-text">Iced Teas</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/raspberry-jam.png")}}" /> <span class="mm-text">Jams</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/lime-mint-sweet-chilli-dip-chutney.png")}}" /> <span class="mm-text">Sweet Chilli Chutneys</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('category_product')}}">
                                                            <img src="{{asset("web/images/products/cherry-fruit-fillings.png")}}" /> <span class="mm-text">Fruit Fillings</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Build Flavour Box
                                                </a>

                                            </li>


                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{route('recipe-corner')}}">
                                            Recipe Corner
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('tips-techniques')}}">
                                            Tips & Techniques
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> {{-- blog.html --}}
                                            Inside Manama
                                        </a>
                                        <ul class="dl-submenu">
                                            <li>
                                                <a href="{{route('about-us')}}">
                                                    Who We Are
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('our-distributors')}}">
                                                    Our Distributors
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('customer-testimonials')}}">
                                                    Customer Testimonials
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('contact-us')}}">
                                                    Contact Us
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Mobile Navigation End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-sticky-header-height"></div>
        </div>
    </header>
    <!-- Mobile Header area End -->

    <!-- Main Content Wrapper Start -->
    @yield('content')

    <footer class="footer footer-1 bg--black ptb--40">
        <div class="footer-top pb--40 pb-md--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-md--30">
                        <div class="footer-widget">
                            <h3 class="widget-title">Company</h3>
                            <ul class="widget-menu">
                                <li><a href="{{route('about-us')}}">About Us</a></li>
{{--                                <li><a href="distributors.html">Distributors</a></li>--}}
                                <li><a href="{{route('download-brochure')}}">Download Brochure</a></li>
                                <li><a href="{{route('contact-us')}}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-sm--30">
                        <div class="footer-widget">
                            <h3 class="widget-title">FOR CUSTOMER</h3>
                            <ul class="widget-menu">
                                <li><a href="{{route("register")}}">Register Account</a></li>
                                <li><a href="{{route("my-account")}}">My Account</a></li>
                                <li><a href="{{route('support-center')}}">Support Centre</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-sm--30">
                        <div class="footer-widget">
                            <h3 class="widget-title">RESOURCES</h3>
                            <ul class="widget-menu">
                                <li><a href="{{route('recipe-corner')}}">Recipe Corner</a></li>
                                <li><a href="{{route('tips-techniques')}}">Tips & Techniques</a></li>
{{--                                <li><a href="{{route('')}}">Press Releases</a></li>--}}
                                <li>
                                    <a href="{{route('customer-testimonials')}}"><span class="mm-text">Customer Testimonials</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-sm--30">
                        <div class="footer-widget">
                            <h3 class="widget-title">TERMS & POLICY</h3>
                            <ul class="widget-menu">
                                <li><a href="{{route('terms-and-conditions')}}">Terms & Conditions</a></li>
                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('shipping-policy')}}">Shipping Policy</a></li>
                                <li><a href="{{route('return_refund_policy')}}">Return & Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle pb--40 pb-md--30">
            <div class="container">
                <div class="row method-box-wrapper">
                    <div class="col-12 mb-md--10">
                        <ul class="social text-center">
                            <li class="social__item">
                                <a href="https://facebook.com" class="social__link color--white">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="https://instagram.com" class="social__link color--white">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="https://youtube.com" class="social__link color--white">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="https://twitter.com" class="social__link color--white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="copyright-text">Manama Farms & Foods<i class="far fa-copyright"></i>2021</p>
                        <p class="copyright-text small">Made in India with<i class="fas fa-heart"></i>by <a href="https://www.frypangraphics.com/" target="_blank">Frypan Graphics</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer End -->

    <!-- Search from Start -->
    <div class="searchform__popup" id="searchForm">
        <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
        <div class="searchform__body">
            <p>Start typing and press Enter to search</p>
            <form class="searchform">
                <input type="text" name="search" id="search" class="searchform__input"
                       placeholder="Search Entire Store...">
                <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
            </form>
        </div>
    </div>
    <!-- Search from End -->

    <!-- Mini Cart Start -->
    <aside class="mini-cart" id="miniCart">
        <div class="mini-cart-wrapper">
            <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="mini-cart-inner">
                <h2 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h2>
                <div class="mini-cart__content">
                    <div class="dynamic-cart-render">

                    </div>
                    <div class="mini-cart__buttons">
                        <a href="{{route('cart')}}" class="btn btn-fullwidth btn-style-1">View Cart</a>
                        <a href="{{route('checkout')}}" class="btn btn-fullwidth btn-style-1">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Mini Cart End -->

    <!-- Add to Cart Modal Start -->

    <div class="modal fade product-modal" id="addtoCart" aria-hidden="true" aria-labelledby="addtoCartLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addtoCartLabel">Add to Cart Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                    </button>
                </div>
                <div class="modal-body px-5 pb-5 update_product_html">
                    <!-- Each Product -->


                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Cart Modal End -->

    <!-- Global Overlay Start -->
    <div class="ai-global-overlay"></div>
    <!-- Global Overlay End -->


</div>
<!-- Main Wrapper End -->


<!-- ************************* JS Files ************************* -->
<script>
    function load_cart(){
        $.ajax({
            url:"/api/fetch-cart-details",
            success: function (res){
                let cart_items = '';
                let total = 0;
                $.each(res.data, function (index, item){
                    cart_items += `<li class="mini-cart__product">
                                        <a data-page="0" data-delete_url="/api/cart/delete" data-delete_id="${item.cart_id}" href="javascript:" class="delete_item remove-from-cart remove">
                                            <i class="dl-icon-close"></i>
                                        </a>
                                        <div class="mini-cart__product__image">
                                            <img src="/images/uploads/products/${item.image}" alt="products">
                                        </div>
                                        <div class="mini-cart__product__content">
                                            <a class="mini-cart__product__title" href="">${item.product_name}</a>
                                            <span class="mini-cart__product__quantity">${item.quantity} x <i class="fas fa-rupee-sign"></i>${item.cost_price}</span>
                                        </div>
                                    </li>`;
                    total = total + parseInt(item.cost_price) * parseInt(item.quantity);
                });


                if (cart_items !== '') {
                    $('#miniCart,.ai-global-overlay').show();
                    let static_html = `<ul class="mini-cart__list">
                                    ${cart_items}
                                    </ul>
                                <div class="mini-cart__total">
                                    <span>Subtotal</span>
                                    <span class="ammount"><i class="fas fa-rupee-sign"></i>${total.toFixed(2)}</span>
                                </div>`;

                    $('.dynamic-cart-render').html(static_html);
                }else{
                    $('#miniCart,.ai-global-overlay').hide();
                    $('.dynamic-cart-render').html('<p>No Items in your cart</p>');
                }
                $('.mini-cart-count').html(res.data.length);
            }
        });
    }
    load_cart();
</script>
<!-- Bootstrap and Popper Bundle JS -->
<script src="{{asset("web/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset('js/vendor/jquery.validate/jquery.validate.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- All Plugins Js -->
<script src="{{asset("web/js/plugins.js")}}"></script>

<!-- Ajax Mail Js -->
<script src="{{asset("web/js/ajax-mail.js")}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Main JS -->
<script src="{{asset("web/js/main.js")}}"></script>
<script src="{{asset("web/js/myaccount.js")}}"></script>


<!-- REVOLUTION JS FILES -->
<script src="{{asset("web/js/revolution-slider/jquery.themepunch.tools.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/jquery.themepunch.revolution.min.js")}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.actions.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.carousel.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.kenburn.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.layeranimation.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.migration.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.navigation.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.parallax.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.slideanims.min.js")}}"></script>
<script src="{{asset("web/js/revolution-slider/extensions/revolution.extension.video.min.js")}}"></script>

<!-- REVOLUTION ACTIVE JS FILES -->
<script src="{{asset("web/js/revolution.js")}}"></script>


</body>

</html>
