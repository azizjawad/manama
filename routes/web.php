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

Route::get('/', 'App\Http\Controllers\HomeController@homepage')->name('home-page');


Route::get('admin/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/admin');
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
            Route::get('summary', 'App\Http\Controllers\Admin\CustomersController@customer_summary_page')->name('admin-customer-summary');
            Route::get('wishlist', 'App\Http\Controllers\Admin\CustomersController@customer_wishlist_page')->name('admin-customer-wishlist');
        });

        Route::prefix('reviews')->group(function () {
            Route::get('new', 'App\Http\Controllers\Admin\ReviewsController@new_reviews_page')->name('admin-new-reviews');
            Route::get('moderated', 'App\Http\Controllers\Admin\ReviewsController@moderated_reviews_page')->name('admin-moderated-reviews');
        });

        Route::prefix('manage')->group(function () {
            Route::get('discount', 'App\Http\Controllers\Admin\ManageController@discount_page')->name('admin-discount-manager');
            Route::post('save-coupon', 'App\Http\Controllers\Admin\ManageController@save_coupon')->name('admin-save-coupon');
            Route::get('shipping', 'App\Http\Controllers\Admin\ManageController@shipping_page')->name('admin-shipping-manager');
        });

        Route::prefix('cms')->group(function () {
            Route::get('home-banner', 'App\Http\Controllers\Admin\CMSController@home_banner_page')->name('admin-home-banner');
            Route::post('save-home-banner', 'App\Http\Controllers\Admin\CMSController@save_home_banner_page')->name('admin-save-home-banner');
            Route::get('advertisement', 'App\Http\Controllers\Admin\CMSController@advertisement_page')->name('admin-advertisement');
            Route::post('save-advertisement', 'App\Http\Controllers\Admin\CMSController@save_advertisement')->name('admin-save-advertisement');
            Route::get('recipes', 'App\Http\Controllers\Admin\CMSController@recipes_page')->name('admin-recipes');
            Route::post('save-recipes', 'App\Http\Controllers\Admin\CMSController@save_recipes')->name('admin-save-recipes');
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
        Route::get('/order-history', 'App\Http\Controllers\MyAccountController@order_history')->name('order-history');
        Route::get('/manage-address', 'App\Http\Controllers\MyAccountController@manage_address')->name('manage-address');
        Route::get('/user-settings', 'App\Http\Controllers\MyAccountController@user_settings')->name('user-settings');
        Route::get('/cart', 'App\Http\Controllers\MyCartController@cart_page')->name('cart');
        Route::get('/checkout', 'App\Http\Controllers\MyAccountController@checkout')->name('checkout');
        Route::get('/thank-you', 'App\Http\Controllers\MyAccountController@thank_you')->name('thank-you');
    });

});


Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');
Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@login')->name('home');

Route::get('product', 'App\Http\Controllers\ProductController@index_page')->name('product');

Route::prefix('api')->group(function () {
    Route::post('/add-to-cart', 'App\Http\Controllers\MyCartController@index')->name('my-cart');
    Route::get('/fetch-cart-details', 'App\Http\Controllers\MyCartController@fetch_cart_details');
});

Route::get('{category_slug?}/{product_name?}/{product_info_id?}', 'App\Http\Controllers\ProductController@category_product')->name('category_product');
