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
                        <h5 class="mb-4 font-weight-bold">Cart Limit Manager</h5>
                        <div class="alert alert-warning mb-5 mr-md-5" role="alert">* Please note, if you set limit to '0', it will become unlimited. If you update the current limit with new, it will replace current limit to new limit.</div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <form>
                                    <div class="form-group mb-4">
                                        <label class="form-group has-float-label mb-4">
                                            <input class="form-control" data-role="tagsinput" type="number" placeholer="" />
                                            <span>Set Cart Limit</span>
                                        </label>
                                    </div>


                                    <div class="form-group text-right">
                                        <button class="btn btn-secondary" type="submit">Set Cart Limit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator mb-5"></div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="data-table data-table-scrollable">
                                        <thead>
                                        <tr>
                                            <th>Last Updated on</th>
                                            <th>Cart Limit</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>20/04/2020</td>
                                            <td>12</td>
                                        </tr>

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
@endsection
