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

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/', function () {
    return view('welcome');
});

/*~~~~~~~~~~~___________User Route__________~~~~~~~~~~~~*/

Route::get('admin/User/index', 'UserController@index')->name('user_index');

Route::get('admin/User/create', 'UserController@create')->name('create_user');

Route::post('admin/User/store', 'UserController@store')->name('store_user');

Route::get('admin/User/show', 'UserController@show')->name('show_user');

Route::get('admin/User/edit/{id}', 'UserController@edit')->name('edit_user');

Route::post('admin/User/update', 'UserController@update')->name('update_user');

Route::get('admin/User/destroy/{id}', 'UserController@destroy')->name('destroy_user');

Route::get('admin/User/desactivate/{id}', 'UserController@desactivate')->name('desactivate_user');

Route::get('admin/User/activate/{id}', 'UserController@activate')->name('activate_user');

/*~~~~~~~~~~~___________Products Route__________~~~~~~~~~~~~*/

Route::get('admin/Product/index', 'ProductController@index')->name('index_product');

Route::get('admin/Product/create', 'ProductController@create')->name('create_product');

Route::post('admin/Product/store', 'ProductController@store')->name('store_product');

Route::get('admin/Product/show/{id}', 'ProductController@show')->name('show_product');

Route::get('admin/Product/edit/{id}', 'ProductController@edit')->name('edit_product');

Route::post('admin/Product/update', 'ProductController@update')->name('update_product');

Route::get('admin/Product/destroy/{id}', 'ProductController@destroy')->name('destroy_product');