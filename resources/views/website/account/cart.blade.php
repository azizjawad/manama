@extends('layouts.main')

@section('content')
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
        <div class="page-content-inner enable-full-width pb--50">
            <div class="container">
                <div class="row pt--80 pb--80 justify-content-center">
                    <div class="col-md-8 col-12 ">
                        <form class="cart-form" action="#">
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
                                            <tr>
                                                <td class="product-remove text-start"><a href=""><i
                                                            class="dl-icon-close"></i></a></td>
                                                <td class="product-thumbnail text-start">
                                                    <img src="{{asset("web/images/products/caramel-sauces.png")}}"
                                                         alt="Product Thumnail">
                                                </td>
                                                <td class="product-name text-start wide-column">
                                                    <h3>
                                                        Caramel Sauces <small>PKG - 500ml<br>
                                                            MRP - <i class="fas fa-rupee-sign"></i>185.00
                                                        </small>
                                                    </h3>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="quantity-input" name="qty"
                                                               id="qty-1" value="3" min="1">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong><i
                                                                            class="fas fa-rupee-sign"></i>555.00</strong></span>
                                                            </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-remove text-start"><a href=""><i
                                                            class="dl-icon-close"></i></a></td>
                                                <td class="product-thumbnail text-start">
                                                    <img src="{{asset("web/images/products/raspberry-jam.png")}}"
                                                         alt="Product Thumnail">
                                                </td>
                                                <td class="product-name text-start wide-column">
                                                    <h3>
                                                        Raspberry Jam <small>PKG - 500ml<br>
                                                            MRP - <i class="fas fa-rupee-sign"></i>100.00
                                                        </small>
                                                    </h3>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="quantity-input" name="qty"
                                                               id="qty-2" value="1" min="1">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong><i
                                                                            class="fas fa-rupee-sign"></i>100.00</strong></span>
                                                            </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-remove text-start"><a href=""><i
                                                            class="dl-icon-close"></i></a></td>
                                                <td class="product-thumbnail text-start">
                                                    <img src="{{asset("web/images/products/lime-mint-mojito.png")}}"
                                                         alt="Product Thumnail">
                                                </td>
                                                <td class="product-name text-start wide-column">
                                                    <h3>
                                                        Lime Mint Mojito <small>PKG - 750gm<br>
                                                            MRP - <i class="fas fa-rupee-sign"></i>295.00
                                                        </small>
                                                    </h3>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="quantity-input" name="qty"
                                                               id="qty-3" value="4" min="1">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong><i
                                                                            class="fas fa-rupee-sign"></i>1180.00</strong></span>
                                                            </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-remove text-start"><a href=""><i
                                                            class="dl-icon-close"></i></a></td>
                                                <td class="product-thumbnail text-start">
                                                    <img src="{{asset("web/images/products/cherry-fruit-fillings.png")}}"
                                                         alt="Product Thumnail">
                                                </td>
                                                <td class="product-name text-start wide-column">
                                                    <h3>
                                                        Cherry Fruit Fillings <small>PKG - 500gm<br>
                                                            MRP - <i class="fas fa-rupee-sign"></i>290.00
                                                        </small>
                                                    </h3>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="quantity-input" name="qty"
                                                               id="qty-4" value="2" min="1">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong><i
                                                                            class="fas fa-rupee-sign"></i>580.00</strong></span>
                                                            </span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 border-top pt--20 mt--20">
                                <div class="col-sm-6">
                                    <div class="coupon">
                                        <input type="text" id="coupon" name="coupon" class="cart-form__input"
                                               placeholder="Coupon Code">
                                        <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <button type="submit" class="cart-form__btn">Clear Cart</button>
                                    <button type="submit" class="cart-form__btn">Update Cart</button>
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
                                            <td><i class="fas fa-rupee-sign"></i>2415.00</td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td>
                                                <span><small>(-)</small><i class="fas fa-rupee-sign"></i>100.00 <small
                                                        class="manama-red">(MANAMANEW applied)</small></span>

                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                        <span class="product-price-wrapper">
                                                            <span class="money"><i class="fas fa-rupee-sign"></i>2315.00</span>
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
        @include("website.account.component.banner-section")
    </div>
@endsection

