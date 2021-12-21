@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container dashboard-area">
                <div class="row justify-content-center">

                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            <h3 class="sub-title"><span>Welcome, Register an account</span></h3>
                            <p>Get to manage your Orders, get special discounts and offers and much more..</p>
                            <form class="form pt-4" method="POST" action="{{ route('register') }}" id="address-add-form">
                                @csrf
                                <div class="form__group mb--20">
                                    <input id="name" type="text" placeholder="Full Name" class="form__input form__input--2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form__group mb--20">
                                    <input id="email" placeholder="Email Address" type="email" class="form__input form__input--2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="mobile" name="mobile"
                                           class="form__input form__input--2 callnoinput" value="{{ old('mobile') }}" placeholder="Mobile Numbers">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form__group mb--20">
                                    <input id="password" placeholder="Set a Strong Password" type="password" class="form__input form__input--2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form__group mb--20 row">
                                    <div class="password-confirm col-auto">
                                        <input type="checkbox" value="confirmpass" name="confirmpass" id="confirmpass">
                                        <label class="newsletter-sub-label" for="confirmpass">
                                            I confirm, all my info are accurate & I have read the <a href="{{route('terms-and-conditions')}}">Terms and Conditions</a>.
                                        </label>
                                    </div>

                                </div>
                                <div class="form__group row align-items-center">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-style-3">Register</button>
                                    </div>
                                    <div class="col-auto">
                                        <div class="small-button-panel no-bg line-divider">
                                            <a href="{{route("login")}}" class="table-link"><i class="fas fa-sign-in-alt"></i>I have an Account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Area End Here -->



        <!-- Promo Area Start -->

        @include('website.account.component.banner-section')

    </div>
@endsection
