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
    Route::get('/', 'HomeController@redirectToHome')
        ->name('home');    //Redirect common user to his profile, manager to control panel

    Route::resource('orders', 'OrderController')
        ->only(['create', 'store', 'show'])
        ->names('order');

    Route::get('/profile', 'UserController@current')->name('user.profile');    //User profile view


    Route::group(['middleware' => 'manager', 'prefix' => 'manager', 'namespace' => 'Admin'], function () {

        Route::get('/', 'HomeController@admin')->name('admin.home');

        Route::group(['prefix' => 'orders'], function() {
            $methods = ['index', 'show', 'update'];
            Route::resource('debt', 'DebtOrderController')
                ->only($methods)
                ->names('admin.order.debt');

            Route::resource('income', 'IncomeOrderController')
                ->only($methods)
                ->names('admin.order.income');

            Route::resource('study', 'StudyOrderController')
                ->only($methods)
                ->names('admin.order.study');
        });

        Route::resource('users', 'UserController')
        ->only(['index', 'show', 'edit', 'update'])
            ->names('admin.user');

        Route::resource('roles', 'RoleController')
            ->except(['create'])
            ->names('admin.role');
        Route::resource('permissions', 'PermissionController')
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
