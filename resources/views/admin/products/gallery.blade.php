@extends('admin.layout')

@section('content')
    <div class='row'>
        <div class="col-12">
            <h1>Product Settings</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#addprdimg" class="btn btn-secondary mb-2 float-right adjust-margin-01">Add Product Image</a>
                        <h5 class="mb-4 font-weight-bold">Product Gallery</h5>
                        <div class="separator mb-5"></div>

                        <div class="table-responsive">
                            <table class="data-table data-table-products-gallry">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Image Label</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products_gallery as $key)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$key->product_name}}</td>
                                        <td>
                                            <div class="img prd lightbox">
                                                <a href="{{Storage::url('uploads/products-gallery/'. $key->image_path)}}">
                                                    <img src="{{Storage::url('uploads/products-gallery/'. $key->image_path)}}"/>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{$key->image_label}}</td>
                                        <td>{{date('d M Y'),strtotime($key->created_at)}}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-delete="{{$key->id}}" class="las la-trash-alt btn btn-secondary mx-1 delete_item"></a>
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
    <div class="modal fade modal-right" id="addprdimg" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Add Product Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="kt_products_gallery_form" name="kt_products_gallery_form" action="{{Route('admin-save-products-gallery')}}">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-4">
                                <select id="productList" name="product_id" class="form-control select2-single" data-width="100%">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                <span>Product</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" class="form-control" name="image_label" type="text"> <span>Image Label</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control" type="file" name="image" accept=".jpg,.png"><span>Image Upload</span></label>
                            <label class="tooltip-text mb-4">(Only upload 600x600 size images.)</label>
                        </div>
                        <div  class="form-group text-right">
                            <button class="btn btn-secondary" type="submit">List Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
