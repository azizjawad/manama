@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Dashboard Ecommerce</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
        </div>
        <div class="col-lg-12 col-xl-12">

            <div class="row">
                <div class="col-12 col-md-6 mb-5 order-md-2">
                    <div class="card">
                        <div class="position-absolute card-top-buttons">
                            <button class="btn btn-header-light icon-button" onclick="window.location.reload()">
                                <i class="simple-icon-refresh"></i></button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Recent Orders</h5>
                            <div class="scroll dashboard-list-with-thumbs">
                                @foreach ($data['recent_orders'] as $order)
                                    <div class="row mb-2 py-md-3 align-items-center border-style-01">
                                        <div class="col-md-auto col-3">
                                            <div class="card colorBox cal-card">
                                                <p
                                                    class="text-primary lead text-white font-weight-medium text-center p-2 mb-0">
                                                    {{ date('d') }}<small
                                                        class="text-small d-block">{{ date('M') }}</small><small
                                                        class="text-small d-block">{{ date('Y') }}</small></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-9">
                                            <a href="#">
                                                <p class="list-item-heading mb-2 font-weight-bold">{{ $order->order_no }}
                                                    <span class="badge badge-pill top-pos badge-theme-1 text-uppercase">
                                                        {{ Helpers::getOrderStatusText($order->status) }}</span>
                                                </p>
                                                <p>{{\Helpers::getProductVariantText($order)}} </p>
                                                <p class="list-item-heading mb-0 font-weight-bold"><i
                                                        class="las la-rupee-sign"></i>
                                                    {{ number_format($order->total_amount) }}</p>
                                                <div class="pr-4 d-block">
                                                    <p class="text-extra-small mb-0 line-height-2">Orderd by -
                                                        {{ $order->order_by->name }}</p>
                                                    <p class="text-extra-small mb-0 line-height-2">Txn ID -
                                                        {{ $order->transaction_id }}</p>
                                                </div>

                                            </a>
                                        </div>
                                        <div class="col-md-auto col-12 text-right">
                                            <a  href="{{ route('generatePDF',[$order->order_no])}}" target="_blank" 
                                                class="las la-print btn btn-secondary mx-1 my-3" title="Print Order"></a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-2 order-md-1">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="py-2 px-3">
                                <h4 class="mb-0 font-weight-bold">Sales Summary</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row sortable">
                        <div class="col-6 col-md-4 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">New Orders</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['new_sales'] }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Pending Orders</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['pending_orders'] }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Completed Orders</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['completed_orders'] }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="py-2 px-3">
                                <h4 class="mb-0 font-weight-bold">Revenue Summary</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row sortable">
                        <div class="col-6 col-md-6 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Daily Sales</p>
                                    <h3 class="lead color-theme-1 mb-1 value"><i
                                            class="las la-rupee-sign"></i>{{ number_format($data['daily_sales']) }}</h3>
                                    <p class="mb-0 font-weight-bold"><small class="d-block">* Resets daily.</small>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Monthly Sales</p>
                                    <h3 class="lead color-theme-1 mb-1 value"><i
                                            class="las la-rupee-sign"></i>{{ number_format($data['monthly_sales']) }}
                                    </h3>
                                    <p class="mb-0 font-weight-bold"><small class="d-block">For the Month of
                                            {{ date('M Y') }}</small></p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Total Sales Value</p>
                                    <h3 class="lead color-theme-1 mb-1 value"><i
                                            class="las la-rupee-sign"></i>{{ number_format($data['total_sales']) }}</h3>
                                    <p class="mb-0 font-weight-bold"><small class="d-block">Aggretated Value of all
                                            Pending & Completed Orders</small></p>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-md-9 mb-5">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">New Registration</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['new_registrations'] as $user)
                                            <tr>
                                                <th scope="row">{{ $user->name }}</th>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td> <a href="javascript:void(0)" data-id="{{ $user->id }}"
                                                        data-toggle="modal" data-target="#customerDetails" title="View KYC"
                                                        class="las la-eye btn btn-secondary mx-1"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5">

                    <div class="row sortable">
                        <div class="col-12 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Daily New Registration</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['daily_new_registration'] }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Monthly New Users</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['monthly_new_registration'] }}
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="card">

                                <div class="card-body justify-content-between align-items-center">
                                    <p class="mb-1 font-weight-bold">Total Users</p>
                                    <h3 class="lead color-theme-1 mb-1 value">{{ $data['total_users'] }}</h3>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="customerDetails" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customer Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-left">
                                <div class="table-responsive">
                                    <table class="table table-bordered">

                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Customer Name</td>
                                                <td>John Doe Smith</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Customer Status</td>
                                                <td>Active</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Wishlist Products</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Total Orders</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Mobile No.</td>
                                                <td>+91-9876543210</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">E-mail</td>
                                                <td>john.dsmith@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Delivery Address 1</td>
                                                <td>
                                                    <b>Home Address</b><br>
                                                    Jason Smith<br>
                                                    Jewel World, 175, Kalbadevi Road,
                                                    Marine Lines East, Panjarpole,
                                                    Bhuleshwar, Mumbai, Maharashtra 400018<br>
                                                    Alternate Mobile Number : +91-9877895411
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Delivery Address 2</td>
                                                <td>
                                                    <b>Office Address</b><br>
                                                    Jason Smith<br>
                                                    Jewel World, 175, Kalbadevi Road,
                                                    Marine Lines East, Panjarpole,
                                                    Bhuleshwar, Mumbai, Maharashtra 400018<br>
                                                    Alternate Mobile Number : +91-7877895411
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
