@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>eCommerce Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Volume Discount Manager</h5>
                        <div class="alert alert-warning mb-5 mr-md-5" role="alert">* Please note you have 5 slabs to manage Cart Discount. Each slab can be set to different cart value(CV) and discount percentage(DP) to go with it. If you delete an entry the CV & DP resets to '0'. </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form method="post" action="{{route('admin-volume-discount-manager-update')}}" name="set-discount">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <select id="CategoryList" name="id" class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">Select Slab</option>
                                                @foreach($data as $key)
                                                    <option value="{{$key->id}}">Slab {{$key->id}}</option>
                                                @endforeach
                                            </select>
                                            <span>Category Name</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <input required class="form-control" name="cart_price" data-role="tagsinput" type="number" />
                                            <span>Set Cart Price</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <input required class="form-control" name="discount" data-role="tagsinput" type="number" />
                                            <span>Set Discount Percentage</span>
                                        </label>
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">Set Vol. Discount</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-category">
                                        <thead>
                                        <tr>
                                            <th>Last Updated on</th>
                                            <th>Slab Unit</th>
                                            <th>Cart Value</th>
                                            <th>Discount Percentage</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key)
                                            <tr>
                                                <td>{{date('d/m/Y', strtotime($key->created_at))}}</td>
                                                <td>Slab {{$key->id}}</td>
                                                <td><i class="las la-rupee-sign"></i> {{$key->cart_price}}</td>
                                                <td>{{$key->discount}}%</td>
                                                <td class="text-center"><a href="javascript:void(0)" data-id="{{$key->id}}" class="delete_discounts las la-trash-alt btn btn-secondary mx-1"></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            $(document).ready(function (){
               $('.delete_discounts').click(function (){
                   Swal.fire({
                       title: 'Are you sure?',
                       text: `You want to delete the volume discount?`,
                       icon: 'warning',
                       showCancelButton: true,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Yes, delete it!'
                   }).then((result) => {
                       if (result.isConfirmed) {
                          let id = $(this).data('id');
                          let data = {
                              delete_discounts: true,
                              id: id,
                          }
                          $.ajax({
                              url: "{{route('admin-volume-discount-manager-update')}}",
                              type: "get",
                              data: data,
                              success: function (res){
                                  location.reload();
                              }
                          });
                       }
                   });
               });
            });
        </script>
@endsection
