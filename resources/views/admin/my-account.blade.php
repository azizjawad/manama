@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Admin Account</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4 font-weight-bold">Admin Details</h5>
                    <form>
                        <label class="form-group has-float-label mb-4">
                            <input data-role="tagsinput" type="text" value="Administrator"> <span>Account Name</span>
                        </label>
                        <label class="form-group has-float-label mb-1">
                            <input class="form-control" type="file" accept=".jpg,.png"><span>Change Display Image</span></label>
                        <label class="tooltip-text mb-4">(Only upload 600x600 size images.)</label>
                        <div  class="form-group text-right">
                            <button class="btn btn-secondary" type="submit">Save Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <h5 class="mb-4 font-weight-bold">Reset Password</h5>
                        <div class="alert alert-warning mb-3" role="alert">* Please note, password instructions will be sent on the registered email. Please only toggle the button below if you wish to reset the password now.</div>
                        <label class="form-label font-weight-bold" id="switch6-label">Confirm Reset</label>
                        <div class="custom-switch custom-switch-primary-inverse mb-2">
                            <input class="custom-switch-input" id="switch6" type="checkbox">
                            <label class="custom-switch-btn" for="switch6"></label>
                        </div>
                        <div  class="form-group text-right">
                            <p><a href="javascript:void(0);" class="btn btn-secondary">Send Reset Instructions</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
