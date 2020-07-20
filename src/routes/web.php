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

    Route::get('/orders/create', 'OrderController@create')->name('order:create');    //User order create form
    Route::post('/orders', 'OrderController@store')->name('order:store');    //User new orders saving
    Route::get('/orders/{id}', 'OrderController@show')->name('order:show');    //User order full view


    Route::get('/profile', 'UserController@current')->name('user:profile');    //User profile view

    Route::group(['middleware' => 'manager', 'prefix' => 'manager'], function () {

        Route::get('/users', 'Admin\UserController@index')->name('manager:users_all');    //Manager profiles view
        Route::get('/users/{id}', 'Admin\UserController@show')->name('manager:user_profile');    //Manager profiles view

        Route::get('/orders', 'Admin\OrderController@index')->name('manager:orders_all');    //Manager all orders view
        Route::get('/orders/in-queue', 'Admin\OrderController@inQueue')->name('manager:orders_in_queue');    //Manager all issued orders
        Route::get('/orders/issued', 'Admin\OrderController@issued')->name('manager:orders_issued');    //Manager all issued orders
        Route::get('/orders/ready', 'Admin\OrderController@ready')->name('manager:orders_ready');    //Manager all ready orders
        Route::get('/orders/{id}', 'Admin\OrderController@show')->name('manager:order');    //Manager orders view
        Route::patch('/manager/orders/{order}', 'Admin\OrderController@update')->name('manager:order_update');    //Manager orders update

    });

});

Route::middleware('guest')->group(function () {
    Route::get('/redirect', 'LoginController@redirectToProvider');
    Route::get('/callback', 'LoginController@handleProviderCallback');

    Route::get('login', 'LoginController@login')->name('login');
});

Route::get('logout', 'LoginController@logout')->name('logout');
