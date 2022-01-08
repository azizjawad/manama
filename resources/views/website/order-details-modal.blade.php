<div class="container-fluid pb--40">
    <div class="row">
        <div class="pd-modal-content">
            <p class="order-date"><sup>Order Date</sup> {{ date('d M, Y', strtotime($order->created_at)) }}</p>
            <h1><sup>Order No.</sup> {{ $order->order_no }}</h1>
            <p>{{ \Helpers::getProductVariantText($order) }} </p>
            <p class="order-detail">Order Amount : <i class="fas fa-rupee-sign"></i>
                {{ number_format($order->total_amount) }}
            </p>
            <p class="order-detail">Order Status : {{ Helpers::getOrderStatusText($order->status) }}</p>
            <p class="order-detail">Payment Method :
                {{ $order->transaction_type == 'true' ? 'Cash On Delivery' : 'Online Payment' }}</p>
                @if ( $order->transaction_id)
                 <p class="order-detail">Transaction ID : {{ $order->transaction_id }}</p>
               @endif
            <!--			
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
