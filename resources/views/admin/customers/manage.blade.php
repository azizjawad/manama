@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Manage Customers</h5>
                        <div class="separator mb-5"></div>

                        <div class="table-responsive">
                            <table class="data-table data-table-customer-access-list">
                                <thead>
                                <tr>
                                    <th>Registration Date</th>
                                    <th>Customer's Name</th>
                                    <th>Mobile No.</th>
                                    <th>E-mail</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{date('d M Y',strtotime($user->created_at))}}</td>
                                            <td>{{ucwords($user->name)}}</td>
                                            <td>{{$user->mobile ?? 'N/A'}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" data-id="{{$user->id}}" class="las get-user-details la-eye btn btn-secondary mx-1"></a>
                                                <a href="javascript:void(0)" data-id="{{$user->id}}"  title="Activate / Deactivate" class="get-user-status las la-ban btn btn-secondary mx-1"></a>
                                                {{--                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#customerpwdrt" title="Reset Password" class="las la-key btn btn-secondary mx-1"></a>--}}
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
    <!-- Actvation Toggle Modal -->

    <div class="modal fade bd-example-modal-sm" id="activationmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Toggle Customer Access</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-warning mb-5" role="alert">* Please note, This will only manage customer access to his account. If you wish to delete the customer, delete from the list.</div>
                    <div class="dynamic_data">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Popup -->

    <div class="modal fade bd-example-modal-lg" id="customerDetails" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-left">
                            <div class="table-responsive">
                                <table class="table table-bordered">

                                    <tbody class="user_table_data">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Customer Password Form -->

    {{--    <div class="modal fade modal-right" id="customerpwdrt" tabindex="-1" role="dialog"--}}
    {{--         aria-labelledby="exampleModalRight" aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title font-weight-bold">Customer Password Reset</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}

    {{--                    <form>--}}
    {{--                        <div class="alert alert-warning mb-3" role="alert">* Please note, password instructions will be sent on the registered email. Please only toggle the button below if you wish to reset the password now.</div>--}}
    {{--                        <label class="form-label font-weight-bold" id="switch6-label">Confirm Reset</label>--}}
    {{--                        <div class="custom-switch custom-switch-primary-inverse mb-2">--}}
    {{--                            <input class="custom-switch-input" id="switch6" type="checkbox">--}}
    {{--                            <label class="custom-switch-btn" for="switch6"></label>--}}
    {{--                        </div>--}}
    {{--                        <div  class="form-group text-right">--}}
    {{--                            <p><a href="javascript:void(0);" class="btn btn-secondary">Send Reset Instructions</a></p>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <script>
        $('body').on('click','.get-user-details',function (){
            let user_id = $(this).data('id');
            $.ajax({
                url: "{{route('get-user-details')}}/" + user_id,
                success: function (res){
                    if (res.status === true) {
                        $('.user_table_data').html(res.html);
                        $('#customerDetails').modal('show');
                    }
                }
            })
        })
        $('body').on('click','.get-user-status',function (){
            let user_id = $(this).data('id');
            $.ajax({
                url: "{{route('get-user-status')}}/" + user_id,
                success: function (res){
                    if (res.status === true) {
                        let html =  `<p><b>Customer Name:</b> ${res.user.name}</p>
                            <label class="form-label font-weight-bold" id="switch4-label">Customer ${res.user.status == 1 ? 'Active' : 'De-active'}</label>
                            <div class="custom-switch custom-switch-primary-inverse mb-2">
                                <input type="hidden" value="${user_id}" id="toggle_user_id" name="user_id">
                                <input class="custom-switch-input" id="user_toggle" type="checkbox" ${res.user.status == 1 ? 'checked' : ''}>
                                <label class="custom-switch-btn" for="user_toggle"></label>
                            </div>`;
                        $('.dynamic_data').html(html);
                        $('#activationmodal').modal('show');
                    }
                }
            })
        });
        $('body').on('click','#user_toggle', function (){
            let status = $('#user_toggle:checked').length;
            let user_id = $('#toggle_user_id').val();
            $.ajax({
                url:`{{route('update-user-status')}}`,
                type: "POST",
                data: {user_id,status},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res){
                    if (res.status  === true)
                        success_notification();
                }
            })
        })
    </script>
@endsection
