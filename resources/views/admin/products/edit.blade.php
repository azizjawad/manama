@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Products</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Update Product</h5>
                            <form id="kt_product_form" enctype="multipart/form-data" name="kt_product_form" action="{{Route('admin-save-product')}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-4">
                                        <select id="category_id" name="category_id" class="form-control select2-single select2-hidden-accessible" data-width="100%" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span>Category Name</span>
                                    </label>
                                </div>
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="text" name="name" value="{{$product->name}}">
                                     <span>Products Name</span>
                                </label>
                                <label class="form-group has-float-label mb-1">
                                    <input class="form-control" name="image" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                                <label class="tooltip-text mb-4">(Only upload 600x600 size images.)</label>
                                <div class="form-group mb-4">
                                    <label>Long Description (use Redactor or any WYSIWYG html editor)</label>
                                    <textarea class="form-control summernote" name="description"  required="">{{$product->description}}</textarea>
                                </div>
                                <label class="form-group has-float-label mb-4">
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" placeholder="">
                                    <span>Meta Page Title</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <textarea class="form-control" name="meta_description" rows="4" required="">{{$product->meta_description}}</textarea>
                                    <span>Meta Page Description</span>
                                </label>
                                <label class="form-group has-float-label mb-1">
                                    <input name="page_slug" type="text" value="{{$product->page_slug}}" class="form-control" placeholder="">
                                    <span>Page URL</span>
                                </label>
                                <label class="tooltip-text mb-4">(Please use lowercase letters and user hyphen (-) instead of space e.g page-link)</label>
                                <div class="row mb-4">
                                    <div class="col-md-4 col-4">
                                        <label class="form-label font-weight-bold">No Label</label>
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" name="label" id="radioswitch1" type="radio" value="0">
                                            <label class="custom-switch-btn" for="radioswitch1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <label class="form-label font-weight-bold">New</label>
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" name="label" id="radioswitch2" type="radio" value="1">
                                            <label class="custom-switch-btn" for="radioswitch2"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <label class="form-label font-weight-bold">Featured</label>
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" name="label" id="radioswitch3" type="radio" value="2">
                                            <label class="custom-switch-btn" for="radioswitch3"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button class="btn btn-secondary" type="submit">Save Changes</button>
                                </div>
                                <div class="alert alert-warning mt-5" role="alert">* Please note, the new product is labelled as 'New' for a period of 10 days. Product marked 'Featured' remains unless changed</div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Current Image</h5>
                            <div class="img fullwidth lightbox"><a href="{{asset('images/uploads/products/'. $product->image)}}"><img src="{{asset('images/uploads/products/'. $product->image)}}"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function ($){
            $(document).ready(function (){
                $('#category_id').val('{{$product->category_id}}');
                $('input[name="label"][value="{{$product->label}}"]').prop('checked',true);
            });
        })(jQuery);
    </script>
@endsection
