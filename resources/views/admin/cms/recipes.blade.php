@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target="#addrecipe" class="btn btn-secondary mb-2 float-right adjust-margin-01">Add Recipe</a>
                            <h5 class="mb-4 font-weight-bold">Recipes Page CMS</h5>
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
                                    <table class="data-table data-table-recipes-list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 63.1944px;">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141.167px;">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 144.347px;">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Recipe Name: activate to sort column ascending" style="width: 359.778px;">Recipe Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 287.847px;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/classic-mojito-recipe.png"><img src="img/recipes/classic-mojito-recipe.png"></a></div>
                                            </td>
                                            <td>Classic Mojito</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">1</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/caramel-apple-pie-recipe.jpg"><img src="img/recipes/caramel-apple-pie-recipe.jpg"></a></div>
                                            </td>
                                            <td>Caramel Apple Pie</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">2</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/banana-nutella-recipe.png"><img src="img/recipes/banana-nutella-recipe.png"></a></div>
                                            </td>
                                            <td>Banana Nutella Milkshake</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">3</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/batched-spooked-punch-recipe.png"><img src="img/recipes/batched-spooked-punch-recipe.png"></a></div>
                                            </td>
                                            <td>Batched Spooked Punch</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">4</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/beach-bottom-punch-recipe.png"><img src="img/recipes/beach-bottom-punch-recipe.png"></a></div>
                                            </td>
                                            <td>Beach Bottom Punch</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">5</td>
                                            <td>20/04/2020</td>
                                            <td>
                                                <div class="img prd lightbox"><a href="img/recipes/blackcurrant-nourish-shake-recipe.jpg"><img src="img/recipes/blackcurrant-nourish-shake-recipe.jpg"></a></div>
                                            </td>
                                            <td>Blackcurrant Nourish Shake</td>
                                            <td class="text-center"><a href="CMS.Recipes.Edit.Single.html" class="las la-edit btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row view-pager">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div>
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
