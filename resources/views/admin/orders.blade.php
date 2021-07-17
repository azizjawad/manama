@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Order Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
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
                            <table class="data-table data-table-orders dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order No.: activate to sort column descending" style="width: 139.764px;">Order No.</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Order Date: activate to sort column ascending" style="width: 156.375px;">Order Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 212.319px;">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 120.542px;">Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Txn. ID: activate to sort column ascending" style="width: 227.639px;">Txn. ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 102.444px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 220.361px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><a href="javascript:void(0);" data-toggle="modal" data-target="#orderDetails" title="Manage Order">MFF4999</a></td>
                                    <td>09/04/2020</td>
                                    <td>John Smith</td>
                                    <td><i class="las la-rupee-sign"></i>1215.00</td>
                                    <td>ikrtrcyzf82ga1dk4ebz</td>
                                    <td>Packed</td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#orderDetails" class="las la-eye btn btn-secondary mx-1 my-3" title="Manage Order"></a>
                                        <a href="Pages.Misc.Invoice.Standalone.html" target="_blank" class="las la-print btn btn-secondary mx-1 my-3" title="Print Order"></a>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1"><a href="javascript:void(0);" data-toggle="modal" data-target="#orderDetails" title="Manage Order">MFF5000</a></td>
                                    <td>09/04/2020</td>
                                    <td>John Smith</td>
                                    <td><i class="las la-rupee-sign"></i>1215.00</td>
                                    <td>t5bj8eu98oqn4e5wrkd</td>
                                    <td>New</td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#orderDetails" class="las la-eye btn btn-secondary mx-1 my-3" title="Manage Order"></a>
                                        <a href="Pages.Misc.Invoice.Standalone.html" target="_blank" class="las la-print btn btn-secondary mx-1 my-3" title="Print Order"></a>
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
@endsection
