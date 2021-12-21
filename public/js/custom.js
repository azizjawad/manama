"use strict";
function multipart_ajax(form, data, button){
    $.ajax({
        url: form.attr('action'),
        method: "post",
        processData: false,
        contentType: false,
        data: data,
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
                if ($('input[name="product_id"]') === 0)
                    form[0].reset();
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
                form[0].reset();
                success_notification(res.message);
            }
        },
        error: (res) => {
            button.attr('disabled', false).text('Submit');
            error_notification()
        }
    });
}
function success_notification(message = 'Success!! Action completed successfully.'){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 2500,
        width: '380px',
        height: '300px'
    });
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

    $('#kt_product_form').validate({
        rules: {
            category_id: {
                required: true
            },
            name: {
                required: true
            },
            description: {
                required: true
            },
            meta_title:{
                required: true
            },
            meta_description:{
                required: true
            },
            page_slug:{
                required: true
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.appendTo(element.parents('.form-group'))
        },
        submitHandler: function (){
            let form = $('#kt_product_form');
            image_data_creation(form);
        }
    });

    $('.edit_product_info').click(function (){
        $.each($(this).data(), function (key,data){
            if (key === 'is_in_stock' || key === 'sell_as_single'){
                $(`input[name="${key}"]`).attr('checked', (data === 1));
            }else{
                $(`input[name="${key}"]`).val(data);
                $(`select[name="${key}"]`).val(data).trigger('change');
            }
        });
        // $('#productList').attr('disabled',true);
    });

    $('#addpriceentry').on('hide.bs.modal', function () {
        $('#kt_product_info_form')[0].reset();
        $('#productList').attr('disabled',false);
        $('#product_info_id').val('');
    });

    $('.is_product_online').click(function (){
        let product_id = $(this).data('product_id');
        let status = $(this).attr('data-status');
        $('input[name="product_online"]').prop('checked',(status == 1));
        $('#product_id_modal').val(product_id);
        $('#prdvisibilty').modal('show');
    });

    $('#prdvisibilty').on('hide.bs.modal', function () {
        $('#product_id_modal').val('');
    });

    $('input[name="product_online"]').click(function (){
       let value = $('input[name="product_online"]:checked').length;
       let product_id = $('#product_id_modal').val();
       $(this).prop('disabled',true);
       $.ajax({
           url: window.location.pathname + "/update-product-status/",
           data:{product_id:product_id,status: value},
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           type:"post",
           success: (res) => {
               $(this).prop('disabled',false);
               if(res.status === true) {
                   $('td').find(`[data-product_id='${product_id}']`).attr('data-status',value);
                   success_notification(res.message);
                   $('#prdvisibilty').modal('hide');
               }else{
                   error_notification(res.message);
               }
           }
       })
    });

    $('#kt_product_info_form').validate({
        rules: {
            product_id: {
                required: true
            },
            listing_name: {
                required: true
            },
            packaging_weight: {
                required: true
            },
            packaging_type: {
                required: true
            },
            cost_price:{
                required: true,
                digits: true
            },
            barcode: {
                required: true
            },
            sku_code: {
                required: true
            },
            hsn_code: {
                required: true
            },
        },
        errorElement: 'div',
        // errorPlacement: function (error, element) {
        //     error.appendTo(element.parents('.form-group'))
        // },
        submitHandler: function (){
            ajax_function($('#kt_product_info_form'));
        }
    });

    $('#kt_category_image_form').validate({
        rules: {
            category: {
                required: true
            },
            image: {
                required: true
            },
        },
        errorElement: 'div',
        submitHandler: function (){
            let form = $('#kt_category_image_form');
            image_data_creation(form);
        }
    });

    $('#kt_products_gallery_form').validate({
        rules: {
            product_id: {
                required: true
            },
            image_label: {
                required: true
            },
            image: {
                required: true
            },
        },
        errorElement: 'div',
        submitHandler: function (){
            let form = $('#kt_products_gallery_form');
            image_data_creation(form);
        }
    });

    function image_data_creation(form){
        let data = new FormData();
        let button = form.find('button[type="submit"]');

        $.each(form.serializeArray(), function (key, input) {
            data.append(input.name, input.value);
        });

        //File data
        var file_data = $('input[name="image"]')[0].files;
        for (var i = 0; i < file_data.length; i++) {
            data.append("image[]", file_data[i]);
        }
        multipart_ajax(form, data, button);
    }

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
                                success_notification('Row has been deleted successfully.');
                                $(this).parents('tr').remove();
                            }
                        }
                    });
                }
            });
        }
    });
    $('.summernote').summernote({
        placeholder: 'Please enter the description',
        tabsize: 2,
        height: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });


})(jQuery);
