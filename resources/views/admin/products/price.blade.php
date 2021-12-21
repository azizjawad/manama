@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Product Settings</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#addpriceentry" class="btn btn-secondary mb-2 float-right adjust-margin-01">Save Product Info</a>
                            <h5 class="mb-4 font-weight-bold">Price List</h5>
                            <div class="separator mb-5"></div>
                            <div class="table-responsive">
                                <table class="data-table data-table-prdprice">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Listing Name</th>
                                        <th>Pkg. Wt.</th>
                                        <th>Cost</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product_info as $key)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$key->product_name}}</td>
                                            <td>{{$key->listing_name}}</td>
                                            <td>{{$key->packaging_weight}}</td>
                                            <td>{{$key->cost_price}}</td>
                                            <td>{{date('d M Y', strtotime($key->updated_at))}}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)"
                                                   data-product_id="{{$key->product_id}}"
                                                   data-product_info_id="{{$key->id}}"
                                                   data-listing_name="{{$key->listing_name}}"
                                                   data-packaging_weight="{{$key->packaging_weight}}"
                                                   data-packaging_type="{{$key->packaging_type}}"
                                                   data-cost_price="{{$key->cost_price}}"
                                                   data-barcode="{{$key->barcode}}"
                                                   data-sku_code="{{$key->sku_code}}"
                                                   data-hsn_code="{{$key->hsn_code}}"
                                                   data-sell_as_single="{{$key->sell_as_single}}"
                                                   data-is_in_stock="{{$key->is_in_stock}}"
                                                   data-toggle="modal"
                                                   data-target="#addpriceentry"
                                                   class="las la-edit btn btn-secondary mx-1 edit_product_info">
                                                </a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
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
    <div class="modal fade modal-right" id="addpriceentry" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Product Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="kt_product_info_form" name="kt_product_info_form" action="{{Route('admin-save-product-info')}}">
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
                                <input data-role="tagsinput" name="listing_name" value="" class="form-control" type="text"> <span>Listing Name</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="packaging_weight" class="form-control" type="text"> <span>Packaging Weight</span>
                            </label>
                            <label class="tooltip-text mb-0">Please use standard denominations like ml, gm, L, Kg etc.</label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="packaging_type" class="form-control" type="text"> <span>Packaging Type</span>
                            </label>
                            <label class="tooltip-text mb-0">Please use standards like PET, Glass, Tetra Pack, Tin etc.</label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="cost_price" class="form-control" type="text"> <span>Item Cost</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="barcode" class="form-control" type="text"> <span>Barcode (GTIN)</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="sku_code" class="form-control" type="text"> <span>SKU Code</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" name="hsn_code" class="form-control" type="text"> <span>HSN Code</span>
                            </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <label class="form-label font-weight-bold" id="switch3-label">In Stock</label>
                                <div class="custom-switch custom-switch-primary-inverse mb-2">
                                    <input class="custom-switch-input" name="is_in_stock" value="1" id="switch3" type="checkbox" checked>
                                    <label class="custom-switch-btn" for="switch3"></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label font-weight-bold" id="switch7-label"><small>Sell as Single</small></label>
                                <div class="custom-switch custom-switch-primary mb-2">
                                    <input class="custom-switch-input" name="sell_as_single" id="switch7" value="1" type="checkbox" checked>
                                    <label class="custom-switch-btn" for="switch7"></label>
                                </div>
                            </div>
                        </div>
                        <div  class="form-group text-right">
                            <input type="hidden" value="" id="product_info_id" name="product_info_id">
                            <button class="btn btn-secondary" type="submit">Save Product Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
