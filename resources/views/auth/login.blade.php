@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Cart Area -->
        <div class="page-content-inner enable-full-width pb--50">

            <div class="container dashboard-area">
                <div class="row justify-content-center">

                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            <h3 class="sub-title"><span>Welcome, Please Login</span></h3>


                            <form class="form pb-4" method="POST" action="{{ route('login') }}" id="address-add-form">
                                @csrf
                                <div class="form__group mb--20">
                                    <input id="email" type="email" class="form__input form__input--2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form__group mb--20">
                                    <input id="password" type="password" placeholder="password" class="form__input form__input--2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form__group mb--20">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form__group row align-items-center">
                                    <div class="col-auto">
                                        <input type="hidden" name="login_from" value="default-login">
                                        <button type="submit" class="btn btn-style-3">Login</button>
                                    </div>
                                    <div class="col-auto">
                                        <div class="small-button-panel no-bg line-divider">
                                            <a href="{{route("register")}}" class="table-link"><i class="fas fa-file-signature"></i>I am New</a>

                                            @if (Route::has('password.request'))
                                                <a class="table-link" href="{{ route('password.request') }}">
                                                    <i class="far fa-question-circle"></i>I Need Help
                                                </a>
                                            @endif
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
