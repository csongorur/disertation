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

// Admin routes.
Route::group(['prefix' => 'admin'], function () {

    // Auth routes.
    Auth::routes();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);
    });
});
