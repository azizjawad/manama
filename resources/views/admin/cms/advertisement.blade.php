@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Add Advertisement</h5>
                            <form action="{{route('admin-save-advertisement')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <div class="alert alert-warning my-4" role="alert">* Please note, If you add a new advertisement, it will auto-write the existing one and the new one will be shown. Please make sure you upload a 600x600 pixel image to maintain the website design.</div>
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
                                    <label class="form-group has-float-label">
                                        <input required class="form-control" value="{{old('ads_name')}}" name="ads_name" data-role="tagsinput" placeholder="">
                                        <span>Advertisement Name</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-0">
                                        <input required class="form-control" name="ads_image" type="file"  accept=".jpg,.png"><span>Image Upload</span></label>
                                        <label class="tooltip-text">(Only upload 600x600 size images.)</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input required class="form-control datepicker" name="ads_start_date" placeholder="" value="{{old('ads_start_date')}}">
                                        <span>Start Date</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input required class="form-control datepicker" name="ads_end_date" placeholder="" value="{{old('ads_end_date')}}">
                                        <span>End Date</span>
                                    </label>
                                </div>
                                <div  class="form-group text-right">
                                    <button class="btn btn-secondary" type="submit">Save Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if(isset($result->ads_image))
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4 font-weight-bold">Current Advertisement</h5>
                                <div class="img fullwidth lightbox">
                                    <a href="{{asset('/images/homepage/advertisement/'.$result->ads_image)}}">
                                        <img src="{{asset('/images/homepage/advertisement/'.$result->ads_image)}}"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="font-weight-bold mb-4">Advertisement Duration</h5>
                                <div class="separator mb-0"></div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{date('d M Y', strtotime($result->start_date))}}</td>
                                            <td>{{date('d M Y', strtotime($result->end_date))}}</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
