$(document).ready(function () {
    setTimeout(() => {
        if (window.location.href.includes('#nav-reviews') ) {
            $('#nav-reviews').click();
        }
        if(reference_type == 'review'){
            $('#nav-reviews').click();
        }
    }, 1000);
});
$('.review_submit').click(function () {
    $('.review_submit').attr('disabled', true);
    $('.review_submit').html('Processing...');
    $('.error_span').html('');
    const reviewData = {
        product_id: $('#product_id').val(),
        rating: $('.star_rating.active').attr('data-rating'),
        comment: $('#comment').val(),
    }
    $.ajax({
        type: 'POST',
        url: baseUrl + '/save-review',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: reviewData,
        cache: false,
        success: function (response) {
            console.log('submit review', response);
            $('.review_submit').attr('disabled', false);
            $('.review_submit').html('Submit');
            if (response.errors) {
                for (const property in response.errors) {
                    console.log('in error loop');
                    console.log('  property : ', property, ' || ', $('.' + property +
                        '_error'));
                    $('.' + property + '_error').html(response.errors[property]);
                }
            }
            if (response.status) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2500,
                    width: '380px',
                    height: '300px'
                });
                setTimeout(() => {
                    window.location.reload();
                }, 200);
            }
        },
        error: function (err) {
            console.log(err);
            $('.review_submit').attr('disabled', false);
            $('.review_submit').html('Submit');
        }
    });
});