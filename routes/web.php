<?php

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

Route::get('/', ['as' => 'index', 'uses' => 'PagesController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@about']);
Route::get('shop', ['as' => 'shop', 'uses' => 'PagesController@shop']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactsController@store']);
Route::get('product/{product}', ['as' => 'page.product', 'uses' => 'PagesController@showProduct']);
Route::post('cart', ['as' => 'cart', 'uses' => 'CartsController@index']);
Route::get('order', ['as' => 'order', 'uses' => 'OrdersController@index']);
Route::post('order', ['as' => 'order.store', 'uses' => 'OrdersController@store']);

// Media
Route::get('media/{media}', ['as' => 'media', 'uses' => 'MediaController@show']);

// Admin routes.
Route::group(['prefix' => 'admin'], function () {

    // Auth routes.
    Auth::routes();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);

        // Product
        Route::get('products', ['as' => 'products', 'uses' => 'Admin\ProductsController@index']);
        Route::get('products/create', ['as' => 'products.create', 'uses' => 'Admin\ProductsController@create']);
        Route::post('products/store', ['as' => 'products.store', 'uses' => 'Admin\ProductsController@store']);
        Route::get('products/edit/{product}', ['as' => 'products.edit', 'uses' => 'Admin\ProductsController@edit']);
        Route::post('products/update/{product}', ['as' => 'products.update', 'uses' => 'Admin\ProductsController@update']);
        Route::get('products/delete/{product}', ['as' => 'products.delete', 'uses' => 'Admin\ProductsController@delete']);

        // Order
        Route::get('orders', ['as' => 'admin.orders', 'uses' => 'Admin\OrdersController@index']);
        Route::get('orders/{order}', ['as' => 'admin.orders.edit', 'uses' => 'Admin\OrdersController@edit']);
    });
});
