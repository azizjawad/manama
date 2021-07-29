"use strict";

function ajax_function(form){
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
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: res.message,
                    showConfirmButton: false,
                    timer: 2500,
                    width: '380px',
                    height: '300px'
                });
                form[0].reset()
            }
        },
        error: (res) => {
            button.attr('disabled', false).text('Submit');
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Oops! something went wrong, please try again.',
                showConfirmButton: false,
                timer: 2500,
                width: '380px',
                height: '300px'
            });
        }
    });
}

(function ($) {
    $('#kt_categories_form').validate({
        rules: {
            name: {
                required: true
            },
            description: {
                required: true
            },
            meta_description: {
                required: true
            },
            page_slug: {
                required: true
            },
            meta_title:{
                required: true
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.appendTo(element.parents('.form-group'))
        },
        submitHandler: function (){
            ajax_function($('#kt_categories_form'));
        }
    });

    $('a.delete_item').click(function (){
        let delete_id = $(this).data('delete');
        let slug = window.location.href.split('/').reverse()[0];

        if(!isNaN(delete_id) && slug !== '') {
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete ${slug.replace('-',' ')}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: window.location.pathname+`/delete/${delete_id}`,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "delete",
                        success: (res) => {
                            if (res.status === true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Row has been deleted successfully.',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    width: '380px',
                                    height: '300px'
                                });
                                $(this).parents('tr').remove();
                            }
                        }
                    });
                }
            });
        }
    });
})(jQuery);
