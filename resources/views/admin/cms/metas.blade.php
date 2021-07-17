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
                            <h5 class="mb-4 font-weight-bold">Static Pages Meta Tags</h5>
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
                                            <table class="data-table data-table-static-pages dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 47.5694px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Static Pages: activate to sort column ascending" style="width: 181.792px;">Static Pages</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Page Link: activate to sort column ascending" style="width: 149.778px;">Page Link</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Page Title: activate to sort column ascending" style="width: 493.819px;">Page Title</th>
                                                    <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 123.375px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">1</td>
                                                    <td>Who We Are</td>
                                                    <td><a href="https://www.manamatoppings.com/aboutus" target="_blank">/aboutus</a></td>
                                                    <td>Manama Toppings - Always Something New</td>
                                                    <td class="text-center"><a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">2</td>
                                                    <td>Our Distributors</td>
                                                    <td><a href="https://www.manamatoppings.com/distributors" target="_blank">/distributors</a></td>
                                                    <td>Manama Toppings - Always Something New</td>
                                                    <td class="text-center"><a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">2</td>
                                                    <td>Contact Us</td>
                                                    <td><a href="https://www.manamatoppings.com/contactus" target="_blank">/contactus</a></td>
                                                    <td>Manama Toppings - Always Something New</td>
                                                    <td class="text-center"><a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="row view-pager">
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
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
