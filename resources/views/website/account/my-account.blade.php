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

                                <p class="order-date"><sup>Order Date</sup> {{date('d M, Y, h:m', strtotime($orders[0]->created_at))}}</p>
                                <h1><sup>Order No.</sup> {{$orders[0]->order_no}}</h1>
                                @php    
                                    $productCount = $orders[0]->product_info->count() -1 ;
                                    $productCountSubText = '';
                                    if($productCount == 1){
                                        $productCountSubText = ' and '.$productCount.' item';
                                    }elseif($productCount > 1){
                                        $productCountSubText = ' and '.$productCount.' items';
                                    }
                                    $productVariant = $orders[0]->product_info->first();
                                    $productVariantText = 'Your order for '.$productVariant->listing_name.' '.$productCountSubText;
                                @endphp
                                <p>{{$productVariantText}} </p>
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
                                            @foreach ($orders[0]->order_history as $history)
                                            <tr>
                                                <td>{{date('d M, Y', strtotime($history->created_at))}}</td>
                                                <td>
                                                    @switch($history->status)
                                                        @case(1)
                                                             Processing
                                                            @break
                                                        @default
                                                        Processing
                                                    @endswitch    
                                                </td>
                                                <td>{{$history->description}}</td>
                                            </tr>
                                            @endforeach
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

