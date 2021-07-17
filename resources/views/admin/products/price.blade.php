@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Product Settings</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#addpriceentry" class="btn btn-secondary mb-2 float-right adjust-margin-01">Add Price</a>
                            <h5 class="mb-4 font-weight-bold">Prie List</h5>
                            <div class="separator mb-5"></div>
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
                                    <table class="data-table data-table-prdprice dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 48.4583px;">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 114.222px;">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Listing Name: activate to sort column ascending" style="width: 336.139px;">Listing Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Pkg. Wt.: activate to sort column ascending" style="width: 139.153px;">Pkg. Wt.</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Cost: activate to sort column ascending" style="width: 87.5972px;">Cost</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 237.986px;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Whole Strawberry Crush 5L</td>
                                            <td>5L</td>
                                            <td><i class="las la-rupee-sign"></i>1350</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Whole Strawberry Crush 1L</td>
                                            <td>1L</td>
                                            <td><i class="las la-rupee-sign"></i>300</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>White Rose Fruit Twist 750ml</td>
                                            <td>750ml</td>
                                            <td><i class="las la-rupee-sign"></i>160</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Watermelon Fruit Twist 750ml</td>
                                            <td>750ml</td>
                                            <td><i class="las la-rupee-sign"></i>265</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Watermelon Crush 750 ml</td>
                                            <td>750ml</td>
                                            <td><i class="las la-rupee-sign"></i>160</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Vanilla Fruit Twist 750ml</td>
                                            <td>750ml</td>
                                            <td><i class="las la-rupee-sign"></i>185</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Tender Coconut 750ml</td>
                                            <td>750ml</td>
                                            <td><i class="las la-rupee-sign"></i>295</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Strawberry Mojito 500ml</td>
                                            <td>500ml</td>
                                            <td><i class="las la-rupee-sign"></i>215</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Strawberry Jam 500gms</td>
                                            <td>500gms</td>
                                            <td><i class="las la-rupee-sign"></i>100</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>Strawberry Jam 1Kg</td>
                                            <td>1Kg</td>
                                            <td><i class="las la-rupee-sign"></i>190.00</td>
                                            <td class="text-center"><a href="Price.List.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row view-pager">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div>
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
@endsection
