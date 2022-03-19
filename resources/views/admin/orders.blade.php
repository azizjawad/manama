@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Order Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-shipping-rate-list">
                                        <thead>
                                            <tr>
                                                <th>SR No.</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Customer Name</th>
                                                <th>Amount</th>
                                                <th>Txn. ID</th>
                                                <th>Status</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr role="row" class="odd">
                                                    <td>{{$loop->index +1}}</td>
                                                    <td class="sorting"><a href="javascript:void(0);"
                                                            onClick="fetchOrderDetailModal({{ $order->order_no }})"
                                                            data-toggle="modal" data-target="#orderDetails"
                                                            title="Manage Order">{{ $order->order_no }}</a></td>
                                                    <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                    <td>{{ $order->seller->name }}</td>
                                                    <td><i class="las la-rupee-sign"></i>{{ $order->total_amount }}</td>
                                                    <td>{{ $order->transaction_id }}</td>
                                                    <td>{{ Helpers::getOrderStatusText($order->status) }}</td>
                                                    <td><a href="javascript:void(0);"
                                                            onClick="fetchOrderDetailModal({{ $order->order_no }})"
                                                            data-toggle="modal" data-target="#orderDetails"
                                                            class="las la-eye btn btn-secondary mx-1 my-3"
                                                            title="Manage Order"></a>
                                                        <a href="{{ route('generatePDF', [$order->order_no]) }}"
                                                            target="_blank" class="las la-print btn btn-secondary mx-1 my-3"
                                                            title="Print Order"></a>
                                                    </td>
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
        </div>
        <!-- Order Details Modal Start -->
        <div class="modal fade bd-example-modal-lg" id="orderDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Summary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body orderDetailsModalBody">

                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details Modal End -->
    </div>
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
