@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Customers Wishlist</h5>
                        <div class="alert alert-warning mb-5" role="alert">* Select the customer you want to view the orders of.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" class="form-control select2-single select2-hidden-accessible" data-width="100%" tabindex="-1" aria-hidden="true">
                                                <option label="&nbsp;">Select Customer</option>
                                                <option value="1">John Smith</option>
                                                <option value="2">Bob Wayne</option>
                                                <option value="3">Eric Power</option>
                                                <option value="4">Fred Rush</option>
                                                <option value="5">Sarah Carter</option>
                                            </select>
                                            <span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-control" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-CategoryList-container"><span class="select2-selection__rendered" id="select2-CategoryList-container" title="Select Customer">Select Customer</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <span>Customer Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">List Orders</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                        <p class="text-center font-weight-bold pt-1 pb-3 m-0">Displaying Orders for "John Smith"</p>
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
                                        <table class="data-table data-table-customer-orders dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order No.: activate to sort column descending" style="width: 90.0139px;">Order No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Order Date: activate to sort column ascending" style="width: 101.792px;">Order Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Order Desc: activate to sort column ascending" style="width: 269.583px;">Order Desc</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 76.3889px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Txn. ID: activate to sort column ascending" style="width: 152.292px;">Txn. ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 63.5556px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 147.153px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><a href="javascript:void(0);" data-toggle="modal" data-target="#orderDetails" title="Manage Order">MFF4999</a></td>
                                                <td>09/04/2020</td>
                                                <td>Original Mojito 750ml and more</td>
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
                                                <td>Lime and Mint Mojito 750ml and more</td>
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
            </div>
        </div>
    </div>
@endsection
