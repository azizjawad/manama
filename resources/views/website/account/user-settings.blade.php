@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

    @include("website.account.component.account-header")

    <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container dashboard-area">
                <div class="row justify-content-center">
                    @include("website.account.component.account-dashboard-links")
                    @php $user = Auth::user() @endphp
                    <div class="col-md-6 col-12">
                        <div class="dashboard-tab">
                            <h3 class="sub-title"><span>Other Settings</span></h3>
                            <p>Receive Newsletter Subscription </p>
                            <form class="form" action="{{route('save-user-setting')}}" method="post" id="address-add-form">
                                @csrf
                                <div class="form__group mb--20 row">
                                    <div class="newsletter-radio col-auto">
                                        <input type="radio" {{($user->is_newsletter_subscribed == 1) ? "checked" : ""}} value="1" name="newsletter" id="yes">
                                        <label class="newsletter-sub-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="newsletter-radio col-auto">
                                        <input {{($user->is_newsletter_subscribed == 0) ? "checked" : ""}} type="radio" value="0" name="newsletter" id="no">
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
        </div>
        <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>

@endsection
