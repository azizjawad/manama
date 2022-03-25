<div class="row">
    <div class="col-md-6 col-12">
        <div class="card mb-4 colorBox">
            <div class="card-body">
                <h3 class="text-white font-weight-bolder">Order ID: {{ $order->order_no }}</h3>
                <p class="text-small text-white mb-2">Date: {{ date('d M, Y', strtotime($order->created_at)) }}</p>
               @if ( $order->transaction_id)
                 <p class="text-small text-white mb-2">Txn ID: {{ $order->transaction_id }}</p>
               @endif
                {{-- <p class="text-small text-white mb-2">Shipping Method: Standard Shipping Free</p> --}}
                <p class="text-small text-white mb-2"><b>Order Status:</b> {{ Helpers::getOrderStatusText($order->status) }}</p>
                <a href="{{route('manage_order',[$order->order_no])}}" target="_blank" class="btn btn-primary mb-1 mt-1 float-right">Manage Order</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="font-weight-bold">Customer Details</h5>
                <p class="text-small line-height-2 mb-1"><b>{{ $order->shipping_address_detail->fullname }}</b>
                    {{ $order->shipping_address_detail->address }},<br>
                    {{$order->shipping_address_detail->city_village .'-'. $order->shipping_address_detail->pincode}},<br>
                    {{$order->shipping_address_detail->state}}<br></p>
                <p class="text-small line-height-2 mb-1"><b>Mobile Number:</b> {{ $order->shipping_address_detail->mobile_no }}<br>
                    <b>Email Address :</b> {{ $order->seller->email }}
                </p>
                <a href="{{ route('generatePDF',[$order->order_no])}}" target="_blank"
                    class="btn btn-secondary mt-1 float-right">Print Invoice</a>
                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card mb-4">
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
                                    <th scope="row">{{$srNo++}}</th>
                                    <td>{{$productDetails->listing_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td><i class="las la-rupee-sign"></i> {{number_format($item->product_cost * $item->quantity)}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot class="thead-light">
                            <tr>
                                <td scope="col" class="text-left font-weight-bolder"></td>
                                <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                    Sub Total</td>
                                <td scope="col"><i class="las la-rupee-sign"></i>{{ ($order->sub_total == 0) ? 'Free Shipping':$order->sub_total}}</td>
                            </tr>
                            <tr>
                                <td scope="col" class="text-left font-weight-bolder"></td>
                                <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                    Shipping Rate</td>
                                <td scope="col"><i class="las la-rupee-sign"></i>{{ ($order->shipping_charges == 0) ? 'Free Shipping':$order->shipping_charges}}</td>
                            </tr>
                            @if ($order->discount > 0 )
                            <tr>
                                <td scope="col" class="text-left font-weight-bolder"></td>
                                <td colspan="2" scope="col" class="text-left font-weight-bolder">
                                    Discount</td>
                                <td scope="col"><i class="las la-rupee-sign"></i>{{$order->discount}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3" scope="col" class="text-right font-weight-bolder">
                                    Grand Total</td>
                                <td scope="col"><i class="las la-rupee-sign"></i>{{number_format($order->total_amount)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a href="{{route('manage_order',[$order->order_no])}}" target="_blank" class="btn btn-secondary mb-1 mt-1 float-right">Manage Order</a>
            </div>
        </div>
    </div>
</div>
