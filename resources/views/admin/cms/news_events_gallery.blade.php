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
                                    <h5 class="mb-4 font-weight-bold">News &amp; Events Gallery</h5>
                                    <div class="alert alert-warning mt-2 mb-3" role="alert">
                                        * Please note, to add gallery images for an event, please click on the <i class="las la-images lead"></i> next to it from the list below..
                                    </div>
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
                                            <table class="data-table data-table-events-gallery-list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 79.75px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Event Name: activate to sort column ascending" style="width: 478.417px;">Event Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Event Date: activate to sort column ascending" style="width: 284.333px;">Event Date</th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 186.611px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">1</td>
                                                    <td>Vitafoods Singapore 2017</td>
                                                    <td>6 September 2017</td>
                                                    <td class="text-center"><a href="All.Events.Single.Image.Gallery.html" class="las la-images btn btn-secondary mx-1"></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">2</td>
                                                    <td>Ayush Expo Ahmedabad 2016</td>
                                                    <td>9 December 2016</td>
                                                    <td class="text-center"><a href="All.Events.Single.Image.Gallery.html" class="las la-images btn btn-secondary mx-1"></a></td>
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
@endsection
