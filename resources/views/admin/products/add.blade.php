@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Products</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Add New Product</h5>
                        <form>
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-4">
                                    <select id="CategoryList" class="form-control select2-single select2-hidden-accessible" data-width="100%" tabindex="-1" aria-hidden="true">
                                        <option label="&nbsp;">Select Category</option>
                                        <option value="1">Mojitos</option>
                                        <option value="2">Crushes</option>
                                        <option value="3">Fruit Twists</option>
                                        <option value="4">Ice Tea</option>
                                        <option value="5">Jams</option>
                                        <option value="6">Sauces</option>
                                        <option value="7">Sweet Chilli Chutneys</option>
                                        <option value="8">Fruit Fillings</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-control" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-CategoryList-container"><span class="select2-selection__rendered" id="select2-CategoryList-container" title="Select Category">Select Category</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <span>Category Name</span>
                                </label>
                            </div>
                            <label class="form-group has-float-label mb-4">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div>
                                <input data-role="tagsinput" type="text" style="display: none;"> <span>Products Name</span>
                            </label>
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                            <label class="tooltip-text mb-4">(Only upload 600x600 size images.)</label>
                            <div class="form-group mb-4">
                                <label>Long Description (use Redactor or any WYSIWYG html editor)</label>
                                <textarea class="form-control" rows="7" required=""></textarea>
                            </div>
                            <label class="form-group has-float-label mb-4">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div>
                                <input data-role="tagsinput" type="text" style="display: none;">
                                <span>Meta Page Title</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <textarea class="form-control" rows="4" required=""></textarea>
                                <span>Meta Page Description</span>
                            </label>
                            <label class="form-group has-float-label mb-1">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div>
                                <input data-role="tagsinput" type="text" value="" style="display: none;">
                                <span>Page URL</span>
                            </label>
                            <label class="tooltip-text mb-4">(Please use lowercase letters and user hyphen (-) instead of space e.g page-link)</label>
                            <div class="row mb-4">
                                <div class="col-md-4 col-4">
                                    <label class="form-label font-weight-bold">No Label</label>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" name="radioswitch" id="radioswitch1" type="radio" value="option1" checked="">
                                        <label class="custom-switch-btn" for="radioswitch1"></label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <label class="form-label font-weight-bold">New</label>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" name="radioswitch" id="radioswitch2" type="radio" value="option2">
                                        <label class="custom-switch-btn" for="radioswitch2"></label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <label class="form-label font-weight-bold">Featured</label>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" name="radioswitch" id="radioswitch3" type="radio" value="option3">
                                        <label class="custom-switch-btn" for="radioswitch3"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-secondary" type="submit">Add Product</button>
                            </div>
                            <div class="alert alert-warning mt-5" role="alert">* Please note, the new product is labelled as 'New' for a period of 10 days. Product marked 'Featured' remains unless changed</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
