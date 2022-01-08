<!doctype html>
<html lang="en">
<head>
    <title>Manama eCommerce Admin</title>
    <!-- Basic metas -->
    <!-- =================================================================================================== -->
    <meta charset="utf-8" />
    <meta name="description" content />
    <meta name="keywords" content />
    <meta name="author" content />
    <!-- Mobile metas -->
    <!-- =================================================================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="mobile-web-app-capable" content="yes" />
    <!-- Favicons -->
    <!-- =================================================================================================== -->
    <link rel="shortcut icon" href="{{asset('img/faviconss/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('img/faviconss/apple-touch-icon.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/faviconss/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/faviconss/apple-touch-icon-114x114.png')}}" />

    <!-- Windows tiles -->
    <!-- =================================================================================================== -->
    <meta name="application-name" content="Manama eCommerce Admin" />
    <meta name="msapplication-TileColor" content="#FFF" />
    <meta name="msapplication-square70x70logo" content="{{asset('img/faviconss/msapplication-tiny.png')}}" />
    <meta name="msapplication-square150x150logo" content="{{asset('img/faviconss/msapplication-square.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile browser coloring -->
    <!-- =================================================================================================== -->

    <meta name="theme-color" content="#952724" />
    <meta name="msapplication-navbutton-color" content="#952724" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#952724" />
    <!-- CSS -->
    <!-- =================================================================================================== -->

    <link rel="stylesheet" href="{{asset('font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('font/line-awesome-1.3.0/css/line-awesome.min.css')}}" />

    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/glide.core.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-clockpicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/jquery-clockpicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/baguetteBox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/intlTelInput.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
    <script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
</head>

<body id="app-container" class="menu-default show-spinner">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>
        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>
    </div>


    <a class="navbar-logo" href="{{Route('admin-dashboard')}}">
        <span class="logo d-none d-xs-block"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            <div class="d-none d-md-inline-block align-text-bottom mr-3">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                     data-toggle="tooltip" data-placement="left" title="Dark Mode">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                    <label class="custom-switch-btn" for="switchDark"></label>
                </div>
            </div>
            <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>
        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                @php $user = auth()->user(); @endphp
                <span class="name">{{$user->name}}</span>
                @if(!empty($user->image))
                    <span><img alt="Profile Picture" src="{{asset('/images/my-account/'. $user->image)}}" /></span>
                @else
                    <span><img alt="Profile Picture" src="{{asset('img/profiles/l-1.jpg')}}" /></span>
                @endif
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{route('admin-account')}}">Account</a>
                <a class="dropdown-item" href="{{ Route('admin-logout') }}">Sign out</a>
            </div>
        </div>
    </div>
</nav>

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li>
                    <a href="{{Route('admin-dashboard')}}">
                        <i class="iconsminds-monitor"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('admin-order') }}">
                        <i class="iconsminds-basket-coins"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="#products">
                        <i class="iconsminds-record"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="#customers">
                        <i class="iconsminds-male-female"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="#reviews">
                        <i class="iconsminds-speach-bubble"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="#ecom-management">
                        <i class="iconsminds-tag"></i>
                        <span>eCommerce Management</span>
                    </a>
                </li>
                <li>
                    <a href="#cms-management">
                        <i class="iconsminds-equalizer"></i>
                        <span>CMS Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="products">
                <li>
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#manageCategory" aria-expanded="true"
                       aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Manage Category</span>
                    </a>
                    <div id="manageCategory" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('admin-category-add')}}">
                                    <i class="simple-icon-plus"></i> <span class="d-inline-block">Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-category-list')}}">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">View List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-category-image')}}">
                                    <i class="simple-icon-picture"></i> <span class="d-inline-block">Cat. Image</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#manageProducts" aria-expanded="true"
                       aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Manage Products</span>
                    </a>
                    <div id="manageProducts" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('admin-product-add')}}">
                                    <i class="simple-icon-plus"></i> <span class="d-inline-block">Add New</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-product-list')}}">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">View List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-product-bestseller-page')}}">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">Bestsellers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#mediaGallery" aria-expanded="true"
                       aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Product Settings</span>
                    </a>
                    <div id="mediaGallery" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('admin-product-price')}}">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">Price List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-product-gallery')}}">
                                    <i class="simple-icon-picture"></i> <span class="d-inline-block">Product Gallery</span>
                                </a>
                            </li>
{{--                            <div id="manageProductsSecurity" class="collapse show">--}}
{{--                                <ul class="list-unstyled inner-level-menu">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{Route('admin-product-visibility')}}">--}}
{{--                                            <i class="simple-icon-eye"></i> <span class="d-inline-block">Product Visibility</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="customers">
                <li>
                    <a href="{{Route('admin-customer-manage')}}">
                        <i class="simple-icon-eye"></i> <span class="d-inline-block">Manage Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-customer-summary')}}">
                        <i class="simple-icon-list"></i> <span class="d-inline-block">Customer Summary</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-customer-wishlist')}}">
                        <i class="simple-icon-heart"></i> <span class="d-inline-block">Customer Wishlist</span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="reviews">
                <li>
                    <a href="{{Route('admin-new-reviews')}}">
                        <i class="simple-icon-speech"></i> <span class="d-inline-block">New Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-moderated-reviews')}}">
                        <i class="simple-icon-list"></i> <span class="d-inline-block">Moderated Reviews</span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="ecom-management">
                <li>
                    <a href="{{Route('admin-discount-manager')}}">
                        <i class="simple-icon-tag"></i> <span class="d-inline-block">Discount Manager</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-shipping-manager')}}">
                        <i class="simple-icon-handbag"></i> <span class="d-inline-block">Shipping Manager</span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="cms-management">
                <li>
                    <a href="{{Route('admin-home-banner')}}">
                        <i class="simple-icon-screen-desktop"></i> <span class="d-inline-block">Homepage Banners</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-advertisement')}}">
                        <i class="simple-icon-star"></i> <span class="d-inline-block">Home Ad Popup</span>
                    </a>
                </li>
                <li>
                    <a href="{{Route('admin-recipes')}}">
                        <i class="simple-icon-cup"></i> <span class="d-inline-block">Recipes Page CMS</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#manageNews" aria-expanded="true"
                       aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Manage News & Events</span>
                    </a>
                    <div id="manageProducts" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('admin-news-events')}}">
                                    <i class="simple-icon-plus"></i> <span class="d-inline-block">News & Events List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('admin-news-events-list')}}">
                                    <i class="simple-icon-list"></i> <span class="d-inline-block">N & E Gallery</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{Route('admin-meta')}}">
                        <i class="simple-icon-link"></i> <span class="d-inline-block">Static Pages Meta Tags</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<main>
    <div class="container-fluid">
        @yield('content')
    </div>
</main>

<footer class="page-footer">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <p class="mb-0 text-center text-md-left">Licensed to Manama Toppings</p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="mb-0 text-center text-md-center">Version 2.01B</p>
                </div>
                <div class="col-sm-4">
                    <p class="mb-0 text-center text-md-right">NZr Admin <i class="iconsminds-copyright"></i>2021</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script src="{{asset('js/vendor/jquery.validate/jquery.validate.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/vendor/Chart.bundle.min.js')}}"></script>
<script src="{{asset('js/vendor/chartjs-plugin-datalabels.js')}}"></script>

<script src="{{asset('js/vendor/moment.min.js')}}"></script>
<script src="{{asset('js/vendor/countdown.min.js')}}"></script>
<script src="{{asset('js/vendor/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/vendor/glide.min.js')}}"></script>
<script src="{{asset('js/vendor/progressbar.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery.barrating.min.js')}}"></script>
<script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
<script src="{{asset('js/vendor/select2.full.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-clockpicker.min.js')}}"></script>
{{--<script src="{{asset('js/vendor/bootstrap-tagsinput.min.js')}}"></script>--}}
<script src="{{asset('js/vendor/Sortable.js')}}"></script>
<script src="{{asset('js/vendor/mousetrap.min.js')}}"></script>
<script src="{{asset('js/vendor/baguetteBox.min.js')}}"></script>
<script src="{{asset('js/vendor/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('js/nzradmin.script.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
