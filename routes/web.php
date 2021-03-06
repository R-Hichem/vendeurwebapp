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

Route::get('/',  'PlatformController@index');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accueil', 'PlatformController@index');

Route::get('/products/{id}', 'PlatformController@show');

Route::post('/addtocart', 'PlatformController@addToCart');

Route::get('/cart', 'PlatformController@showCart');

Route::get('/checkout', 'PlatformController@checkoutIndex');

Route::post('/checkout_finalize', 'PlatformController@checkoutFinalize');

Route::get('/order_status', 'PlatformController@orderStatusIndex');

Route::post('/order_status', 'PlatformController@orderStatus');