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

Route::get('/', function () {
    return view('home');
});

//Auth::routes();   //TODO:Delete unused authorization


Route::get('/redirect', 'LoginController@redirectToProvider');
Route::get('/callback', 'LoginController@handleProviderCallback');

Route::get('login', 'LoginController@login');

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/create', 'OrdersController@create');
Route::get('/orders/{order}', 'OrdersController@show');
Route::post('/orders', 'OrdersController@store');


/*
Route::get('/orders/{order}/edit', 'OrdersController@edit');
Route::patch('/orders/{order}', 'OrdersController@update');
Route::delete('/orders/{order}', 'OrdersController@destroy');
*/
