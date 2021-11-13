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
                                    <tr>
                                        <td>21/09/2021</td>
                                        <td>MFF0003</td>
                                        <td>Shipped</td>
                                        <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#odmwindow" class="table-link"><i class="fas fa-external-link-alt"></i>Details</a><a href="bill-sample.pdf" target="_blank" class="table-link"><i class="fas fa-print"></i>Print</a></td>
                                    </tr>
                                    <tr>
                                        <td>21/08/2021</td>
                                        <td>MFF0002</td>
                                        <td>Delivered</td>
                                        <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#odmwindow" class="table-link"><i class="fas fa-external-link-alt"></i>Details</a><a href="bill-sample.pdf" target="_blank" class="table-link"><i class="fas fa-print"></i>Print</a></td>
                                    </tr>
                                    <tr>
                                        <td>15/07/2021</td>
                                        <td>MFF0001</td>
                                        <td>Delivered</td>
                                        <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#odmwindow" class="table-link"><i class="fas fa-external-link-alt"></i>Details</a><a href="bill-sample.pdf" target="_blank" class="table-link"><i class="fas fa-print"></i>Print</a></td>
                                    </tr>
                                    </tbody>
                                </table></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
@endsection
