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
    Route::get('/', 'HomeController@index')->name('home');    //Redirect common user to his profile, manager to control panel

    Route::get('/orders/create', 'OrdersController@create')->name('createOrder');    //User order create form
    Route::post('/orders', 'OrdersController@store');    //User new orders saving


    Route::get('/profile', 'UsersController@current')->name('currentProfile');    //User profile view

    Route::middleware('manager')->group(function () {

        Route::get('/profile/{id}', 'UsersController@show')->name('profile');    //Manager profiles view
        Route::get('/manager', 'OrdersController@index')->name('manager');    //Manager homepage
        Route::get('/manager/{id}', 'OrdersController@show')->name('order');    //Manager orders view
        //Route::get('/manager/{order}/review', 'OrdersController@edit');    //Manager orders review form

    });

});

Route::middleware('guest')->group(function () {
    Route::get('/redirect', 'LoginController@redirectToProvider');
    Route::get('/callback', 'LoginController@handleProviderCallback');

    Route::get('login', 'LoginController@login')->name('login');
});

Route::get('logout', 'LoginController@logout')->name('logout');
