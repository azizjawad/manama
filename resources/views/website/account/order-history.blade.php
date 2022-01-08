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
                            <h3 class="sub-title"><span>Order History</span></h3>
                            <div class="table-responsive order-meta-table has-action">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Order ID</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['orders'] as $order)
                                            <tr>
                                                <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                <td>{{ $order->order_no }}</td>
                                                <td>{{ Helpers::getOrderStatusText($order->status) }}</td>
                                                <td><a href="javascript:void(0);"
                                                        onClick="fetchOrderDetailModal({{ $order->order_no }})"
                                                        data-bs-toggle="modal" data-bs-target="#odmwindow"
                                                        class="table-link"><i
                                                            class="fas fa-external-link-alt"></i>Details</a><a
                                                        href="{{ route('generatePDF',[$order->order_no])}}" target="_blank" class="table-link"><i
                                                            class="fas fa-print"></i>Print</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Details Modal Start -->
            <div class="modal fade product-modal" id="orderDetailsModal" aria-hidden="true" aria-labelledby="odmwindowLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="odmwindowLabel">Order Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                            </button>
                        </div>
                        <div class="modal-body orderDetailsModalBody"></div>
                    </div>
                </div>
            </div>
            <!-- Order Details Modal End -->

        </div> <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
@endsection
