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
######### HOME-PAGE  #########
Route::get('esyo/home', 'HomePageController@index');
Route::get('esyo/home', 'HomePageController@index');
Route::get('esyo/news', 'HomePageController@news');
Route::get('esyo/access', 'HomePageController@access');
Route::get('esyo/corona', 'HomePageController@corona');
Route::get('esyo/job', 'HomePageController@job');
Route::get('esyo/contact', 'HomePageController@contact');
Route::get('esyo/campaign', function () {
    return view('Ramen.campaign');
});

#########  END HOME-PAGE   #########

######### SYSTEM CONTROL  #########
# authen user  logined ?
Route::middleware('auth')->group(function () {
    #--------------Dashboard------------------#
    Route::get('dashboard', 'DashboardController@show');
    Route::get('admin', 'DashboardController@show');

    #--------------User-Module------------------#
    #user-list
    Route::get('admin/user/list', 'AdminUserController@list');
    Route::get('admin/user/list/{id}', 'AdminUserController@listById');
    #user-add
    Route::get('admin/user/add', 'AdminUserController@add');
    Route::post('admin/user/store', 'AdminUserController@store');
    #user-delete
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('user_delete');
    Route::get('admin/user/action', 'AdminUserController@action');
    #user-edit
    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user_edit');
    Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('user_update');

    #--------------Product-Module------------------#

    Route::get('admin/product/list', 'AdminProductController@list')->name('product_list');
    Route::get('admin/product/add', 'AdminProductController@add');
    Route::get('admin/product/edit/{id}', 'AdminProductController@edit')->name('product_edit');
    Route::post('admin/product/store', 'AdminProductController@store');
    Route::get('admin/product/delete/{id}', 'AdminProductController@delete')->name('product_delete');
    Route::get('admin/product/action', 'AdminProductController@action');
    Route::post('admin/product/update/{id}', 'AdminProductController@update')->name('product_update');

    #--------------Post-Module------------------#
    Route::get('admin/post/add', 'AdminPostController@add');
    Route::post('admin/post/store', 'AdminPostController@store');
    Route::get('admin/post/list', 'AdminPostController@list');
});
######### END SYSTEM CONTROL  #########
