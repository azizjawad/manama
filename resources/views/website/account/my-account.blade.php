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
                            <h3 class="sub-title"><span>Latest Order</span></h3>
                            
                            @if(isset($orders) && !empty($orders)) 

                                <p class="order-date"><sup>Order Date</sup> {{$orders[0]->created_at}}</p>
                                <h1><sup>Order No.</sup> {{$orders[0]->order_no}}</h1>
                                <p>Your order for Original Mojito (750ml) and other 5 items</p>
                                <div class="table-responsive order-meta-table">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>22/09/2021</td>
                                            <td>Processing</td>
                                            <td>Your order has being recieved.</td>
                                        </tr>
                                        <tr>
                                            <td>22/09/2021</td>
                                            <td>Packed</td>
                                            <td>Your order has been packed and ready to be shipped.</td>
                                        </tr>
                                        <tr>
                                            <td>22/09/2021</td>
                                            <td>Shipped</td>
                                            <td>Your order has been shipped. Your AWB No. 12345679890</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>           <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
@endsection

