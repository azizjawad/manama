@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

    @include("website.account.component.account-header")

    <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container dashboard-area">
                <div class="row justify-content-center">
                    @include("website.account.component.account-dashboard-links")
                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            <h3 class="sub-title"><span>Other Settings</span></h3>
                            <p>Receive Newsletter Subscription </p>
                            <form class="form" action="post" id="address-add-form">
                                <div class="form__group mb--20 row">
                                    <div class="newsletter-radio col-auto">
                                        <input type="radio" value="yes" name="newsletter-sub" id="yes">
                                        <label class="newsletter-sub-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="newsletter-radio col-auto">
                                        <input type="radio" value="no" name="newsletter-sub" id="no">
                                        <label class="newsletter-sub-label" for="no">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form__group">
                                    <button type="submit" class="btn btn-style-3">Save Settings</button>
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
