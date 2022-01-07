$( document ).ready(function() {

    $('#form_my_address').validate({
        rules: {
            txt_label: {
                required: true
            },
            txt_fullname: {
                required: true
            },
            txt_mobile_no: {
                required: true
            },
            txt_address:{
                required: true
            },
            state:{
                required: true
            },
            txt_city_village:{
                required: true
            },
            txt_pincode : {
                required: true
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
        },
        submitHandler: function (){
            let form = $('#form_my_address');
            form_ajax_call(form);
        }
    });

    $('#btn_apply_coupon').on('click', function() {
        let button = $(this);
        let current_val = $('#text_coupon').val();
        if(current_val) {
            $.ajax({
                url: 'apply-coupon',
                data: {'coupon_code' : current_val},
                type:"post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: () => {
                    button.attr('disabled',true).text('Please wait..');
                },
                success: (res) => {
                    button.attr('disabled', false).text('Apply Coupon');
                    if(res.status === true) {
                        success_notification(res.message);
                    }
                },
                error: (res) => {
                    button.attr('disabled', false).text('Apply Coupon');
                    error_notification()
                }
            });
        } else {
            error_notification('Please enter coupon code');
        }
    });



    $('.deleteAddress').on('click', function() {
        let button = $(this);
        let current_val = $(this).attr('data-rowID');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed && current_val) {
                $.ajax({
                    url: 'delete-address',
                    data: {'row_id' : current_val},
                    type:"post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: () => {
                        button.attr('disabled',true).text('Please wait..');
                    },
                    success: (res) => {
                        button.attr('disabled', false).text('Delete');
                        if(res.status === true) {
                            $('.divClass_'+current_val).remove();
                            success_notification(res.message);
                        }
                    },
                    error: (res) => {
                        button.attr('disabled', false).text('Delete');
                        error_notification()
                    }
                });
            }
        });
    });
});

function form_ajax_call(form){
    let button = form.find('button[type="submit"]');
    $.ajax({
        url: form.attr('action'),
        data: form.serialize(),
        type:"post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: () => {
            button.attr('disabled',true).text('Please wait..');
        },
        success: (res) => {
            button.attr('disabled', false).text('Submit');
            if(res.status === true){
                form[0].reset();
                success_notification(res.message, true);
            }
        },
        error: (res) => {
            button.attr('disabled', false).text('Submit');
            error_notification()
        }
    });
}
function success_notification(message = 'Success!! Action completed successfully.', reload = false){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 2500,
        width: '380px',
        height: '300px'
    });
    if(reload) {
        location.reload();
    }
    return true;
}
function error_notification(message = 'Oops!! Something went wrong, please try again.'){
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 2500,
        width: '380px',
        height: '300px'
    });
}
