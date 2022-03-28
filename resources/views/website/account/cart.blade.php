@extends('layouts.main')

@section('content')
    @php $total = 0 @endphp
    <div id="content" class="main-content-wrapper">

        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Review your Order</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('my-account')}}">My Accoount</a></li>
                            <li>My Cart</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-clipboard-check"></i>Please verify your purchase
                            before continuing on.</h3>
                    </div>
                </div>
            </div>
        </section>
        @if(count($cart))
            <div class="page-content-inner enable-full-width pb--50">
            <div class="container">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h4>{{$errors->first()}}</h4>
                    </div>
                @endif
                <div class="row pt--80 pb--80 justify-content-center">
                    <div class="col-md-8 col-12 ">
                        <form class="cart-form" method="post" action="{{route('update_quantity')}}">
                            @csrf
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th class="text-start" colspan="3">Product</th>
                                                <th>quantity</th>
                                                <th>total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cart as $item)
                                                <tr>
                                                    <td class="product-remove text-start">
                                                        <a class="delete_item" data-delete_url="/api/cart/delete" data-page="1" data-delete_id="{{$item->cart_id}}" href="javascript:void(0)">
                                                            <i class="dl-icon-close"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-thumbnail text-start">
                                                        <img src="{{asset("images/uploads/products/$item->image")}}"
                                                             alt="{{$item->product_name}}">
                                                    </td>
                                                    <td class="product-name text-start wide-column">
                                                        <h3>
                                                            {{$item->product_name}} <small>{{$item->packaging_type .' '. $item->packaging_weight}}
                                                                <br>
                                                                MRP - <i class="fas fa-rupee-sign"></i>{{number_format($item->cost_price)}}
                                                            </small>
                                                        </h3>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input" name="qty[{{$item->cart_id}}]" id="qty-1" value="{{$item->quantity}}" min="1">
                                                        </div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money">
                                                                <strong><i class="fas fa-rupee-sign"></i>{{number_format($item->cost_price * $item->quantity,2)}}</strong>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @php $total += $item->cost_price * $item->quantity @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 border-top pt--20 mt--20">
                                 <div class="col-sm-6">
{{--                                    <div class="coupon">--}}
{{--                                        <input type="text" name="coupon_code" id="coupon_code" class="cart-form__input" placeholder="Coupon Code">--}}
{{--                                        <button type="button" id="btn_apply_coupon" name="btn_apply_coupon" class="cart-form__btn btn_apply_coupon">Apply Coupon</button>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <input type="submit" name="update_cart" value="Update Cart" class="cart-form__btn"/>
                                    <input type="submit" name="clear_cart" class="cart-form__btn" value="Clear Cart" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="cart-collaterals">
                            <div class="cart-totals">
                                <h3 class="sub-title"><span>Cart Total</span></h3>
                                <div class="table-content table-responsive">
                                    <table class="table order-table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td><i class="fas fa-rupee-sign"></i>{{number_format($total,2)}}</td>
                                        </tr>
                                        @php
                                            $discount_rate =  Helpers::volume_discount_check($total);
                                            $discount_total = $total * $discount_rate / 100;
                                            $total = $total - $discount_total;
                                        @endphp

                                        @if($discount_rate > 0)
                                        <tr>
                                            <th>Discount</th>
                                            <td>
                                                <span><small>(- {{$discount_rate}}%)</small><i class="fas fa-rupee-sign"></i>{{ $discount_total }} <small class="manama-red"></small></span>
                                            </td>
                                        </tr>
                                        @endif

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <span class="product-price-wrapper">
                                                    <span class="money"><i class="fas fa-rupee-sign"></i>{{number_format($total,2)}}</span>
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{route('checkout')}}" class="btn btn-fullwidth btn-style-1">
                                Proceed To Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="page-content-inner enable-full-width pb--50">
                <div class="container">
                    <div class="row pt--80 pb--80 justify-content-center">
                        <div class="col-md-1">
                            <p>Cart is Empty.</p>
                        </div>

                    </div>
                </div>
            </div>

        @endif
        @include("website.account.component.banner-section")
    </div>
    <script src="{{asset('js/apply_coupon.js')}}"></script>
    @endsection

