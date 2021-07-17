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
                        <div class="alert alert-warning mb-5" role="alert">* Select the customer you want to view the wishlist of.</div>
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
                                        <button class="btn btn-secondary" type="submit">List Wishlist</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                        <table class="data-table data-table-permission dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 43.2222px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Added on: activate to sort column ascending" style="width: 139.347px;">Added on</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 107.153px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 191.181px;">Product Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Category Name: activate to sort column ascending" style="width: 206.403px;">Category Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Label: activate to sort column ascending" style="width: 98.625px;">Label</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 114.847px;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>20/04/2020</td>
                                                <td>
                                                    <div class="img prd lightbox"><a href="img/products/original-mojito.png"><img src="img/products/original-mojito.png"></a></div>
                                                </td>
                                                <td>Original</td>
                                                <td>Mojitos</td>
                                                <td><span class="badge badge-pill badge-primary m-1">Bestseller</span></td>
                                                <td class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#productWishlist" class="las la-eye btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">1</td>
                                                <td>20/04/2020</td>
                                                <td>
                                                    <div class="img prd lightbox"><a href="img/products/lime-mint-mojito.png"><img src="img/products/lime-mint-mojito.png"></a></div>
                                                </td>
                                                <td>Lime &amp; Mint</td>
                                                <td>Mojitos</td>
                                                <td><span class="badge badge-pill badge-primary m-1">Featured</span></td>
                                                <td class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#productWishlist" class="las la-eye btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>20/04/2020</td>
                                                <td>
                                                    <div class="img prd lightbox"><a href="img/products/raspberry-mojito.png"><img src="img/products/raspberry-mojito.png"></a></div>
                                                </td>
                                                <td>Raspberry</td>
                                                <td>Mojitoss</td>
                                                <td><span class="badge badge-pill badge-primary m-1">New</span></td>
                                                <td class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#productWishlist" class="las la-eye btn btn-secondary mx-1"></a></td>
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
@endsection
