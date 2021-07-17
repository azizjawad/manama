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
                            <form>
                                <div class="form-group mb-4">
                                    <div class="alert alert-warning my-4" role="alert">* Please note, If you add a new advertisement, it will auto-write the existing one and the new one will be shown. Please make sure you upload a 600x600 pixel image to maintain the website design.</div>
                                    <label class="form-group has-float-label">
                                        <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div>
                                        <input class="form-control" data-role="tagsinput" placeholder="" value="" style="display: none;">
                                        <span>Advertisement Name</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label mb-0">
                                        <input class="form-control" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                                    <label class="tooltip-text">(Only upload 600x600 size images.)</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control datepicker" placeholder="" value="">
                                        <span>Start Date</span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-group has-float-label">
                                        <input class="form-control datepicker" placeholder="" value="">
                                        <span>End Date</span>
                                    </label>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-secondary" type="submit">Save Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Current Advertisement</h5>
                            <div class="img fullwidth lightbox"><a href="img/events/Covid-Advisory.jpg"><img src="img/events/Covid-Advisory.jpg"></a></div>
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
                                        <td>06/05/201</td>
                                        <td>12/05/201</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
