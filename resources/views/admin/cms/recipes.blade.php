@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static"
                               data-target="#addrecipe" class="btn btn-secondary mb-2 float-right adjust-margin-01">Add
                                Recipe</a>
                            <h5 class="mb-4 font-weight-bold">Recipes Page CMS</h5>
                            <div class="separator mb-5"></div>
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
                            <div class="table-responsive">
                                <table class="data-table data-table-recipes-list">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Recipe Name</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recipes as $recipe)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$recipe->rcp_name}}</td>
                                        <td>
                                            <div class="img prd lightbox">
                                                <a href="{{asset('/images/recipe/display-img/'.$recipe->rcp_display_img)}}">
                                                    <img src="{{asset('/images/recipe/display-img/'.$recipe->rcp_display_img)}}"/>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{$recipe->created_at}}</td>
                                        <td class="text-center">
                                            <a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
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
        <div class="modal fade modal-right" id="addrecipe" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalRight" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Add Recipe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin-save-recipes')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-1">
                                    <input data-role="tagsinput" value="{{old('rcp_name')}}" class="form-control" name="rcp_name" type="text"> <span>Recipes Name</span>
                                </label>
                            </div>
                            <div class="form-group mb-4">
                                <label>Recipes Description<br>(use Redactor or any WYSIWYG html editor)</label>
                                <textarea class="form-control" name="rcp_description" rows="7" required>{{old('rcp_description')}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <div class="alert alert-warning my-4" role="alert">* Adding video is optional, if you
                                    need to add it copy the video ID. If your video url is
                                    https://www.youtube.com/watch?v=IbOyBIS57C0 then copy & paste 'IbOyBIS57C0'
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-1">
                                    <input data-role="tagsinput" class="form-control" value="{{old('youtube_url')}}" name="youtube_url" type="url" >
                                    <span>Youtube Video (optional)</span>
                                </label>
                            </div>
                            <div class="form-group mb-0">
                                <label class="form-group has-float-label mb-1">
                                    <input required class="form-control" name="rcp_display_img" type="file"
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
                                    <input data-role="tagsinput" value="{{old('rcp_meta_title')}}" class="form-control" name="rcp_meta_title" type="text"> <span>Meta Page Title</span>
                                </label>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-4">
                                    <textarea class="form-control" name="rcp_meta_description" rows="4"
                                              required>{{old('rcp_meta_description')}}</textarea>
                                    <span>Meta Page Description</span>
                                </label>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-1">
                                    <input data-role="tagsinput" class="form-control" name="rcp_page_slug" type="text" value="{{old('rcp_page_slug')}}">
                                    <span>Page Name</span>
                                </label>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-secondary" type="submit">Add Recipe</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection
