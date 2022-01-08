@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>CMS Management</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="{{route('admin-recipes')}}">Back to List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Recipe</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4 font-weight-bold">Edit Recipe</h5>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">?</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('admin-update-recipes') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="receipe_id" value="{{ $recipe->id }}">
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input data-role="tagsinput" value="{{ $recipe->rcp_name }}"
                                                class="form-control" name="rcp_name" type="text"> <span>Recipes
                                                Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Recipes Description<br>(use Redactor or any WYSIWYG html editor)</label>
                                        <textarea class="form-control summernote" name="rcp_description" rows="7"
                                            required>{{ $recipe->rcp_description }}</textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="alert alert-warning my-4" role="alert">* Adding video is optional, if
                                            you
                                            need to add it copy the video ID. If your video url is
                                            https://www.youtube.com/watch?v=IbOyBIS57C0 then copy & paste 'IbOyBIS57C0'
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input data-role="tagsinput" class="form-control"
                                                value="{{ $recipe->youtube_url }}" name="youtube_url" type="url">
                                            <span>Youtube Video (optional)</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-group has-float-label mb-1">
                                            <input class="form-control" name="rcp_display_img" type="file"
                                                accept=".jpg,.png"><span>Recipes Display Image</span></label>
                                        <label class="tooltip-text mb-4">(Only upload 600x600 size images.)</label>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-group has-float-label mb-1">
                                            <input class="form-control" name="rcp_homepage_img" type="file"
                                                accept=".jpg,.png"><span>Recipes Homepage Image</span></label>
                                        <label class="tooltip-text mb-4">(Only upload 900x600 (3:2) size images.)</label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input data-role="tagsinput" value="{{ $recipe->rcp_meta_title }}"
                                                class="form-control" name="rcp_meta_title" type="text"> <span>Meta Page
                                                Title</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <textarea class="form-control" name="rcp_meta_description"
                                                rows="4">{{ $recipe->rcp_meta_description }}</textarea>
                                            <span>Meta Page Description</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input data-role="tagsinput" class="form-control" name="rcp_page_slug"
                                                type="text" value="{{ $recipe->rcp_page_slug }}">
                                            <span>Page Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">Save Recipe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4 font-weight-bold">Current Recipes Display Image</h5>
                                <div class="img fullwidth lightbox"><a
                                        href="{{ asset('/images/recipe/display-img/' . $recipe->rcp_display_img) }}"
                                        target="_blank"><img
                                            src="{{ asset('/images/recipe/display-img/' . $recipe->rcp_display_img) }}" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4 font-weight-bold">Recipes Homepage Image</h5>
                                <div class="img fullwidth lightbox"><a
                                        href="{{ asset('/images/recipe/homepage/' . $recipe->rcp_homepage_img) }}"
                                        target="_blank"><img
                                            src="{{ asset('/images/recipe/homepage/' . $recipe->rcp_homepage_img) }}" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    @endsection
