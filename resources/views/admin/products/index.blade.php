@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Category</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Product List</h5>
                        <div class="separator mb-5"></div>
                        <div class="table-responsive">
                            <table class="data-table data-table-products">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Updated At</th>
                                    <th>label</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img width="100" src="{{Storage::url('uploads/products/'. $product->image)}}" alt=""></td>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{date('d M Y', strtotime($product->updated_at))}}</td>
                                    <td>{{LABEL[$product->label]}}</td>
                                    <td>{{['offline','online'][$product->status]}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin-product-edit', $product->id)}}" class="las la-edit btn btn-secondary mx-1"></a>
                                        <a data-delete='{{$product->id}}' href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1 delete_item"></a>
                                        <a href="javascript:void(0)" data-product_id="{{$product->id}}" data-status="{{$product->status}}" class="las la-ban btn btn-secondary mx-1 is_product_online"></a>
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
    <div class="modal fade bd-example-modal-sm" id="prdvisibilty" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Toggle Product Visibility</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-warning mb-5" role="alert">* Please note, you cannot delete any product here, only deactivate it. If you deactivate a product, all the listing under it will be deacivated too.</div>
                    <p><b>Product Name:</b> Original Mojitos</p>
                    <label class="form-label font-weight-bold" id="switch3-label">Product Online</label>
                    <div class="custom-switch custom-switch-primary-inverse mb-2">
                        <input type="hidden" id="product_id_modal" name="product_id_modal">
                        <input class="custom-switch-input" id="product_online" name="product_online" value="1" type="checkbox">
                        <label class="custom-switch-btn" for="product_online"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
