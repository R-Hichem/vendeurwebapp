<?php

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::/*middleware('myproviderhastoken')->*/get('/products', "ProductController@index");

// Route::post('/transaction', "TransactionController@store");

// Route::post('/provider', "ProviderController@auth")->middleware('myproviderauth');


Route::post('/login', 'UserController@login');

Route::middleware('auth:sanctum')->post('/logout', 'UserController@logout');

Route::middleware('auth:sanctum')->get('/orders', 'OrderController@list');

Route::middleware('auth:sanctum')->get('/orders/{order_id}', 'OrderController@show');

Route::middleware('auth:sanctum')->post('/orders/history', 'OrderController@history');

Route::middleware('auth:sanctum')->post('/orders/{order_id}', 'OrderController@add');

Route::middleware('auth:sanctum')->post('/orderswithjson/{order_id}', 'OrderController@addWithJsonDetails');

Route::post('/ordersFromOtherServer', 'OrderController@addFromOtherServer');

Route::middleware('auth:sanctum')->post('/orders/issueQR/{order_id}', 'OrderController@issueQR');