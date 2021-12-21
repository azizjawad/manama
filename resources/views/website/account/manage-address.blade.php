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
                            @foreach($my_address_list as $key => $address)
                                <div class="address-single divClass_{{$address->id}} ">
                                    <h2>{{$address->label}}</h2>
                                    <p><b>{{$address->fullname}}</b></p>
                                    <p>{{$address->address}} <br>{{$address->city_village}} <br>{{$address->pincode}} <br>{{$address->state}}</p>
                                    <p>Mobile : +91 - {{$address->mobile_no}}</p>
                                    <div class="small-button-panel">
                                        <a href="javascript:void(0);" data-rowID="{{$address->id}}" class="table-link deleteAddress">
                                            <i class="far fa-trash-alt"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        
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
                            <form class="form" action="{{route('save-address')}}" method="post" id="form_my_address" name="form_my_address">
                                <div class="form__group mb--20">
                                    <input type="text" maxlength="80" id="txt_label" name="txt_label" class="form__input form__input--2" placeholder="Address Label">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" maxlength="80" id="txt_fullname" name="txt_fullname" class="form__input form__input--2" placeholder="Full Name">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="number" maxlength="11" minlength="10" id="txt_mobile_no" name="txt_mobile_no" class="form__input form__input--2 callnoinput" placeholder="Alt. Mobile No.">
                                </div>
                                <div class="form__group mb--20">
                                    <textarea maxlength="250" class="form__input form__input--textarea" id="txt_address" name="txt_address" placeholder="Full Address*"></textarea>
                                </div>
                                <div class="form__group mb--20">
                                    <select id="state" class="form__input form__input--2" name="state" placeholder="Select State">
                                        <option>Select State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" maxlength="50" id="txt_city_village" name="txt_city_village" class="form__input form__input--2" placeholder="City/Town/Village">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="number" maxlength="6" id="txt_pincode" name="txt_pincode" class="form__input form__input--2" placeholder="Pincode">
                                </div>
                                <div class="form__group">
                                    <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-fullwidth btn-style-1">Save Address</button>
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
