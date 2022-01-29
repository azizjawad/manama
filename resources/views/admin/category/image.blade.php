@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Category</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="Category.View.List.html">Back to List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Cateogry</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Category Background Image</h5>
                        <div class="alert alert-warning mb-5 mr-md-5" role="alert">* Please note, If you upload a new image for the category, the old image will be deleted. Please make sure you upload a 770x788 pixel image to maintain the website design.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form id="kt_category_image_form" enctype="multipart/form-data" name="kt_category_image_form" action="{{Route('admin-save-category-image')}}">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="category" name="category" class="form-control select2-single" data-width="100%">
                                                <option value="" selected label="&nbsp;">Select Category</option>
                                                @foreach($categories as $option)
                                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>Category Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input class="form-control" name="image" type="file" accept=".jpg,.png"><span>Image Upload</span>
                                        </label>
                                        <span class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</span>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">Add Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-category">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Last Updated on</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $key)
                                            <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td><img width="100" src="{{Storage::url('uploads/categories/'. $key->image)}}" alt=""></td>
                                            <td>{{$key->name}}</td>
                                            <td>{{date('d M Y', strtotime($key->updated_at))}}</td>
                                            <td class="text-center">
                                                <a data-delete='{{$key->id}}' href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1 delete_item"></a>
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
    </div>
@endsection
