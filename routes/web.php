<?php

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

    #--------------UserModule------------------#
    #user-list
    Route::get('admin/user/list', 'AdminUserController@list');
    #user-add
    Route::get('admin/user/add', 'AdminUserController@add');
    Route::post('admin/user/store', 'AdminUserController@store');
    #user-delete
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');
    Route::get('admin/user/action', 'AdminUserController@action');
    #user-edit
    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user.edit');
    Route::post('admin/user/update{id}', 'AdminUserController@update')->name('user.update');
});
