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
                        <h5 class="mb-4 font-weight-bold">Customers Wishlist</h5>
                        <div class="alert alert-warning mb-5" role="alert">* Select the customer you want to view the wishlist of.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form action="{{route('admin-customer-wishlist')}}">
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" name="user_id" class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">Select Customer</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
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
                            <p class="text-center font-weight-bold pt-1 pb-3 m-0">Displaying Orders for "{{ucwords($name)}}"</p>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-permission">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Added on</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
{{--                                            <th>Label</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($wishlists))
                                            @foreach($wishlists as $wishlist)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{date('d/m/Y', strtotime($wishlist->created_at))}}</td>
                                                    <td><div class="img prd lightbox">
                                                            <a href="{{asset('images/uploads/products/'.$wishlist->product_info->product->image)}}">
                                                                <img src="{{asset('images/uploads/products/'.$wishlist->product_info->product->image)}}"/>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{$wishlist->product_info->listing_name}}</td>
                                                    <td>{{DB::table('products')->join('categories','categories.id','products.category_id')->where('products.id', $wishlist->product_info->product_id)->pluck('categories.name')->first()}}</td>
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
