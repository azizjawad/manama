@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Products Bestsellers</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                @foreach($categories as $category)
                <div class="col-12 col-md-6 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$category['category_name']}}</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Units Sold</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category['products'] as $product)
                                            <tr>
                                                <th scope="row">{{$loop->index + 1}}</th>
                                                <td>{{$product->listing_name}}</td>
                                                <td>{{$product->total}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
