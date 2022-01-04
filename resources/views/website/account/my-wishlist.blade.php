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
                            <h3 class="sub-title"><span>My Wish List</span></h3>
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-start" colspan="3">Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($wishListData))

                                            @foreach ($wishListData as $product)
                                                <tr>
                                                    <td class="product-remove text-start"><a href="javascript:void(0);"
                                                            class="add_to_wishlist_btn"
                                                            data-product_info_id="{{ $product->product_info_id }}"><i
                                                                class="dl-icon-close"></i></a></td>
                                                    <td class="product-thumbnail text-start">
                                                        <img src="{{ asset('web/images/products/'.$product->product_info->product->image) }}"
                                                            alt="Product Thumnail">
                                                    </td>
                                                    <td class="product-name text-start wide-column">
                                                        <h3>
                                                            {{ $product->product_info->listing_name }}
                                                            <small>{{ $product->product_info->packaging_type }} -
                                                                {{ $product->product_info->packaging_weight }}<br>MRP -
                                                                <i
                                                                    class="fas fa-rupee-sign"></i>{{ number_format($product->product_info->cost_price, 2) }}<br>
                                                                {{ $product->product_info->is_in_stock >= 1 ? 'In Stock' : 'Out of Stock' }}
                                                            </small>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        @if ($product->product_info->is_in_stock >= 1)
                                                            <a href="javascript:void(0);"
                                                                class="table-link add_to_cart_btn "
                                                                data-product_info_id="{{ $product->product_info_id }}"><i
                                                                    class="fas fa-external-link-alt"></i>Add to Cart</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <h3>No Products wishlisted</h3>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Cart Area End Here -->
        @include("website.account.component.banner-section")
    </div>
    <script>
        const userExists = '{{ \Auth::user() ? true : false }}';
        let wishListProduct = false;
        const refreshPage = true;
    </script>
    <script src="{{ asset('js/wishlist/add_wishlist.js') }}"></script>
@endsection
