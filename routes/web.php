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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('load-cart-data', 'Frontend\CartController@cartcount');

Route::get('load-wishcount-data', 'Frontend\WishlistController@wishlistcount');
Route::get('/', 'Frontend\FrontEndController@index');
Route::get('category', 'Frontend\FrontEndController@category');
Route::get('view-category/{slug}', 'Frontend\FrontEndController@viewcategory');
Route::get('category/{cate_slug}/{prod_slug}', 'Frontend\FrontEndController@productview');
Route::post('add-to-cart', 'Frontend\CartController@addProduct');

Route::post('delete-cart-item', 'Frontend\CartController@deleteproduct');
Route::post('update-cart', 'Frontend\CartController@updatecart');
Route::post('add-to-wishlist', 'Frontend\WishlistController@add');

Route::post('delete-wishlist-item', 'Frontend\WishlistController@deleteitem');

Route::middleware('auth')->group( function () {

    Route::get('cart', 'Frontend\CartController@viewcart');
    Route::get('checkout', 'Frontend\CheckoutController@index');
    Route::post('place-order', 'Frontend\CheckoutController@placeorder');
    Route::get('my-orders', 'Frontend\UserController@index');

    Route::get('view-order/{id}', 'Frontend\UserController@view');

    Route::get('wishlist', 'Frontend\WishlistController@index');

});

    Route::get('/dashboard', function () {
        return view('layouts.admin.index');
    });

Route::middleware(['auth','isAdmin'])->group( function () {

    Route::get('/dashboard', function () {
        return view('layouts.admin.index');
    });
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-prod/{id}', 'Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'Admin\CategoryController@update');
    Route::get('delete-category/{id}', 'Admin\CategoryController@destroy');


    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-product', 'Admin\ProductController@add');
    Route::post('insert-product', 'Admin\ProductController@insert');
    Route::get('edit-product/{id}', 'Admin\ProductController@edit');
    Route::put('update-product/{id}', 'Admin\ProductController@update');
    Route::get('delete-product/{id}', 'Admin\ProductController@destroy');


    Route::get('orders', 'Admin\OrderController@index');
    Route::get('admin/view-order/{id}', 'Admin\OrderController@view');

    Route::put('update-order/{id}', 'Admin\OrderController@updateorder');
    Route::get('order-history', 'Admin\OrderController@orderhistory');
    Route::get('users', 'Admin\DashboardController@users');
    Route::get('view-user/{id}', 'Admin\DashboardController@viewuser');

});