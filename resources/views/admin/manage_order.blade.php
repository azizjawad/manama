@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Order Management</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin-order') }}">Back to Orders</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Order Details
                        </li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">?</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card mb-5 colorBox">
                    <div class="card-body">
                        <h3 class="text-white font-weight-bolder">Order ID: {{ $order->order_no }}</h3>
                        <p class="text-small text-white mb-2">Date: {{ date('d M, Y', strtotime($order->created_at)) }}
                        </p>
                        @if ($order->transaction_id)
                            <p class="text-small text-white mb-2">Txn ID: {{ $order->transaction_id }}</p>
                        @endif
                        {{-- <p class="text-small text-white mb-2">Shipping Method: Standard Shipping Free</p> --}}
                        <p class="text-small text-white mb-2"><b>Order Status:</b>
                            {{ Helpers::getOrderStatusText($order->status) }}</p>
                        <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#orderUpdates"
                            class="btn btn-primary mb-1 mt-1 float-right">Manage Order</a>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Customer Details</h5>
                        <p class="text-small line-height-2 mb-1">
                            <b>{{ $order->shipping_address_detail->fullname }}</b><br>{{ $order->shipping_address_detail->address }}
                        </p>
                        <p class="text-small line-height-2 mb-1"><b>Mobile Number:</b>
                            {{ $order->shipping_address_detail->mobile_no }}<br>
                            <b>Email Address :</b> {{ $order->seller->email }}
                        </p>
                        <a href="{{ route('generatePDF', [$order->order_no]) }}" target="_blank"
                            class="btn btn-secondary mt-1 float-right">Print Invoice</a>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Ordered Items</h5>
                        <div class="separator mb-0"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Details</th>
                                        <th scope="col">Qty.</th>
                                        <th scope="col">Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($order->order_details as $item)
                                        @php
                                            $productDetails = $item->product_info->first();
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $srNo++ }}</th>
                                            <td>{{ $productDetails->listing_name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td><i class="las la-rupee-sign"></i>
                                                {{ number_format($item->product_cost * $item->quantity) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <td scope="col" class="text-left font-weight-bolder"></td>
                                        <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                            Sub Total</td>
                                        <td scope="col"><i
                                                class="las la-rupee-sign"></i>{{ $order->sub_total == 0 ? 'Free Shipping' : $order->sub_total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" class="text-left font-weight-bolder"></td>
                                        <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                            Shipping Rate</td>
                                        <td scope="col"><i
                                                class="las la-rupee-sign"></i>{{ $order->shipping_charges == 0 ? 'Free Shipping' : $order->shipping_charges }}
                                        </td>
                                    </tr>
                                    @if ($order->discount > 0)
                                        <tr>
                                            <td scope="col" class="text-left font-weight-bolder"></td>
                                            <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                                Discount</td>
                                            <td scope="col"><i class="las la-rupee-sign"></i>{{ $order->discount }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="3" scope="col" class="text-right font-weight-bolder">
                                            Grand Total</td>
                                        <td scope="col"><i
                                                class="las la-rupee-sign"></i>{{ number_format($order->total_amount) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{-- <div class="d-block text-right">
                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static"
                                data-target="#orderUpdates" class="btn btn-secondary m-1">Manage Updates</a>
                            <a href="{{ route('generatePDF',[$order->order_no])}}" target="_blank" class="btn btn-secondary m-1">Print
                                Invoice</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Update Log</h5>
                        <div class="separator mb-0"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_history as $history)
                                        <tr>
                                            <td>{{ date('d M, Y', strtotime($history->created_at)) }}</td>
                                            <td>{{ Helpers::getOrderStatusText($history->status) }} </td>
                                            <td>{{ $history->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Order Updates Modal -->

    <div class="modal fade modal-right" id="orderUpdates" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Order Updates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update_order_status',[$order->order_no])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="order_status">Order Status</label>
                            <select id="order_status" name="order_status" class="form-control select2-single" data-width="100%" data-placeholder="Select Status">
                                <option label="Select Status" value="">Select Status</option>
                                @foreach (array_values(ORDER_STATUSES) as $status)
                                    <option value="{{ $status['id'] }}" {{old('order_status') == $status['id'] ? 'checked':''}}>{{ $status['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="hasShipped">
                            <label for="delivery_company">Delivery Company</label>
                            <select id="delivery_company" name="delivery_company" class="form-control select2-single" data-width="100%">
                                <option label="&nbsp;">Select Courier</option>
                                @foreach (array_values(DELIVERY_COMPANY) as $status)
                                    <option value="{{ $status['id'] }}" {{old('delivery_company') == $status['id'] ? 'checked':''}}>{{ $status['text'] }}</option>
                                @endforeach
                            </select>
                            <label for="tracking_number" class="mt-2">AWB/ Consignment No.</label>
                            <input id="tracking_number" name="tracking_number" type="text" class="form-control" value="{{old('tracking_number')}}" placeholder="" />
                        </div>

                        <div class="form-group" id="customMessage">
                            <label>Custom Message</label>
                            <textarea placeholder="" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                    <h5 class="font-weight-bold">Update Log</h5>
                    <div class="separator mb-0"></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_history as $history)
                                    <tr>
                                        <td>{{ date('d M, Y', strtotime($history->created_at)) }}</td>
                                        <td>{{ Helpers::getOrderStatusText($history->status) }} </td>
                                        <td>{{ $history->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
