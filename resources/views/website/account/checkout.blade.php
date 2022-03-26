@extends('layouts.main')

@section('content')
    @php $total = 0; $gst_total = 0; @endphp
    <div id="content" class="main-content-wrapper">

        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Checkout</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('my-account') }}">My Accoount</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-shopping-bag"></i>Confirm your address & continue to pay.
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container">
                <div class="row pt--80 pt-md--60 pt-sm--40">
                    <div class="col-12">
                        @php
                            $couponValidFlag = false;
                            if( isset($discountArray['coupon_code']) && $discountArray['coupon_code'] != '' && (isset($discountArray['invalidCoupon']) && !$discountArray['invalidCoupon']) ){
                                $couponValidFlag = true;
                            }
                        @endphp
                        <div class="message-box coupon-added mb--30 mb-sm--20 "
                             style="{{ $couponValidFlag ? '' : 'display:none' }}">
                            <p>
                                <i class="fa fa-check-circle"></i> Coupon Code
                                {{ $couponValidFlag ? $discountArray['coupon_code'] : '' }}
                                Applied! You got a <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                                {{ isset($discountArray['discount']) && $discountArray['discount'] != '' ? $discountArray['discount'] : '' }}
                                discount on order.
                                <a class="expand-btn" href="javascript:void(0);"
                                   onclick="window.location.href = window.location.origin+'/account/checkout'">Click Here
                                    To Remove It.</a>
                            </p>
                        </div>

                        <!-- Add Coupon - incase if coupon was not added at Cart -->
                        <div class="user-actions user-actions__coupon"
                             style="{{ $couponValidFlag != '' ? 'display:none' : '' }}">
                            <div class="message-box mb--30 mb-sm--20">
                                <p>
                                    <i class="fa fa-exclamation-circle"></i> Have A Coupon?
                                    <a class="expand-btn" href="#coupon_info">Click Here To Enter Your Code.</a>
                                </p>
                            </div>
                            <div id="coupon_info" class="user-actions__form {{ ( isset($discountArray['errorMessage']) && $discountArray['errorMessage'] != '' ) ? '':'hide-in-default' }} ">
                                <form action="/account/checkout" class="form" type="POST" id="coupon_info_form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <div class="form__group d-sm-flex">
                                        <input type="text" name="coupon_code" id="coupon_code"
                                               class="form__input form__input--2 mr--20 mr-xs--0 " placeholder="Coupon Code" >

                                        <button type="button" onClick="validateCouponCode()" class="btn btn-medium btn-style-1 btn_coupon_code">Apply Coupon</button>
                                    </div>
                                    <span class="coupon_code_error"  style="display:none; color: red">Coupon Code is required</span>
                                    @if ( isset($discountArray['invalidCoupon']) && $discountArray['invalidCoupon']  )
                                        <span class="coupon_code_valid"  style=" color: red">Coupon Code is inValid</span>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt--40 pb--80">
                    <!-- Checkout Area Start -->
                    <div class="col-lg-6">
                        <h3 class="sub-title"><span>Billing Details</span></h3>
                        <!-- Addreess Selection-->
                        <div class="address-section">
                            <div class="address-box" id="all-addresses">
                                <!-- Each Address -->
                                @foreach ($my_address_list as $key => $address)
                                    <h6 class="address-label">
                                        <input addressid="{{ $address->id }}" value="{{ $address->id }}"
                                               class="address-selected" name="billing_address" id="billing_address"
                                               type="radio"><span>{{ $address->label }}</span>
                                    </h6>
                                    <div class="address-body">
                                        <p>Address:
                                            <span class="block">
                                                {{ $address->fullname }}<br>
                                                {{ $address->address }}
                                            </span>
                                        </p>
                                        <p><span>{{ $address->city_village }}</span> {{ $address->pincode }}</p>
                                        <p>State: <span>{{ $address->state }}</span></p>
                                        <p>Mobile Number: <span>{{ $address->mobile_no }}</span></p>
                                    </div>
                                @endforeach
                            </div>

                            <label class="checkboxLarge ship-to-address">
                                <input type="checkbox" id="showaddress"><b>Ship to a Different address</b></label>

                            <div class="show-more-address" id="show-more-address">
                                <div class="address-box">
                                    @foreach ($my_address_list as $key => $address)
                                        <h6 class="address-label">
                                            <input shipping_address="{{ $address->id }}" value="{{ $address->id }}"
                                                   class="address-selected" name="shipping_address" id="shipping_address"
                                                   type="radio"><span>{{ $address->label }}</span>
                                        </h6>
                                        <div class="address-body">
                                            <p>Address:
                                                <span class="block">
                                                    {{ $address->fullname }}<br>
                                                    {{ $address->address }}
                                                </span>
                                            </p>
                                            <p><span>{{ $address->city_village }}</span> {{ $address->pincode }}</p>
                                            <p>State: <span>{{ $address->state }}</span></p>
                                            <p>Mobile Number: <span>{{ $address->mobile_no }}</span></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Add Address Buttone -->
                            <button type="button" class="btn btn-style-3" data-bs-toggle="modal"
                                    data-bs-target="#addwindow">Add Address</button>
                        </div>

                        <h3 class="sub-title"><span>Quote your GSTN (optional)</span></h3>
                        <!-- Addreess Selection-->
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <form class="form gstn-tab" method="post" action="{{route('checkout')}}" id="gst-form">
                                    @csrf
                                    <div class="form__group">
                                        <input type="text" id="gstn_no" value="{{$gst_number}}" required name="gstn_no" class="form__input form__input--2" placeholder="Your GSTN">
                                    </div>
                                    <div class="form__group has-button">
                                        <button type="submit" class="btn btn-style-3">Apply</button>
                                    </div>
                                    <div class="form__output"></div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                        <h3 class="sub-title"><span>Bill Summary</span></h3>
                        <!-- Bill Summary -->
                        <div class="order-details">
                            <div class="table-content table-responsive mb--30">
                                <table class="table order-table order-table-2">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cart as $item)
                                        <tr>
                                            <th>{{ $item->product_name }}
                                                <strong><span>x</span>{{ $item->quantity }}</strong>
                                            </th>
                                            <td class="text-end">
                                                <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                                                {{ number_format($item->cost_price) }}
                                            </td>
                                        </tr>
                                        @php
                                            $total += $item->cost_price * $item->quantity;
                                            $gst_total += (($item->cost_price * $item->quantity) * $item->gst_rate / 100)
                                        @endphp
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td class="text-end">
                                            <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                                            {{ number_format($total - $gst_total, 2) }}
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>GST Taxes</th>
                                        <td class="text-end">
                                            <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                                            {{ number_format($gst_total, 2) }}
                                        </td>
                                    </tr>
                                    @php
                                        $discount_rate =  Helpers::volume_discount_check($total);
                                        $discount_total = $total * $discount_rate / 100;
                                        $coupon_discount = $discountArray['discount'];
                                        if (empty($discountArray['discount'])){
                                            $discountArray['discount'] = $discount_total;
                                        }else if ($discountArray['discount'] > 0){
                                            $discountArray['discount'] = ($discount_total + $discountArray['discount']);

                                        }
                                    @endphp

                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td class="text-end">
                                        @php
                                            if(isset($discountArray['product_type']) && $discountArray['product_type'] == 2 &&  isset($discountArray['discount']) && $discountArray['discount'] == 0 ){
                                                $shippingDetails['shippingCharges'] = 0;
                                            }
                                        @endphp
                                        @if ($shippingDetails['shippingCharges'] == 0)
                                            <!-- Show when shipping is free -->
                                                <span>Free Shipping!</span>
                                        @else
                                            <!-- Only show if the cart value is lower then free shipping rate
                                                -->
                                                <span><i class="fas fa-rupee-sign" aria-hidden="true"></i>{{$shippingDetails['perBottleRate']}} per item <i class="fas fa-rupee-sign" aria-hidden="true"></i>{{number_format($shippingDetails['shippingCharges'])}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($discount_rate > 0)
                                        <tr class="shipping">
                                            <th>Volume Discount</th>
                                            <td class="text-end">
                                                <span><small>(- {{$discount_rate}}%)</small><i class="fas fa-rupee-sign"></i>{{ $discount_total }} <small class="manama-red"></small></span>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (isset($coupon_discount) && $coupon_discount != '')
                                        <tr class="order-discount">
                                            <th>Coupon Discount</th>
                                            <td class="text-end"><span class="order-total-ammount">(-)<i
                                                        class="fas fa-rupee-sign" aria-hidden="true"></i>
                                                        {{ number_format($coupon_discount, 2) }}
                                                    </span>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr class="order-total">
                                        @php
                                            if(isset($discountArray['discountedTotal']) && $discountArray['discountedTotal'] != ''){
                                                $total = $discountArray['discountedTotal'];
                                            }
                                            if($discount_total > 0){
                                                $total = $total - $discount_total;
                                            }
                                            if($shippingDetails['shippingCharges'] > 0){
                                                $total = $total + $shippingDetails['shippingCharges'];
                                            }
                                        @endphp
                                        <th>Order Total</th>
                                        <td class="text-end"><span class="order-total-ammount"><i
                                                    class="fas fa-rupee-sign" aria-hidden="true"></i>
                                                    {{ number_format($total, 2) }}
                                                </span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="checkout-payment">
                                <form action="#" class="payment-form">
                                    <input type="hidden" name="cart_details"
                                           data-coupon_code="{{ isset($discountArray['coupon_code']) && $discountArray['coupon_code'] != '' ? $discountArray['coupon_code'] : '' }}"
                                           data-discount="{{ isset($discountArray['discount']) && $discountArray['discount'] != '' ? $discountArray['discount'] : 0 }}"
                                           data-coupon_type="{{ isset($discountArray['product_type']) && $discountArray['product_type'] != '' ? $discountArray['product_type'] : 0 }}"
                                           data-shipping_charges="{{ $shippingDetails['shippingCharges'] }}"
                                           data-total="{{$total}}">
                                    <div class="payment-group mb--10">
                                        <div class="payment-radio">
                                            <input type="radio" value="online" name="payment-method" id="razorpay">
                                            <label class="payment-label" for="razorpay">Pay via Razorpay</label>
                                        </div>
                                        <div class="payment-info razorpay hide-in-default" data-method="online">
                                            <p>Make Payment via <b>Razorpay</b></p>
                                        </div>
{{--                                        <div class="payment-radio">--}}
{{--                                            <input type="radio" value="payu" name="payment-method" id="payu">--}}
{{--                                            <label class="payment-label" for="payu">Pay via PayU</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="payment-info payu hide-in-default" data-method="payu">--}}
{{--                                            <p>Make Payment via <b>Payu</b></p>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="payment-group mb--10">
{{--                                        <div class="payment-radio">--}}
{{--                                            <input type="radio" value="COD" name="payment-method" id="cash">--}}
{{--                                            <label class="payment-label" for="cash">--}}
{{--                                                CASH ON DELIVERY--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
                                        <div class="payment-info cash hide-in-default" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                    <div class="payment-group mt--20">
                                        <p class="mb--15 text-end small">The above bill is inclusive of GST.</p>
                                        <button type="button" class="btn btn-fullwidth btn-style-1"
                                                id='btn_place_order'>Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Area End -->
                </div>
            </div>

        </div>
        <!-- Address Modal Start -->

        <div class="modal fade product-modal" id="addwindow" aria-hidden="true" aria-labelledby="addwindowLabel"
             tabindex="-1">
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
                                <form class="form" action="{{ route('save-address') }}" method="post"
                                      id="form_my_address" name="form_my_address">
                                    <div class="form__group mb--20">
                                        <input type="text" maxlength="80" id="txt_label" name="txt_label"
                                               class="form__input form__input--2" placeholder="Address Label">
                                    </div>
                                    <div class="form__group mb--20">
                                        <input type="text" maxlength="80" id="txt_fullname" name="txt_fullname"
                                               class="form__input form__input--2" placeholder="Full Name">
                                    </div>
                                    <div class="form__group mb--20">
                                        <input type="number" maxlength="11" minlength="10" id="txt_mobile_no"
                                               name="txt_mobile_no" class="form__input form__input--2 callnoinput"
                                               placeholder="Alt. Mobile No.">
                                    </div>
                                    <div class="form__group mb--20">
                                        <textarea maxlength="250" class="form__input form__input--textarea"
                                                  id="txt_address" name="txt_address" placeholder="Full Address*"></textarea>
                                    </div>
                                    <div class="form__group mb--20">
                                        <select id="state" class="form__input form__input--2" name="state"
                                                placeholder="Select State">
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
                                        <input type="text" maxlength="50" id="txt_city_village" name="txt_city_village"
                                               class="form__input form__input--2" placeholder="City/Town/Village">
                                    </div>
                                    <div class="form__group mb--20">
                                        <input type="number" maxlength="6" id="txt_pincode" name="txt_pincode"
                                               class="form__input form__input--2" placeholder="Pincode">
                                    </div>
                                    <div class="form__group">
                                        <button type="submit" id="btn_submit" name="btn_submit"
                                                class="btn btn-fullwidth btn-style-1">Save Address</button>
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
        @include("website.account.component.banner-section")
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        @php $user = Auth::user() @endphp
        var options = {
            "key": "{{env('RAZORPAY_KEY')}}", // Enter the Key ID generated from the Dashboard
            "amount": '{{$total * 100}}', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Manama",
            "description": "Manama Sales",
            "handler": function (response){
                console.log(response);
                if (typeof response.razorpay_payment_id != 'undefined') {
                    place_order(response.razorpay_payment_id);
                }
            },
            "prefill": {
                "name": "{{$user->name}}",
                "email": "{{$user->email}}",
                "contact": "{{$user->mobile}}"
            },
            "theme": {
                "color": "#264698"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('btn_place_order').onclick = function(e){
            let billing_address = $('input[name="billing_address"]').is(':checked');
            if(billing_address) {
                if ($('input[name="payment-method"]:checked').val() === 'online') {
                    let button = $('#btn_place_order');
                    // button.attr('disabled',true).text('Please wait..');
                    rzp1.open();
                    e.preventDefault();
                }else{
                    place_order();
                }
            } else {
                error_notification('Please select shipping address');
            }
        }

        function validateCouponCode(){
            $('.coupon_code_error').hide();
            if($('#coupon_code').val() == ''){
                $('.coupon_code_error').show();
                $('.coupon_code_valid').hide();
                return false;
            }
            $('#coupon_info_form').submit();
        }

        function place_order(transaction_id){
            let button = $('#btn_place_order');
            let payment_method = $('input[name="payment-method"]:checked').val();
            const coupon_code = $('input[name="cart_details"]').attr('data-coupon_code');
            const discount = $('input[name="cart_details"]').attr('data-discount');
            const shipping_charges = $('input[name="cart_details"]').attr('data-shipping_charges');
            const coupon_type = $('input[name="cart_details"]').attr('data-coupon_type');
            const total = $('input[name="cart_details"]').attr('data-total');
            let shipping = $('input[name="billing_address"]:checked').val();
            if($('#showaddress:checked').length > 0){
                shipping = $('#shipping_address:checked').val();
            }
            $.ajax({
                url: '{{route('place-order')}}',
                data: {
                    'billing_address' : $('input[name="billing_address"]:checked').val(),
                    'shipping_address' : shipping,
                    'gstn_no' : $('#gstn_no').val(),
                    'transaction_type' : payment_method,
                    'coupon_code' : coupon_code,
                    'discount' : discount,
                    'shipping_charges' : shipping_charges,
                    'coupon_type' : coupon_type,
                    'total' : total,
                    "transaction_id": transaction_id
                },
                type:"post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: () => {
                    button.attr('disabled',true).text('Please wait..');
                },
                success: (res) => {
                    button.attr('disabled', false).text('Place Order');
                    if(res.status === true) {
                        window.location.href = 'thank-you';
                        success_notification(res.message);
                    }
                },
                error: (res) => {
                    button.attr('disabled', false).text('Place Order');
                    error_notification()
                }
            });
        }
    </script>
@endsection
