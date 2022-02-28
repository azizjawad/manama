<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\WebsiteController@homepage')->name('home-page');
Route::get('about-us', 'App\Http\Controllers\WebsiteController@about_us')->name('about-us');
Route::get('contact-us', 'App\Http\Controllers\WebsiteController@contact_us')->name('contact-us');
Route::get('customer-testimonials', 'App\Http\Controllers\WebsiteController@customer_testimonials')->name('customer-testimonials');
Route::get('return-refund-policy', 'App\Http\Controllers\WebsiteController@return_refund_policy')->name('return_refund_policy');
Route::get('privacy-policy', 'App\Http\Controllers\WebsiteController@privacy_policy')->name('privacy-policy');
Route::get('our-distributors', 'App\Http\Controllers\WebsiteController@our_distributors')->name('our-distributors');
Route::get('tips-techniques', 'App\Http\Controllers\WebsiteController@tips_techniques')->name('tips-techniques');
Route::get('tips-techniques-single', 'App\Http\Controllers\WebsiteController@tips_techniques_single')->name('tips-techniques-single');
Route::get('recipe-corner', 'App\Http\Controllers\WebsiteController@recipe_corner')->name('recipe-corner');
Route::get('payment-fail', 'App\Http\Controllers\WebsiteController@payment_fail')->name('payment-fail');
Route::get('support-center', 'App\Http\Controllers\WebsiteController@support_center')->name('support-center');
Route::get('shipping-policy', 'App\Http\Controllers\WebsiteController@shipping_policy')->name('shipping-policy');
Route::get('terms-and-conditions', 'App\Http\Controllers\WebsiteController@terms_and_conditions')->name('terms-and-conditions');
Route::get('download-brochure', 'App\Http\Controllers\WebsiteController@download_brochure')->name('download-brochure');
//Route::get('payu_payments', 'App\Http\Controllers\WebsiteController@payu_payments')->name('payu_payments');


Route::get('admin/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/cms/admin');
})->name('admin-logout');

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Auth::routes();

Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function () {

    Route::get('dashboard', 'App\Http\Controllers\Admin\AdminController@adminDashboard')->name('admin-dashboard');

    Route::prefix('admin')->group(function () {

        Route::get('orders', 'App\Http\Controllers\Admin\OrdersController@index_page')->name('admin-order');
        Route::get('manage-orders/{order_id}', 'App\Http\Controllers\Admin\OrdersController@manage_order')->name('manage_order');
        Route::post('update-order/{order_id}', 'App\Http\Controllers\Admin\OrdersController@update_order_status')->name('update_order_status');
        Route::get('account', 'App\Http\Controllers\Admin\AdminController@my_account')->name('admin-account');
        Route::post('save-admin-profile', 'App\Http\Controllers\Admin\AdminController@save_admin_profile')->name('save-admin-profile');
        Route::get('get-user-details/{user_id?}', 'App\Http\Controllers\Admin\AdminController@get_user_details')->name('get-user-details');
        Route::get('get-user-status/{user_id?}', 'App\Http\Controllers\Admin\AdminController@get_user_status')->name('get-user-status');
        Route::post('update-user-status', 'App\Http\Controllers\Admin\AdminController@update_user_status')->name('update-user-status');

        Route::prefix('products')->group(function () {

            Route::prefix('category')->group(function () {
                Route::get('/', 'App\Http\Controllers\Admin\CategoryController@category_index_page')->name('admin-category-list');
                Route::get('add', 'App\Http\Controllers\Admin\CategoryController@category_add_page')->name('admin-category-add');
                Route::get('edit/{id}', 'App\Http\Controllers\Admin\CategoryController@category_edit_page')->name('admin-category-edit');
                Route::get('image', 'App\Http\Controllers\Admin\CategoryController@category_image_page')->name('admin-category-image');
                Route::delete('image/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete_category_image');
                Route::post('save-categories', 'App\Http\Controllers\Admin\CategoryController@save_category_details')->name('admin-save-categories');
                Route::post('save-category-image', 'App\Http\Controllers\Admin\CategoryController@save_category_image')->name('admin-save-category-image');
                Route::delete('delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete_category')->name('admin-delete-categories');
            });

            Route::get('/', 'App\Http\Controllers\Admin\ProductsController@products_index_page')->name('admin-product-list');
            Route::get('add', 'App\Http\Controllers\Admin\ProductsController@products_add_page')->name('admin-product-add');
            Route::get('edit/{id}', 'App\Http\Controllers\Admin\ProductsController@products_edit_page')->name('admin-product-edit');
            Route::post('save-product', 'App\Http\Controllers\Admin\ProductsController@save_product')->name('admin-save-product');
            Route::post('update-product-status', 'App\Http\Controllers\Admin\ProductsController@update_product_status');
            Route::delete('delete/{id}', 'App\Http\Controllers\Admin\ProductsController@delete_product')->name('admin-delete-product');


            Route::get('bestsellers', 'App\Http\Controllers\Admin\ProductsController@products_bestseller_page')->name('admin-product-bestseller-page');

            Route::get('price', 'App\Http\Controllers\Admin\ProductsController@products_price_page')->name('admin-product-price');
            Route::post('price/save', 'App\Http\Controllers\Admin\ProductsController@save_product_info')->name('admin-save-product-info');

            Route::get('gallery', 'App\Http\Controllers\Admin\ProductsController@products_gallery_page')->name('admin-product-gallery');
            Route::post('gallery/save', 'App\Http\Controllers\Admin\ProductsController@add_products_gallery')->name('admin-save-products-gallery');
            Route::delete('gallery/delete/{id}', 'App\Http\Controllers\Admin\ProductsController@delete_product_gallery');
//            Route::get('visibility', 'App\Http\Controllers\Admin\ProductsController@products_visibility_page')->name('admin-product-visibility');
        });

        Route::prefix('customers')->group(function () {
            Route::get('manage', 'App\Http\Controllers\Admin\CustomersController@customer_manege_page')->name('admin-customer-manage');
            Route::get('summary/{user_id?}', 'App\Http\Controllers\Admin\CustomersController@customer_summary_page')->name('admin-customer-summary');
            Route::get('wishlist', 'App\Http\Controllers\Admin\CustomersController@customer_wishlist_page')->name('admin-customer-wishlist');
        });

        Route::prefix('reviews')->group(function () {
            Route::get('new', 'App\Http\Controllers\Admin\ReviewsController@new_reviews_page')->name('admin-new-reviews');
            Route::get('get-review/{review_id?}', 'App\Http\Controllers\Admin\ReviewsController@get_review')->name('get-reviews-product');
            Route::post('update_review', 'App\Http\Controllers\Admin\ReviewsController@update_review')->name('update_review');
            Route::get('moderated', 'App\Http\Controllers\Admin\ReviewsController@moderated_reviews_page')->name('admin-moderated-reviews');
        });

        Route::prefix('manage')->group(function () {
            Route::get('discount', 'App\Http\Controllers\Admin\ManageController@discount_page')->name('admin-discount-manager');
            Route::post('save-coupon', 'App\Http\Controllers\Admin\ManageController@save_coupon')->name('admin-save-coupon');
            Route::get('shipping', 'App\Http\Controllers\Admin\ManageController@shipping_page')->name('admin-shipping-manager');
            Route::delete('shipping/delete/{shipping_id}', 'App\Http\Controllers\Admin\ManageController@shipping_delete');
            Route::post('shipping-form', 'App\Http\Controllers\Admin\ManageController@shipping_form')->name('admin-shipping-form');
        });

        Route::prefix('cms')->group(function () {
            Route::get('home-banner', 'App\Http\Controllers\Admin\CMSController@home_banner_page')->name('admin-home-banner');
            Route::post('save-home-banner', 'App\Http\Controllers\Admin\CMSController@save_home_banner_page')->name('admin-save-home-banner');
            Route::get('advertisement', 'App\Http\Controllers\Admin\CMSController@advertisement_page')->name('admin-advertisement');
            Route::post('save-advertisement', 'App\Http\Controllers\Admin\CMSController@save_advertisement')->name('admin-save-advertisement');
            Route::get('recipes', 'App\Http\Controllers\Admin\CMSController@recipes_page')->name('admin-recipes');
            Route::post('save-recipes', 'App\Http\Controllers\Admin\CMSController@save_recipes')->name('admin-save-recipes');
            Route::get('edit-recipe/{receipe_id}', 'App\Http\Controllers\Admin\CMSController@fetch_recipes')->name('admin-edit-recipes');
            Route::post('update-recipes', 'App\Http\Controllers\Admin\CMSController@update_recipes')->name('admin-update-recipes');
            Route::get('news-events', 'App\Http\Controllers\Admin\CMSController@news_events_page')->name('admin-news-events');
            Route::get('edit-news-events/{id}', 'App\Http\Controllers\Admin\CMSController@news_events_edit_page')->name('admin-news-events-edit');
            Route::post('save-news-events', 'App\Http\Controllers\Admin\CMSController@save_news_events')->name('admin-save-news-events');
            Route::get('news-events-list', 'App\Http\Controllers\Admin\CMSController@news_events_list_page')->name('admin-news-events-list');
            Route::get('news-events-gallery/{id}', 'App\Http\Controllers\Admin\CMSController@news_events_gallery_page')->name('admin-news-events-gallery');
            Route::post('save-news-events-gallery', 'App\Http\Controllers\Admin\CMSController@save_news_events_gallery')->name('admin-save-news-events-gallery');
            Route::get('page-metas', 'App\Http\Controllers\Admin\CMSController@meta_page')->name('admin-meta');;
        });

    });
});

Route::group(['middleware' => 'App\Http\Middleware\IsDefault'], function () {
    Route::prefix('account')->group(function () {
        Route::get('/my-account', 'App\Http\Controllers\MyAccountController@index')->name('my-account');
        Route::get('/my-wishlist', 'App\Http\Controllers\MyAccountController@my_wishlist')->name('my-wishlist');
        Route::get('/change-password', 'App\Http\Controllers\MyAccountController@change_password')->name('change-password');
        Route::get('/edit-profile', 'App\Http\Controllers\MyAccountController@edit_profile')->name('edit-profile');
        Route::post('/save-profile', 'App\Http\Controllers\MyAccountController@save_profile')->name('edit-user-profile');
        Route::get('/order-history', 'App\Http\Controllers\MyAccountController@order_history')->name('order-history');
        Route::get('/manage-address', 'App\Http\Controllers\MyAccountController@manage_address')->name('manage-address');
        Route::post('/save-address', 'App\Http\Controllers\MyAccountController@save_address')->name('save-address');
        Route::post('/delete-address', 'App\Http\Controllers\MyAccountController@delete_address')->name('delete-address');
        Route::get('/user-settings', 'App\Http\Controllers\MyAccountController@user_settings')->name('user-settings');
        Route::post('/save-user-setting', 'App\Http\Controllers\MyAccountController@save_user_setting')->name('save-user-setting');

        // Route::post('/apply-coupon', 'App\Http\Controllers\MyCartController@apply_coupon')->name('apply-coupon');
        Route::post('/place-order', 'App\Http\Controllers\MyCartController@place_order')->name('place-order');
        Route::get('/checkout', 'App\Http\Controllers\MyAccountController@checkout')->name('checkout');
        Route::post('/checkout', 'App\Http\Controllers\MyAccountController@checkout')->name('checkout');
        Route::post('online-order-payments', 'App\Http\Controllers\WebsiteController@online_payments')->name('online-order-payments');
        Route::get('/thank-you', 'App\Http\Controllers\MyAccountController@thank_you')->name('thank-you');
        Route::get('/order-details/{order_no}', 'App\Http\Controllers\MyAccountController@order_details')->name('order_details');
    });
});
Route::get('account/cart', 'App\Http\Controllers\MyCartController@cart_page')->name('cart');
Route::prefix('api')->group(function () {
    Route::post('/update-quantity', 'App\Http\Controllers\MyCartController@update_quantity')->name('update_quantity');
    Route::delete('/cart/delete/{cart_id}', 'App\Http\Controllers\MyCartController@delete_cart')->name('delete_cart');
});
Route::get('generate-pdf/{order_no}', 'App\Http\Controllers\MyAccountController@generatePDF')->name('generatePDF');

Route::get('/api/get-product-details/{product_info_id?}', 'App\Http\Controllers\ProductController@get_product_details')->name('get-product-details');
Route::get('/api/get-recipe/{recipe_id?}', 'App\Http\Controllers\WebsiteController@get_recipe')->name('get_recipe');

Route::post('/api/add-to-cart', 'App\Http\Controllers\MyCartController@index')->name('my-cart');
Route::get('/pull/products-in-cart/{product_info_id}/{product_id?}', 'App\Http\Controllers\MyCartController@get_product_by_info_id')->name('get_product_by_info_id');
Route::get('/api/fetch-cart-details', 'App\Http\Controllers\MyCartController@fetch_cart_details');

Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');
Route::get('/cms/admin', 'App\Http\Controllers\Admin\AdminController@login')->name('home');

Route::get('product', 'App\Http\Controllers\ProductController@index_page')->name('product');

// Wishlist
Route::group(['middleware' => 'auth'], function () {
    Route::post('toggle-wishlist/{product_info_id}', 'App\Http\Controllers\WishlistController@toggle_wishlist')->name('toggle_wishlist');
    Route::post('add-wishlist/{product_info_id}', 'App\Http\Controllers\WishlistController@add_wishlist')->name('add_wishlist');
});
// sessions
Route::post('create-cookie', 'App\Http\Controllers\CookieController@createCookie')->name('createCookie');
Route::post('save-review', 'App\Http\Controllers\ProductController@saveReview')->name('saveReview');

Route::get('shop/{category_slug?}/{product_name?}/{product_info_id?}', 'App\Http\Controllers\ProductController@category_product')->name('category_product');
//Route::get('{category_slug?}/{product_name?}/{product_info_id?}', 'App\Http\Controllers\ProductController@category_product')->name('category_product');
