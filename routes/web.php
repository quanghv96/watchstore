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

Route::get('/', function () {
    return view('welcome');
});

// route for admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin_login', 'namespace' => 'Admin'], function () {
    Route::get('home/index.html', 'HomeController@index')->name('home.index');
    Route::get('logout.html', 'AdminController@getLogout')->name('admin.logout');
    Route::group([], function () {
    	Route::resource('customer', 'CustomerController');
    });
});
Route::get('admin/login.html', 'Admin\AdminController@getLogin');
Route::post('admin/login.html', 'Admin\AdminController@postLogin');
