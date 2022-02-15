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
                        <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static"
                           data-target="#createcoupon" class="btn btn-secondary mb-2 float-right adjust-margin-01">Create
                            Coupon</a>
                        <h5 class="mb-4 font-weight-bold">Discount Manager</h5>
                        <div class="separator mb-5"></div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">?</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-disman-list">
                                        <thead>
                                        <tr>
                                            <th>Issued On</th>
                                            <th>Valid Upto</th>
                                            <th>Type</th>
                                            <th>Usage</th>
                                            <th>Discount Code</th>
                                            <th>Value</th>
                                            <th>Count</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coupons as $key)
                                        <tr>
                                            <td>{{date('Y M d', strtotime($key->created_at))}}</td>
                                            <td>{{date('Y M d', strtotime($key->coupon_validity))}}</td>
                                            <td>{{($key->product_type == 1) ? 'Product Only' : 'Shipping Only'}}</td>
                                            <td>{{($key->coupon_use == 1) ? 'Single use' : 'Multi use'}}</td>
                                            <td>{{$key->coupon_code}}</td>
                                            <td>{{$key->coupon_value}}</td>
                                            <td>-</td>
                                            <td class="text-center">
{{--                                                <a href="Discount.Coupon.Details.html"--}}
{{--                                                   class="las la-eye btn btn-secondary mx-1"></a>--}}
                                                <a href="javascript:void(0)"
                                                   class="las la-trash-alt btn btn-secondary mx-1"></a></td>
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
    </div>
    <div class="modal fade modal-right" id="createcoupon" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Create Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin-save-coupon')}}" method="post">
                        @csrf
                        <div class="alert alert-warning mb-3" role="alert">* When creating coupon, please remember to
                            set Validity Date, assign Product Range & Value For which is either for Shipping or
                            Products.
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-4">
                                <select id="CategoryList" name="product_type" class="form-control select2-single" data-width="100%">
                                    <option label="&nbsp;">Coupon Type</option>
                                    <option value="1">Products Only</option>
                                    <option value="2">Shipping Only</option>
                                </select>
                                <span>Coupon Type</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control text-uppercase" name="coupon_code" data-role="tagsinput" type="text">
                                <span>Coupon Code</span>
                            </label>
                            <label class="tooltip-text mb-0">Coupon Code should not be longer then 10 characters.<br>Use
                                Capital Letters</label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-4">
                                <select id="CategoryList" name="coupon_use" class="form-control select2-single" data-width="100%">
                                    <option label="&nbsp;">Usage Type</option>
                                    <option value="1">Single Use</option>
                                    <option value="2">Multi Use</option>
                                </select>
                                <span>Coupon Type</span>
                            </label>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-group has-float-label mb-1">
                                <input class="form-control text-uppercase" name="coupon_value" data-role="tagsinput" type="text">
                                <span>Coupon Value</span>
                            </label>
                            <label class="tooltip-text mb-0">Use % if you want to give percentile discounts.<br>If you
                                just use number it will deduct that amount.</label>
                        </div>
                        <label class="form-group has-float-label mb-1">
                            <input type="text" name="coupon_validity" class="form-control datepicker" placeholder="">
                            <span>Valid Upto</span>
                        </label>
                        <label class="tooltip-text mb-4">Issue Date will be the date you save the coupon entry. Validity
                            expires at 11:59pm of the date selected.</label>


                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-secondary">Create Coupon</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
