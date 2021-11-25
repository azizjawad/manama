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
                                            <h5 class="mb-4 font-weight-bold">News & Events Gallery</h5>
                                            <div class="alert alert-warning mt-2 mb-3" role="alert">
                                                * Please note, to add gallery images for an event, please click on the <i class="las la-images lead"></i> next to it from the list below..</div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="mb-4 font-weight-bold">All Events List</h5>
                                    <div class="separator mb-5"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="data-table data-table-events-gallery-list">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Event Name</th>
                                                        <th>Event Date</th>
                                                        <th class="text-center">Actions</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Vitafoods Singapore 2017</td>
                                                        <td>6 September 2017</td>
                                                        <td class="text-center">
                                                            <a href="All.Events.Single.Image.Gallery.html" class="las la-images btn btn-secondary mx-1"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Ayush Expo Ahmedabad 2016</td>
                                                        <td>9 December 2016</td>
                                                        <td class="text-center">
                                                            <a href="All.Events.Single.Image.Gallery.html" class="las la-images btn btn-secondary mx-1"></a></td>
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
                </div>
        </div>
    </div>
@endsection
