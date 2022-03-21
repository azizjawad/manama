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
                            Rule</a>
                        <h5 class="mb-4 font-weight-bold">Shipping Manager</h5>
                        <div class="separator mb-5"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-shipping-rate-list">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Created on</th>
                                            <th>Rule Description</th>
                                            <th>Shipping Rate</th>
                                            <th>No Shipping At</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($shipping as $rule)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{date('d M Y', strtotime($rule->created_at))}}</td>
                                                <td>Free Shipping above {{$rule->free_shipping_above}}</td>
                                                <td>{{$rule->shipping_rate}}</td>
                                                <td>{{$rule->free_shipping_above}}</td>
                                                <td>{{$rule->status == 1 ? 'Active' : 'De-active'}}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                       data-target="#ruleactivationmodal" title="Activate / Deactivate"
                                                       class="las la-ban btn btn-secondary mx-1"></a>

                                                    <a data-delete="{{$rule->id}}" href="javascript:void(0)"
                                                       class="delete_item las la-trash-alt btn btn-secondary mx-1"></a>
                                                </td>
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
        <!-- Rule Actvation Toggle Modal -->

        <div class="modal fade bd-example-modal-sm" id="ruleactivationmodal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Toggle Shpping Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="alert alert-warning mb-5" role="alert">* Please note, only 1 rule can be applied at
                            a time. Activating a rule here will deactativate the old Rule
                        </div>
                        <p><b>Customer Name:</b> John Doe Smith</p>
                        <label class="form-label font-weight-bold" id="switch8-label">Rule Active</label>
                        <div class="custom-switch custom-switch-primary-inverse mb-2">
                            <input class="custom-switch-input" id="switch8" type="checkbox" checked>
                            <label class="custom-switch-btn" for="switch8"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Coupon -->

        <div class="modal fade modal-right" id="createcoupon" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalRight" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Create Shipping Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{route('admin-shipping-form')}}">
                            @csrf
                            <div class="alert alert-warning mb-4" role="alert">* Please follow the rule as set below.
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-group has-float-label mb-0">
                                    <input required data-role="tagsinput" name="shipping_rate" type="text" class="form-control text-uppercase"> <span>Shipping Rate (per bottle)</span>
                                </label>
                            </div>
                            <div class="alert alert-warning mb-4" role="alert">* If 0 (zero) shipping rate is set, No
                                Shipping Charges will be set
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-group has-float-label mb-1">
                                    <input required data-role="tagsinput" name="free_shipping_above" type="text" class="form-control text-uppercase">
                                    <span>Cart Value</span>
                                </label>
                            </div>
                            <div class="alert alert-warning mb-4" role="alert">* If 0 (zero) cart value is set, Shipping
                                rate per bottle will be applied
                            </div>

                            <label class="form-label font-weight-bold" id="switch9-label">Rule Deactivate</label>
                            <div class="custom-switch custom-switch-primary-inverse mb-2">
                                <input name="status" value="1" class="custom-switch-input" id="switch9" type="checkbox">
                                <label class="custom-switch-btn" for="switch9"></label>
                            </div>

                            <div class="alert alert-warning mb-4" role="alert">* You can activate the rule now or later,
                                please remember if you activate now the previous rule will be deactivated.
                            </div>

                            <div class="form-group text-right">
                                <p><button type="submit" class="btn btn-secondary">Create Rule</button></p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection
