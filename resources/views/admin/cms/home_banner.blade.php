@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Homepage Banners</h5>
                        <div class="alert alert-warning mb-5 mr-md-5" role="alert">* Please note, you can upload upto 8 banners. Banners are numbered in ascending order. If you upload an image over "Banner 01", the image will be shown first, if you upload over a current image, it will be replaced. If you delete "Banner 01", "Banner 02" will be shown first.</div>
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
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form method="post" action="{{route('admin-save-home-banner')}}" enctype="multipart/form-data" name="home-page-banners">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" required name="banner_location" class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;" value="">Select Banner Location</option>
                                                <option value="1">Banner 01</option>
                                                <option value="2">Banner 02</option>
                                                <option value="3">Banner 03</option>
                                                <option value="4">Banner 04</option>
                                                <option value="5">Banner 05</option>
                                                <option value="6">Banner 06</option>
                                                <option value="7">Banner 07</option>
                                                <option value="8">Banner 08</option>
                                            </select>
                                            <span>Banner Location</span>
                                        </label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input class="form-control" required name="image" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                                        <label class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</label>
                                    </div>
                                    <div class="form-group text-right">
                                        <input class="btn btn-secondary" type="submit" value="Add Image"/>
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
                                            <th>Banner Location</th>
                                            <th>Last Updated on</th>
                                            <th class="text-center">Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($banners as $banner)
                                            <tr>
                                                <td>{{$loop->index}}</td>
                                                <td><div class="img lightbox">
                                                        <a href="{{asset('images/homepage/'. $banner->image_path)}}">
                                                            <img src="{{asset('images/homepage/'. $banner->image_path)}}"/>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Banner 0{{$banner->banner_location}}</td>
                                                <td>{{$banner->created_at}}</td>
                                                <td class="text-center">
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
    </div>
@endsection
