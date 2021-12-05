@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin-news-events')}}">Back to List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Recipe</li>
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
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Edit Event</h5>
                            <form action="{{route('admin-save-news-events')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control" data-role="tagsinput" placeholder="" name="event_name" value="{{$event->event_name}}">
                                        <span>Event Name</span>
                                    </label>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-group has-float-label mb-1">
                                        <input class="form-control" name="event_image" type="file" accept=".jpg,.png"><span>Event Image Featured</span></label>
                                    <label class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Recipes Description<br>(use Redactor or any WYSIWYG html editor)</label>
                                    <textarea class="form-control" rows="7" name="event_description" required>{{$event->event_description}}</textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="alert alert-warning my-4" role="alert">* Adding video is optional, if you need to add it copy the video ID. If your video url is https://www.youtube.com/watch?v=IbOyBIS57C0 then copy & paste 'IbOyBIS57C0'</div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control datepicker" placeholder="" name="event_end_date" value="{{$event->event_end_date}}">
                                        <span>Event Date</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-1">
                                        <input data-role="tagsinput" class="form-control" type="url" name="event_youtube_url" value="{{$event->event_youtube_url}}">
                                        <span>Youtube Video (optional)</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-1">
                                        <input data-role="tagsinput" class="form-control" type="text"  name="event_meta_title" value="{{$event->event_meta_title}}"> <span>Meta Page Title</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-4">
                                        <textarea class="form-control" rows="4" name="event_meta_description" required>{{$event->event_meta_description}}</textarea>
                                        <span>Meta Page Description</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-1">
                                        <input data-role="tagsinput" class="form-control" type="text" name="event_page_slug" value="{{$event->event_page_slug}}">
                                        <span>Page Slug</span>
                                    </label>
                                </div>

                                <div class="form-group text-right">
                                    <input type="hidden" name="event_news_id" value="{{Request::segment(4)}}">
                                    <button class="btn btn-secondary" type="submit">Save Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Current Event Display Image</h5>
                            <div class="img fullwidth lightbox"><a href="{{asset('images/news-events/'.$event->event_featured_img)}}"><img src="{{asset('images/news-events/'.$event->event_featured_img)}}"/></a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
