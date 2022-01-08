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

                            <h3 class="sub-title"><span>Edit Profile</span></h3>
                            <p>Please note, you will not be able to change your email address which was used for registration. In case you need help, please contact us.</p>
                            <form class="form" action="{{route('edit-user-profile')}}" method="post" id="address-add-form">
                                @csrf
                                <div class="form__group mb--20">
                                    <input type="text" id="name" name="name"
                                           class="form__input form__input--2" value="{{$user->name}}" placeholder="Full Name">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="email" id="email"
                                           class="form__input form__input--2" value="{{$user->email}}" placeholder="Email Address" disabled>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="phone_no"
                                           class="form__input form__input--2 callnoinput" value="{{$user->mobile}}" placeholder="Mobile Numbers">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="dob" data-toggle="datepicker"
                                           class="form__input form__input--2 " value="{{date('d-m-Y'), strtotime($user->dob)}}" placeholder="Date of Birth" data-date-format="yyy-mm-dd">
                                </div>
{{--                                <div class="form__group mb--20 row">--}}
{{--                                    <div class="password-confirm col-auto">--}}
{{--                                        <input type="checkbox" value="confirmpass" name="confirmpass" id="confirmpass">--}}
{{--                                        <label class="newsletter-sub-label" for="confirmpass">--}}
{{--                                            I confirm, I want to make these changes.--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
                                <div class="form__group">
                                    <button type="submit" class="btn btn-style-3">Save Changes</button>
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

