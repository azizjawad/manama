@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container dashboard-area">
                <div class="row justify-content-center">

                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            <h3 class="sub-title"><span>Reset Password</span></h3>
                            <p>Please enter your registered email address with us.</p>
                            <form class="form pb-4" method="POST" action="{{ route('password.email') }}" id="address-add-form">
                                @csrf
                                <div class="form__group mb--20">
                                    <input id="email" type="email" placeholder="Email Address" class="form__input form__input--2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form__group mb--20 row">
                                    <div class="password-confirm col-auto">
                                        <input type="checkbox" value="confirmpass" name="confirmpass"
                                               id="confirmpass">
                                        <label class="newsletter-sub-label" for="confirmpass">
                                            I confirm, I want to reset my password.
                                        </label>
                                    </div>

                                </div>
                                <div class="form__group row align-items-center">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-style-3">Send Reset Instructions</button>
                                    </div>
                                    <div class="col-auto">
                                        <div class="small-button-panel no-bg line-divider">
                                            <a href="{{route('register')}}" class="table-link"><i
                                                    class="fas fa-sign-in-alt"></i>I will Login now</a>
                                            <a href="{{route('login')}}" class="table-link"><i
                                                    class="fas fa-file-signature"></i>I am New</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('website.account.component.banner-section')
    </div>
@endsection
