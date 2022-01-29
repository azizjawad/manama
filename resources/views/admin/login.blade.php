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
    <base href="/">
    <!-- Favicons -->
    <!-- =================================================================================================== -->
    <link rel="shortcut icon" href="img/favicons/favicon.png" />
    <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png" />

    <!-- Windows tiles -->
    <!-- =================================================================================================== -->
    <meta name="application-name" content="Manama eCommerce Admin" />
    <meta name="msapplication-TileColor" content="#FFF" />
    <meta name="msapplication-square70x70logo" content="img/favicons/msapplication-tiny.png" />
    <meta name="msapplication-square150x150logo" content="img/favicons/msapplication-square.png" />

    <!-- Mobile browser coloring -->
    <!-- =================================================================================================== -->

    <meta name="theme-color" content="#952724" />
    <meta name="msapplication-navbutton-color" content="#952724" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#952724" />
    <!-- CSS -->
    <!-- =================================================================================================== -->

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="font/line-awesome-1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body id="app-container" class="menu-default background show-spinner no-footer">
<div class="fixed-background"></div>
<div class="color-switch">
    <label class="switch" for="switchDark">
        <input type="checkbox" id="switchDark" checked>
        <span class="slider round" data-toggle="tooltip" data-placement="left" title="Dark Mode"></span>
    </label>
</div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class="text-white h2">Manama eCommerce Admin</p>

                        <p class="white mb-0">
                            Please use your credentials to login.
                        </p>
                    </div>
                    <div class="form-side">

                        <a href="Dashboard.Ecommerce.html">
                            <span class="logo-single"></span>
                        </a>
                        <h6 class="mb-4">Login</h6>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-group has-float-label mb-0">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span>{{ __('E-Mail Address') }}</span>
                                </label>
                                @error('email')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-group has-float-label mb-0">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <span>{{ __('Password') }}</span>
                                </label>
                                @error('password')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="hidden" name="login_from" value="admin-login">
                                <button class="btn btn-secondary btn-lg btn-shadow" type="submit">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/Chart.bundle.min.js"></script>
<script src="js/vendor/chartjs-plugin-datalabels.js"></script>
<script src="js/vendor/moment.min.js"></script>
<script src="js/vendor/fullcalendar.min.js"></script>
<script src="js/vendor/datatables.min.js"></script>
<script src="js/vendor/perfect-scrollbar.min.js"></script>
<script src="js/vendor/progressbar.min.js"></script>
<script src="js/vendor/jquery.barrating.min.js"></script>
<script src="js/vendor/select2.full.js"></script>
<script src="js/vendor/nouislider.min.js"></script>
<script src="js/vendor/bootstrap-datepicker.js"></script>
<script src="js/vendor/bootstrap-clockpicker.min.js"></script>
<script src="js/vendor/jquery-clockpicker.min.js"></script>
<script src="js/vendor/bootstrap-tagsinput.min.js"></script>
<script src="js/vendor/Sortable.js"></script>
<script src="js/vendor/mousetrap.min.js"></script>
<script src="js/vendor/glide.min.js"></script>
<script src="js/nzradmin.script.js"></script>
<script src="js/scripts.js"></script>
</body>

</html>
