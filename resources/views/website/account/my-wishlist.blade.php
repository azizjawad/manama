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
                            <h3 class="sub-title"><span>My Wish List</span></h3>
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-start" colspan="3">Product</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="product-remove text-start"><a href=""><i class="dl-icon-close"></i></a></td>
                                        <td class="product-thumbnail text-start">
                                            <img src="{{asset("web/images/products/caramel-sauces.png")}}" alt="Product Thumnail">
                                        </td>
                                        <td class="product-name text-start wide-column">
                                            <h3>
                                                Caramel Sauces
                                                <small>PKG - 500ml<br>MRP -
                                                    <i class="fas fa-rupee-sign"></i>185.00<br>In Stock
                                                </small>
                                            </h3>
                                        </td>
                                        <td>
                                            <a href="cart.html" class="table-link"><i class="fas fa-external-link-alt"></i>Add to Cart</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
@endsection
