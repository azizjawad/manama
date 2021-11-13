@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

    @include("website.account.component.account-header")

    <!-- Cart Area -->
        <div class="page-content-inner enable-full-width pb--50">
            <div class="container dashboard-area">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            @include('website.account.component.back-to-dashboard')
                            <h3 class="sub-title"><span>Change Password</span></h3>
                            <p>Please note, password instructions will be sent on the registered email. Please only toggle the button below if you wish to reset the password now.</p>
                            <form class="form" action="post" id="address-add-form">
                                <div class="form__group mb--20 row">
                                    <div class="password-confirm col-auto">
                                        <input type="checkbox" value="confirmpass" name="confirmpass" id="confirmpass">
                                        <label class="newsletter-sub-label" for="confirmpass">
                                            I confirm, I want to reset my password.
                                        </label>
                                    </div>

                                </div>
                                <div class="form__group">
                                    <button type="button" class="btn btn-style-3"  onclick="location.href='set-new-password.html'">Send Reset Instructions</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>           <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
@endsection

