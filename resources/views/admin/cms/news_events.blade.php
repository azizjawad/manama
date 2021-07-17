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
                                    <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#addupcommingevent" class="btn btn-secondary mb-2 float-right adjust-margin-01">Add Event</a>
                                    <h5 class="mb-4 font-weight-bold">News &amp; Events List</h5>
                                    <div class="alert alert-warning mt-2 mb-3" role="alert">
                                        * Please note, you can only add or delete an event. The event details entered here will can to used for filing the event gallery.
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                            <div class="row view-filter">
                                                <div class="col-sm-12">
                                                    <div class="float-right">
                                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                                            <label>
                                                                Items Per Page
                                                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="float-left">
                                                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="DataTables_Table_0"></label></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <table class="data-table data-table-events-list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Event Date: activate to sort column descending" style="width: 203.736px;">Event Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Event Image: activate to sort column ascending" style="width: 229.056px;">Event Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Event Name: activate to sort column ascending" style="width: 348.222px;">Event Name</th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 248.097px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">2 September 2017</td>
                                                    <td>
                                                        <div class="img lightbox"><a href="img/category/mojito.jpg"><img src="img/category/mojito.jpg"></a></div>
                                                    </td>
                                                    <td>Vitafoods Singapore 2017</td>
                                                    <td class="text-center"><a href="News.Events.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                        <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">5 December 2017</td>
                                                    <td>
                                                        <div class="img lightbox"><a href="img/category/mojito.jpg"><img src="img/category/mojito.jpg"></a></div>
                                                    </td>
                                                    <td>Ayush Expo Ahmedabad 2016</td>
                                                    <td class="text-center"><a href="News.Events.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                        <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="row view-pager">
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
                                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                            <ul class="pagination pagination-sm">
                                                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link prev"><i class="simple-icon-arrow-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link next"><i class="simple-icon-arrow-right"></i></a></li>
                                                            </ul>
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
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="addupcommingevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" style="opacity: 1; display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div><input class="form-control" data-role="tagsinput" placeholder="" value="" style="display: none;">
                                <span>Event Name</span>
                            </label>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control" type="file" accept=".jpg,.png"><span>Event Image Featured</span></label>
                            <label class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</label>
                        </div>
                        <div class="form-group mb-4">
                            <label>Recipes Description<br>(use Redactor or any WYSIWYG html editor)</label>
                            <textarea class="form-control" rows="7" required=""></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <div class="alert alert-warning my-4" role="alert">* Adding video is optional, if you need to add it copy the video ID. If your video url is https://www.youtube.com/watch?v=IbOyBIS57C0 then copy &amp; paste 'IbOyBIS57C0'</div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label">
                                <input class="form-control datepicker" placeholder="" value="">
                                <span>Event Date</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div><input data-role="tagsinput" type="text" value="" style="display: none;">
                                <span>Youtube Video (optional)</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div><input data-role="tagsinput" type="text" style="display: none;"> <span>Meta Page Title</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-4">
                                <textarea class="form-control" rows="4" required=""></textarea>
                                <span>Meta Page Description</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div><input data-role="tagsinput" type="text" value="" style="display: none;">
                                <span>Page URL</span>
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
