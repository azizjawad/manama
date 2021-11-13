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
                            <h3 class="sub-title"><span>My Address</span></h3>
                            <p>Manage your delivery and billing address here</p>
                            <!-- <div class="small-button-panel titlebutton">
                            <a href="javascript:void(0);"class="table-link" data-bs-toggle="modal" data-bs-target="#addwindow"><i class="fas fa-plus-circle"></i>Address</a>
                            </div>		 -->
                            <div class="address-single">
                                <h2>Home Address</h2>
                                <p><b>John Doe Smith</b></p>
                                <p>P.O. Box 1234,Chesterfield<br>
                                    Maharashtra, Mumbai<br>
                                    Pincode : 400001</p>
                                <p>Mobile : +91 - 9876543210</p>
                                <div class="small-button-panel">
                                    <a href="javascript:void(0);"class="table-link"><i class="far fa-trash-alt"></i>Delete</a>
                                </div>
                            </div>
                            <div class="address-single">
                                <h2>Home Address</h2>
                                <p><b>John Doe Smith</b></p>
                                <p>P.O. Box 1234,Chesterfield<br>
                                    Maharashtra, Mumbai<br>
                                    Pincode : 400001</p>
                                <p>Mobile : +91 - 9876543210</p>
                                <div class="small-button-panel">
                                    <a href="javascript:void(0);"class="table-link"><i class="far fa-trash-alt"></i>Delete</a>
                                </div>
                            </div>
                            <div class="small-button-panel titlebutton">
                                <a href="javascript:void(0);"class="table-link" data-bs-toggle="modal" data-bs-target="#addwindow"><i class="fas fa-plus-circle"></i>Address</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
    <!-- Address Modal Start -->

    <div class="modal fade product-modal" id="addwindow" aria-hidden="true" aria-labelledby="addwindowLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addwindowLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid pb--40">
                        <div class="row">
                            <form class="form" action="post" id="address-add-form">
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="contact_name"
                                           class="form__input form__input--2" placeholder="Address Label">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="contact_name"
                                           class="form__input form__input--2" placeholder="Full Name">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_phone" name="contact_phone"
                                           class="form__input form__input--2 callnoinput" placeholder="Alt. Mobile No.">
                                </div>
                                <div class="form__group mb--20">
                                    <textarea class="form__input form__input--textarea" id="contact_message"
                                              name="contact_message" placeholder="Full Address*"></textarea>
                                </div>
                                <div class="form__group mb--20">
                                    <select id="state" class="form__input form__input--2" name="state" placeholder="Select State">
                                        <option>Select State</option>
                                    </select>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="contact_name"
                                           class="form__input form__input--2" placeholder="City/Town/Village">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="contact_name"
                                           class="form__input form__input--2" placeholder="Pincode">
                                </div>
                                <div class="form__group">
                                    <button type="submit" class="btn btn-fullwidth btn-style-1">Save Address</button>
                                </div>
                                <div class="form__output"></div>
                            </form>


                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <!-- Address  Modal End -->
@endsection
