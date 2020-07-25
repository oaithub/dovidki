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


Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')
        ->name('home');    //Redirect common user to his profile, manager to control panel

    Route::resource('orders', 'OrderController')
        ->only(['create', 'store', 'show'])
        ->names('order');

    Route::get('/profile', 'UserController@current')->name('user.profile');    //User profile view

    Route::group(['middleware' => 'manager', 'prefix' => 'manager'], function () {

        Route::resource('users', 'Admin\UserController')
            ->only(['index', 'show'])
            ->names('admin.user');

        Route::get('/orders/in-queue', 'Admin\OrderController@inQueue')->name('admin.order.inQueue');
        Route::get('/orders/issued', 'Admin\OrderController@issued')->name('admin.order.issued');
        Route::get('/orders/ready', 'Admin\OrderController@ready')->name('admin.order.ready');

        Route::resource('orders', 'Admin\OrderController')
            ->only(['index', 'show', 'update'])
            ->names('admin.order');

        Route::resource('roles', 'Admin\RoleController')
            ->except(['create'])
            ->names('admin.role');
        Route::resource('permissions', 'Admin\PermissionController')
            ->only(['index', 'show'])
            ->names('admin.permission');
    });

});

Route::middleware('guest')->group(function () {
    Route::get('/redirect', 'LoginController@redirectToProvider');
    Route::get('/callback', 'LoginController@handleProviderCallback');

    Route::get('login', 'LoginController@login')->name('login');
});

Route::get('logout', 'LoginController@logout')->name('logout');
