@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Category</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{Route('admin-category-list')}}">Back to List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Cateogry</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Add New Category</h5>
                        <form id="kt_categories_form" name="kt_categories_form" action="{{Route('admin-save-categories')}}">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <div class="bootstrap-tagsinput">
                                    <input type="text" value="{{$category->name}}" name="name">
                                </div>
                                <input data-role="tagsinput" type="text" style="display: none;">
                                <span>Category Name</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <textarea class="form-control"  rows="4" name="description">{{$category->description}}</textarea>
                                <span>Category Desc</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <div class="bootstrap-tagsinput">
                                    <input name="meta_title" value="{{$category->meta_title}}" type="text" placeholder="">
                                </div>
                                <input data-role="tagsinput" type="text" style="display: none;">
                                <span>Meta Page Title</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <textarea class="form-control" name="meta_description" rows="4" required="">{{$category->meta_description}}</textarea>
                                <span>Meta Page Description</span>
                            </label>
                            <label class="form-group has-float-label mb-1">
                                <div class="bootstrap-tagsinput"><input type="text" name="page_slug" value="{{$category->page_slug}}" placeholder=""></div>
                                <input data-role="tagsinput" type="text" style="display: none;">
                                <span>Page URL</span>
                            </label>
                            <label class="tooltip-text mb-4">(Please use lowercase letters and user hyphen (-) instead of space e.g page-link)</label>
                            <div class="form-group text-right">
                                <input type="hidden" name="category_id" value="{{$category->id}}" />
                                <button class="btn btn-secondary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
