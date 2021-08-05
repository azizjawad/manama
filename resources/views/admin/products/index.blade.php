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
                                    <th>Actions</th>
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
                                    <td class="text-center">
                                        <a href="{{route('admin-product-edit', $product->id)}}" class="las la-edit btn btn-secondary mx-1"></a>
                                        <a data-delete='{{$product->id}}' href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1 delete_item"></a>
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
@endsection
