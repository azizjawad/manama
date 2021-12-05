@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a href="javascript:void(0);" href="javascript:void(0);" data-toggle="modal"
                                       data-backdrop="static" data-target="#addupcommingevent"
                                       class="btn btn-secondary mb-2 float-right adjust-margin-01">Add Event</a>
                                    <h5 class="mb-4 font-weight-bold">News & Events List</h5>
                                    <div class="alert alert-warning mt-2 mb-3" role="alert">
                                        * Please note, you can only add or delete an event. The event details entered
                                        here will can to used for filing the event gallery.
                                        Just select the Event Name there and add photos for gallery.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Events List</h5>
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
                                    <div class="table-responsive">
                                        <table class="data-table data-table-events-list">
                                            <thead>
                                            <tr>
                                                <th>Event Name</th>
                                                <th>Event End Date</th>
                                                <th>Event Image</th>
                                                <th class="text-center">Actions</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($result as $key)
                                            <tr>
                                                <td>{{$key->event_name}}</td>
                                                <td>{{date('d M Y', strtotime($key->event_end_date))}}</td>
                                                <td>
                                                    <div class="img lightbox">
                                                        <a href="{{asset('images/news-events/'.$key->event_featured_img)}}">
                                                            <img src="{{asset('images/news-events/'.$key->event_featured_img)}}"/>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('admin-news-events-edit', $key->id)}}" class="las la-edit btn btn-secondary mx-1"></a>
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
    </div>
    <div class="modal fade modal-right" id="addupcommingevent" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" style="opacity: 1; display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin-save-news-events')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label">
                                <input class="form-control" name="event_name" data-role="tagsinput" placeholder="" value="{{old('event_name')}}">
                                <span>Event Name</span>
                            </label>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control" name="event_image" type="file" accept=".jpg,.png"><span>Event Image Featured</span></label>
                            <label class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</label>
                        </div>
                        <div class="form-group mb-4">
                            <label>Event Description<br>(use Redactor or any WYSIWYG html editor)</label>
                            <textarea class="form-control" rows="7" name="event_description" required>{{old('event_description')}}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label">
                                <input class="form-control datepicker" name="event_end_date" placeholder="" value="{{old('event_end_date')}}">
                                <span>Event Date</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" class="form-control" type="url" name="event_youtube_url" value="{{old('event_youtube_url')}}">
                                <span>Youtube Video (optional)</span>
                            </label>
                            <div class="form-group mb-4">
                                <div class="alert alert-warning my-4" role="alert">* Adding video is optional, if you need to add it copy the video ID. If your video url is https://www.youtube.com/watch?v=IbOyBIS57C0 then copy & paste 'IbOyBIS57C0'</div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" class="form-control" name="event_meta_title" value="{{old('event_meta_title')}}" type="text"> <span>Meta Page Title</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-4">
                                <textarea class="form-control" name="event_meta_description" rows="4" required>{{old('event_meta_description')}}</textarea>
                                <span>Meta Page Description</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input data-role="tagsinput" class="form-control" name="event_page_slug" type="text" value="{{old('event_page_slug')}}">
                                <span>Page Name</span>
                            </label>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-secondary" type="submit">Save Entry</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
