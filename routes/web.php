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

// route for site
Route::group(['namespace' => 'Site'], function () {
    Route::get('category/{id}/index.html', 'CategoryController@index')->name('site.category.index');
    Route::get('index.html', 'HomeController@index')->name('site.home.index');
    Route::get('product/{id}/view.html', 'ProductController@view')->name('product.view');
});

// route for admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin_login', 'namespace' => 'Admin'], function () {
    Route::get('home/index.html', 'HomeController@index')->name('home.index');
    Route::get('logout.html', 'AdminController@getLogout')->name('admin.logout');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('index.html', 'AdminController@index')->name('admin.index');
        Route::get('{id}/edit.html', 'AdminController@edit')->name('admin.edit');
        Route::post('{id}/update.html', 'AdminController@update')->name('admin.update');
    });

    Route::group([], function () {
        Route::resource('customer', 'CustomerController', ['except' => 'destroy']);
        Route::post('customer/delete.html', 'CustomerController@delete')->name('customer.delete');
        Route::post('customer/deleteMulCus.html', 'CustomerController@delMulCustomer')->name('customer.delMulCus');
        Route::get('customer-restore.html', 'CustomerController@restore')->name('customer.restore');

    });
    
    Route::group([], function () {
        Route::resource('news', 'NewsController', ['except' => 'destroy']);
        Route::post('news/{id}/delete.html', 'NewsController@delete')->name('news.delete');
        Route::post('news/deleteMulNews.html', 'NewsController@delMulNews')->name('news.delMulNews');

    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('index.html', 'ContactController@index')->name('contact.index');
        Route::post('delete.html', 'ContactController@delete')->name('contact.delete');
        Route::post('deleteMulCon.html', 'ContactController@delMulCon')->name('contact.delMulCon');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('index.html', 'CommentController@index')->name('comment.index');
    });

    Route::group([], function () {
        Route::get('delete.html/{id}', 'SlideController@delete')->name('slide.delete');
        Route::resource('slide', 'SlideController', ['except' => ['show', 'destroy']]);
    });

    Route::group([], function () {
        Route::resource('category', 'CategoryController', ['except' => 'destroy']);
        Route::post('category/delete.html', 'CategoryController@delete')->name('category.delete');
        Route::post('category/checkChild.html', 'CategoryController@checkChild')->name('category.checkChild');
        Route::get('category-restore.html', 'CategoryController@restore')->name('category.restore');
    });

    Route::group([], function () {
        Route::resource('product', 'ProductController', ['except' => ['show', 'destroy']]);
        Route::post('delete.html', 'ProductController@delete')->name('product.delete');
        Route::post('deleteMulProd.html', 'ProductController@delMulProd')->name('product.delMulProd');
        Route::get('product-restore.html', 'ProductController@restore')->name('product.restore');
    });
});
Route::get('admin/login.html', 'Admin\AdminController@getLogin');
Route::post('admin/login.html', 'Admin\AdminController@postLogin');
