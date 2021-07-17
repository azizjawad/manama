@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Category</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="Category.View.List.html">Back to List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Cateogry</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Home Category Image</h5>
                        <div class="alert alert-warning mb-5 mr-md-5" role="alert">* Please note, If you upload a new image for the category, the old image will be deleted. Please make sure you upload a 770x788 pixel image to maintain the website design.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" class="form-control select2-single select2-hidden-accessible" data-width="100%" tabindex="-1" aria-hidden="true">
                                                <option label="&nbsp;">Select Category</option>
                                                <option value="1">Mojitos</option>
                                                <option value="2">Crushes</option>
                                                <option value="3">Fruit Twists</option>
                                                <option value="4">Ice Tea</option>
                                                <option value="5">Jams</option>
                                                <option value="6">Sauces</option>
                                                <option value="7">Sweet Chilli Chutneys</option>
                                                <option value="8">Fruit Fillings</option>
                                            </select>
                                            <span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-control" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-CategoryList-container"><span class="select2-selection__rendered" id="select2-CategoryList-container" title="Select Category">Select Category</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <span>Category Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-1">
                                            <input class="form-control" type="file" accept=".jpg,.png"><span>Image Upload</span></label>
                                        <label class="tooltip-text mb-4">(Only upload 1920x1080 size images.)</label>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">Add Image</button>
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
                                        <table class="data-table data-table-category dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 56.6528px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 245.486px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Category Name: activate to sort column ascending" style="width: 260.75px;">Category Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Updated on: activate to sort column ascending" style="width: 262.194px;">Last Updated on</th>
                                                <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 141.25px;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/mojito.jpg"><img src="img/category/mojito.jpg"></a></div>
                                                </td>
                                                <td>Mojitos</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/crushes.jpg"><img src="img/category/crushes.jpg"></a></div>
                                                </td>
                                                <td>Crushes</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">3</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/fruits-twist.jpg"><img src="img/category/fruits-twist.jpg"></a></div>
                                                </td>
                                                <td>Fruit Twists</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">4</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/ice-tea.jpg"><img src="img/category/ice-tea.jpg"></a></div>
                                                </td>
                                                <td>Ice Tea</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">5</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/jams.jpg"><img src="img/category/jams.jpg"></a></div>
                                                </td>
                                                <td>Jams</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">5</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/chutney.jpg"><img src="img/category/chutney.jpg"></a></div>
                                                </td>
                                                <td>Sweet Chilli Chutneys</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">6</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/sauces.jpg"><img src="img/category/sauces.jpg"></a></div>
                                                </td>
                                                <td>Sauces</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">6</td>
                                                <td>
                                                    <div class="img lightbox"><a href="img/category/fruits-twist.jpg"><img src="img/category/fruits-twist.jpg"></a></div>
                                                </td>
                                                <td>Fruit Fillings</td>
                                                <td>20/04/2020</td>
                                                <td class="text-center"><a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row view-pager">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 8 of 8 entries</div>
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
