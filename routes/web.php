<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');
# Xác thực người dùng đã đăng nhập chưa
Route::middleware('auth')->group(function () {
    #--------------Dashboard------------------#
    Route::get('dashboard', 'DashboardController@show');
    Route::get('admin', 'DashboardController@show');

    #--------------User-Module------------------#
    #user-list
    Route::get('admin/user/list', 'AdminUserController@list');
    #user-add
    Route::get('admin/user/add', 'AdminUserController@add');
    Route::post('admin/user/store', 'AdminUserController@store');
    #user-delete
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');
    Route::get('admin/user/action', 'AdminUserController@action');
    #user-edit
    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user_edit');
    Route::post('admin/user/update{id}', 'AdminUserController@update')->name('user_update');

    #--------------Order-Module------------------#
    Route::get('admin/order/list', 'AdminOrderController@list');

    #--------------Product-Module------------------#

    Route::get('admin/product/list', 'AdminProductController@list')->name('product_list');
    Route::get('admin/product/add', 'AdminProductController@add');
    Route::get('admin/product/edit/{id}', 'AdminProductController@edit')->name('product_edit');
    Route::post('admin/product/store', 'AdminProductController@store');
    Route::get('admin/product/delete/{id}', 'AdminProductController@delete')->name('product_delete');
    Route::get('admin/product/action', 'AdminProductController@action');
});
