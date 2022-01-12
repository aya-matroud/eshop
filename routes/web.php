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

Route::get('/', 'Frontend\FrontEndController@index');
Route::get('category', 'Frontend\FrontEndController@category');
Route::get('view-category/{slug}', 'Frontend\FrontEndController@viewcategory');
Route::get('category/{cate_slug}/{prod_slug}', 'Frontend\FrontEndController@productview');
Route::post('add-to-cart', 'Frontend\CartController@addProduct');

Route::post('delete-cart-item', 'Frontend\CartController@deleteproduct');
Route::post('update-cart', 'Frontend\CartController@updatecart');
Route::middleware('auth')->group( function () {

    Route::get('cart', 'Frontend\CartController@viewcart');
    Route::get('checkout', 'Frontend\CheckoutController@index');
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
});