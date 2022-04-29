@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Customers Order Summary</h5>
                        <div class="alert alert-warning mb-5" role="alert">* Select the customer you want to view the orders of.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form action="{{route('admin-customer-summary')}}">
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" name="user_id" class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">Select Customer</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>Customer Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">List Orders</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                        @if(isset($name))
                            <p class="text-center font-weight-bold pt-1 pb-3 m-0">Displaying Orders for "{{$name}}"</p>
                        @endif
                            <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-customer-orders">
                                        <thead>
                                        <tr>
                                            <th>Order No.</th>
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                            <th>Txn. ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($orders))
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_no}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td><i class="las la-rupee-sign"></i>{{$order->total_amount}}</td>
                                                    <td>{{$order->transaction_id}}</td>
                                                    <td>{{Helpers::getOrderStatusText($order->status)}}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" onclick="fetchOrderDetailModal('{{$order->order_no}}')" data-toggle="modal" data-target="#orderDetails" class="las la-eye btn btn-secondary mx-1 my-3" title="Manage Order"></a>
                                                        <a href="{{route('generatePDF',[$order->order_no])}}" target="_blank" class="las la-print btn btn-secondary mx-1 my-3" title="Print Order"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
    <!-- Order Details Modal Start -->
    <div class="modal fade product-modal" id="orderDetailsModal" aria-hidden="true" aria-labelledby="odmwindowLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="odmwindowLabel">Order Details</h5>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true"><i class="las la-close"></i></span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body orderDetailsModalBody"></div>
            </div>
        </div>
    </div>
    <!-- Order Details Modal End -->

    <script>
        function fetchOrderDetailModal(order_no) {
            $.ajax({
                type: 'GET',
                url: window.location.origin + '/account/order-details/' + order_no+'?adminFlag=true',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                success: function(response) {
                    console.log(' fetchOrderDetailModal : ', response);
                    $('.orderDetailsModalBody').html(response);
                    $('#orderDetailsModal').modal('show');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        $(document).on('click', '.btn-close', function(e) {
            $('#orderDetailsModal').modal('hide');
        });
    </script>
@endsection
