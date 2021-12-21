@extends('layouts.main')

@section('content')
    @php $total = 0 @endphp
    <div id="content" class="main-content-wrapper">

        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Checkout</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('my-account')}}">My Accoount</a></li>
                            <li><a href="{{route('checkout')}}">Checkout</a></li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-shopping-bag"></i>Confirm your address & continue to pay.</h3>
                    </div>
                </div>
            </div>
        </section>


        <!-- Cart Area -->

        <div class="page-content-inner enable-full-width pb--50">

            <div class="container">
                <div class="row pt--80 pt-md--60 pt-sm--40">
                    <div class="col-12">

                        <div class="message-box coupon-added mb--30 mb-sm--20">
                            <p><i class="fa fa-check-circle"></i> Coupon Code MANAMANEW Applied! You got a <i class="fas fa-rupee-sign" aria-hidden="true"></i>100 discount on order. <a class="expand-btn"
                                                                                                                                                                                         href="javascript:void(0);">Click Here To Remove It.</a></p>
                        </div>

                        <!-- Add Coupon - incase if coupon was not added at Cart -->
                        <div class="user-actions user-actions__coupon">
                            <div class="message-box mb--30 mb-sm--20">
                                <p><i class="fa fa-exclamation-circle"></i> Have A Coupon? <a class="expand-btn"
                                                                                              href="#coupon_info">Click Here To Enter Your Code.</a></p>
                            </div>
                            <div id="coupon_info" class="user-actions__form hide-in-default">
                                <form action="#" class="form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <div class="form__group d-sm-flex">
                                        <input type="text" name="coupon" id="coupon"
                                               class="form__input form__input--2 mr--20 mr-xs--0"
                                               placeholder="Coupon Code">
                                        <button type="submit" class="btn btn-medium btn-style-1">Apply
                                            Coupon</button>
                                    </div>
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
                            <div class="address-box"  id="all-addresses">
                                <!-- Each Address -->
                                <h6 class="address-label"><input addressid="15" class="address-selected" name="address" type="radio"><span>Home
											Address</span></h6>
                                <div class="address-body">
                                    <p>Address: <span class="block">John Doe Smith<br>P.O.
											Box 1234, Chesterfield</span></p>
                                    <p><span>New York :</span>23456</p>
                                    <p>Country: <span>United States</span></p>
                                    <p>Mobile Number: <span>+91-9800000000</span></p>
                                </div>
                                <!-- Each Address -->
                                <h6 class="address-label"><input addressid="15" class="address-selected" name="address" type="radio"><span>Office
											Address</span></h6>
                                <div class="address-body">
                                    <p>Address: <span class="block">John Doe Smith<br>P.O.
											Box 1234, Chesterfield</span></p>
                                    <p><span>New York :</span>23456</p>
                                    <p>Country: <span>United States</span></p>
                                    <p>Mobile Number: <span>+91-9800000000</span></p>
                                </div>
                            </div>

                            <label class="checkboxLarge ship-to-address"><input type="checkbox" id="showaddress"><b>Ship
                                    to a Different address</b></label>

                            <div class="show-more-address" id="show-more-address">
                                <div class="address-box">
                                    <!-- Each Address -->
                                    <h6 class="address-label"><input addressid="15" class="address-selected" name="other-address" type="radio"><span>Home
											Address</span></h6>
                                    <div class="address-body">
                                        <p>Address: <span class="block">John Doe Smith<br>P.O.
											Box 1234, Chesterfield</span></p>
                                        <p><span>New York :</span>23456</p>
                                        <p>Country: <span>United States</span></p>
                                        <p>Mobile Number: <span>+91-9800000000</span></p>
                                    </div>
                                    <!-- Each Address -->
                                    <h6 class="address-label"><input addressid="15" class="address-selected" name="other-address" type="radio"><span>Office
											Address</span></h6>
                                    <div class="address-body">
                                        <p>Address: <span class="block">John Doe Smith<br>P.O.
											Box 1234, Chesterfield</span></p>
                                        <p><span>New York :</span>23456</p>
                                        <p>Country: <span>United States</span></p>
                                        <p>Mobile Number: <span>+91-9800000000</span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Address Buttone -->
                            <button type="button" class="btn btn-style-3" data-bs-toggle="modal" data-bs-target="#addwindow">Add Address</button>

                        </div>

                        <h3 class="sub-title"><span>Quote your GSTN (optional)</span></h3>
                        <!-- Addreess Selection-->
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <form class="form gstn-tab" action="post" id="gst-form">
                                    <div class="form__group">
                                        <input type="text" id="contact_name" name="contact_name"
                                               class="form__input form__input--2" placeholder="Your GSTN">
                                    </div>
                                    <div class="form__group has-button">
                                        <button type="button" class="btn btn-style-3">Apply</button>
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
                                    @foreach($cart as $item)
                                        <tr>
                                            <th>{{$item->product_name}}
                                                <strong><span>x</span>{{$item->quantity}}</strong>
                                            </th>
                                            <td class="text-end"><i class="fas fa-rupee-sign" aria-hidden="true"></i>{{number_format($item->cost_price)}}</td>
                                        </tr>
                                        @php $total += $item->cost_price * $item->quantity @endphp
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td class="text-end"><i class="fas fa-rupee-sign" aria-hidden="true"></i>{{number_format($total,2)}}</td>
                                    </tr>
{{--                                    <tr class="cart-subtotal">--}}
{{--                                        <th>Discount <small>(-)</small></th>--}}
{{--                                        <td class="text-end"><i class="fas fa-rupee-sign" aria-hidden="true"></i>100.00</td>--}}
{{--                                    </tr>--}}
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td class="text-end">
                                            <!-- Show when shipping is free --> <span>Free Shipping!</span>
                                            <!-- Only show if the cart value is lower then free shipping rate
                                              <span><i class="fas fa-rupee-sign" aria-hidden="true"></i>75 per item <i class="fas fa-rupee-sign" aria-hidden="true"></i>150.00</span>

                                             -->
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-end"><span class="order-total-ammount"><i class="fas fa-rupee-sign" aria-hidden="true"></i>2315.00</span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="checkout-payment">
                                <form action="#" class="payment-form">
                                    <div class="payment-group mb--10">
                                        <div class="payment-radio">
                                            <input type="radio" value="payu" name="payment-method" id="payu">
                                            <label class="payment-label" for="payu">Pay via PayU</label>
                                        </div>
                                        <div class="payment-info payu hide-in-default" data-method="payu">
                                            <p>Make Payment via <b>PayU</b></p>
                                        </div>
                                    </div>
                                    <div class="payment-group mb--10">
                                        <div class="payment-radio">
                                            <input type="radio" value="cash" name="payment-method" id="cash">
                                            <label class="payment-label" for="cash">
                                                CASH ON DELIVERY
                                            </label>
                                        </div>
                                        <div class="payment-info cash hide-in-default" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                    <div class="payment-group mt--20">
                                        <p class="mb--15 text-end small">The above bill is inclusive of GST.</p>
                                        <button type="button" class="btn btn-fullwidth btn-style-1" onclick="location.href='{{route('thank-you')}}'">Place
                                            Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Area End -->
                </div>
            </div>

        </div>
        @include("website.account.component.banner-section")
    </div>
@endsection

