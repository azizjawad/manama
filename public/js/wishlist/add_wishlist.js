const baseUrl = window.location.origin;
$(document).ready(function(){
    setTimeout(() => {
        if(wishListProduct){
            addToWishList(wishListProduct);
        }
    }, 1000);
});
$(document).on('click','.add_to_wishlist_btn', function(){
    const product_info_id = $(this).attr('data-product_info_id');
    addToWishList(product_info_id);
});

function addToWishList(product_info_id){
    if( !userExists ){
        // user is not logged in then create sesion and redirect to login
        const cookieData = {
            cookie_name: 'link_referral',
            cookie_value: {
                redirectTo: window.location.href,
                product_info_id:product_info_id
            }
        }
        $.ajax({
            type: 'POST',
            url: baseUrl+'/create-cookie',
            headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:cookieData,
            cache: false,
            success: function (response) {
                 window.location.href = '/login';
            },
            error: function (err) {
                console.log(err);
            }
        });
        return false;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl+'/add-wishlist/'+product_info_id,
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function (response) {
            if(response.success){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2500,
                    width: '380px',
                    height: '300px'
                });
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2500,
                    width: '380px',
                    height: '300px'
                });
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}
