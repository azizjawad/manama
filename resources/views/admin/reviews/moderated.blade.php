@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Reviews</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Moderated Reviews</h5>
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
                                        <table class="data-table data-table-reviews dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Review Date: activate to sort column descending" style="width: 163.972px;">Review Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 181.5px;">Product Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 201.611px;">Customer Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Customer Rating: activate to sort column ascending" style="width: 209.944px;">Customer Rating</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 209.306px;">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reviews as $key)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$key->created_at}}</td>
                                                    <td>{{$key->listing_name}}</td>
                                                    <td>{{$key->name}}</td>
                                                    <td>{{$key->rating}}</td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0)" data-review-id="{{$key->id}}" class="las la-eye btn btn-secondary mx-1 show_review_modal"></a>
                                                        {{--                                                        <a href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1"></a>--}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row view-pager">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
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
    <div class="modal fade bd-example-modal-sm" id="reviewWindow" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Toggle Review Visibility</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mb-5" role="alert">* You can only Publish or Unpublish Comments from here. To delete, use Delete Button in the list</div>
                    <div class="review_data">
                        <div class="row  text-left">
                            <div class="col-md-6 col-12">
                                <p><b>Review Date:</b><br>20/04/2020</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Customer Name:</b><br>John Doe Smith</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Customer Email:</b><br>john.dsmith@gmail.com</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Product Reviewed:</b><br>Original Mojito</p>
                            </div>
                        </div>
                        <div class="row  text-justify">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label class="d-block">Product Rated</label>
                                    <select class="rating" data-current-rating="4" data-readonly="true">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <p><b>Customer Comment:</b><br>Kada and Bangles have always been an irreplaceable part of a woman's jewellery collection. Whether she is a young and playful teenager or a settled down grandmother, a woman looks forward to on her wrists.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row  text-center">
                        <div class="col-12">
                            <label class="form-label font-weight-bold" id="switch5-label">Publish Review</label>
                            <div class="custom-switch custom-switch-primary-inverse mb-2">
                                <input class="custom-switch-input" value="1" name="review_status" id="switch5" type="checkbox">
                                <label class="custom-switch-btn" for="switch5"></label>
                            </div>
                            <div class="form-group text-center mt-3">
                                <input type="hidden" name="review_id" value="">
                                <button type="button" class="btn btn-secondary update_review_status">Update Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.update_review_status').click(function (){
            let status = $('input[name="review_status"]:checked').length;
            let review_id = $('[name="review_id"]').val();
            console.log(status,review_id)
            if (review_id != ''){
                $.ajax({
                    url: "{{route('update_review')}}",
                    data: {review_id:review_id, status: status},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:"post",
                    success: (res) => {
                        if (res.status === true){
                            success_notification();
                            setTimeout(() => {
                                location.reload();
                            }, 2000)
                        }
                    }
                });
            }
        })
        $('.show_review_modal').click(function (){
            let review_id = $(this).data('review-id');
            $.ajax({
                url: "{{route('get-reviews-product')}}/"+review_id,
                success: function (res) {
                    if (res.status === true) {
                        let data = res.data;
                        $('[name="review_id"]').val(data.id);
                        $('input[name="review_status"]').prop('checked',(data.status == 1))

                        let review_html = `<div class="row text-left">
                            <div class="col-md-6 col-12">
                                <p><b>Review Date:</b><br>${new Date(data.created_at)}</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Customer Name:</b><br>${data.name}</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Customer Email:</b><br>${data.email}</p>
                            </div>
                            <div class="col-md-6 col-12">
                                <p><b>Product Reviewed:</b><br>${data.listing_name}</p>
                            </div>
                        </div>
                        <div class="row  text-justify">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label class="d-block">Product Rated</label>
                                    <select class="rating" data-current-rating="${data.rating}" data-readonly="true">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <p><b>Customer Comment:</b><br>${data.comment}</p>
                            </div>
                        </div>`;
                        $('.review_data').html(review_html);
                        $('#reviewWindow').modal('show');
                        $(".rating").each(function () {
                            var current = $(this).data("currentRating");
                            var readonly = $(this).data("readonly");
                            $(this).barrating({
                                theme: "bootstrap-stars",
                                initialRating: current,
                                readonly: readonly
                            });
                        });
                    }


                }
            })
        });
    </script>
@endsection
