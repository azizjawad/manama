<div class="container-fluid pb--40">
    <div class="row">
        <div class="pd-modal-content">
            <p class="order-date"><sup>Order Date</sup> {{date('d M, Y', strtotime($data['order']->created_at))}}</p>
            <h1><sup>Order No.</sup> {{$data['order']->order_no}}</h1>
            @php
                $productVariantText = \Helpers::getProductVariantText($data['order'])
            @endphp
            <p>{{$productVariantText}} </p>
            <p class="order-detail">Order Amount : <i class="fas fa-rupee-sign"></i> {{number_format($data['order']->total_amount)}}
            </p>
            <p class="order-detail">Order Status : {{Helpers::getOrderStatusText($data['order']->status)}}</p>
            <p class="order-detail">Payment Method : {{ ($data['order']->transaction_type == 'true') ? 'Cash On Delivery':'Online Payment' }}</p>
            <!--				<p class="order-detail">Transaction ID : 3cbfadbbbd5b5c944b73</p>
                            <p class="order-detail">Shipping Method : Standard Shipping</p>  -->
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
                        @foreach ($data['order']->order_history as $history)
                        <tr>
                            <td>{{date('d M, Y', strtotime($history->created_at))}}</td>
                            <td>{{Helpers::getOrderStatusText($history->status)}} </td>
                            <td>{{$history->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>