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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/admin');
})->name('admin-logout');

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
                Route::post('save-categories', 'App\Http\Controllers\Admin\CategoryController@save_category_details')->name('admin-save-categories');
                Route::delete('delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete_category')->name('admin-delete-categories');
            });

            Route::get('/', 'App\Http\Controllers\Admin\ProductsController@products_index_page')->name('admin-product-list');
            Route::get('add', 'App\Http\Controllers\Admin\ProductsController@products_add_page')->name('admin-product-add');
            Route::get('bestsellers', 'App\Http\Controllers\Admin\ProductsController@products_bestseller_page')->name('admin-product-bestseller-page');
            Route::get('price', 'App\Http\Controllers\Admin\ProductsController@products_price_page')->name('admin-product-price');
            Route::get('gallery', 'App\Http\Controllers\Admin\ProductsController@products_gallery_page')->name('admin-product-gallery');
            Route::get('visibility', 'App\Http\Controllers\Admin\ProductsController@products_visibility_page')->name('admin-product-visibility');
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
            Route::get('shipping', 'App\Http\Controllers\Admin\ManageController@shipping_page')->name('admin-shipping-manager');
        });

        Route::prefix('cms')->group(function () {
            Route::get('home-banner', 'App\Http\Controllers\Admin\CMSController@home_banner_page')->name('admin-home-banner');
            Route::get('advertisement', 'App\Http\Controllers\Admin\CMSController@advertisement_page')->name('admin-advertisement');
            Route::get('recipes', 'App\Http\Controllers\Admin\CMSController@recipes_page')->name('admin-recipes');
            Route::get('news-events', 'App\Http\Controllers\Admin\CMSController@news_events_page')->name('admin-news-events');
            Route::get('news-events-gallery', 'App\Http\Controllers\Admin\CMSController@news_events_gallery_page')->name('admin-news-events-gallery');
            Route::get('page-metas', 'App\Http\Controllers\Admin\CMSController@meta_page')->name('admin-meta');;
        });

    });
});


Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');

Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@login')->name('home');
