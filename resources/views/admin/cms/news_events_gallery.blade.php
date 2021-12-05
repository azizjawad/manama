@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin-news-events-list')}}">Back to the List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Photo Gallery</li>
                </ol>
            </nav>
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
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-4 font-weight-bold">News & Events Gallery</h5>
                                    <div class="alert alert-warning mt-2 mb-3" role="alert">
                                        * Please note, to add gallery images for an event, please click on the
                                        <i class="las la-images lead"></i> next to it from the list below..
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-10 col-12">
                                    <h5 class="mb-4 font-weight-bold">{{$event->event_name}} | Photo Gallery
                                    </h5>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="d-block text-right mb-4">
                                        <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static"
                                           data-target="#addeventphoto" class="btn btn-secondary m-1">Add
                                            Photo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="separator mb-5"></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="data-table data-table-event-gallery">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Image Caption</th>
                                                <th>Uploaded on</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($event->attach_gallery as $gallery)
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="img lightbox">
                                                        <a href="{{asset('images/news-events/gallery/'.$gallery->image_name)}}">
                                                            <img src="{{asset('images/news-events/gallery/'.$gallery->image_name)}}"/>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{$gallery->image_caption ?? '-'}}</td>
                                                <td>{{date('d M Y', strtotime($gallery->created_at))}}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)"
                                                       class="las la-trash-alt btn btn-secondary mx-1">
                                                    </a>
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
    </div>
    <div class="modal fade modal-right" id="addeventphoto" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Add Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <div class="alert alert-warning my-4" role="alert">* Please note, you can only upload or delete
                            photos.
                        </div>
                        <p><b>Event Name : {{$event->event_name}}</b></p>
                    </div>
                    <form action="{{route('admin-save-news-events-gallery')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control" required name="image" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                            <label class="tooltip-text mb-4">(Only upload images of upto 1.5MB)</label>
                        </div>
                        <div class="form-group mb-4">
                            <div class="alert alert-warning my-4" role="alert">* Please note, adding caption is
                                optional, if
                                you keep it blank, it will show the Event Name.
                            </div>
                            <label class="form-group has-float-label">
                                <input class="form-control" name="image_caption" data-role="tagsinput">
                                <span>Image Caption</span>
                            </label>
                        </div>
                        <div class="form-group text-right">
                            <input type="hidden" name="news_events_id" value="{{Request::segment(4)}}">
                            <button class="btn btn-secondary" type="submit">Add Image</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
