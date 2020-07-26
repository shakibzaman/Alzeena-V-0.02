<?php

use Illuminate\Http\Request;

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
Route::get('/getting/product/{id}', 'PublicApi\PosController@GetProduct');
Route::post('/orderdone', 'PublicApi\PosController@OrderDone');
Route::apiResource('/online-product', 'AdminApi\OnlineProductController');
Route::apiResource('/customer', 'AdminApi\CustomerController');
Route::apiResource('test', 'CategoryController');
Route::apiResource('/online-category','PublicApi\CategoryController');
Route::apiResource('/public-online-product','PublicApi\OnlineProductController');
Route::get('/addTocart/{id}', 'PublicApi\CartController@AddToCart');
Route::get('/cart/product', 'PublicApi\CartController@CartProduct');
Route::get('/remove/cart/{id}', 'PublicApi\CartController@removeCart');
Route::get('/increment/{id}', 'PublicApi\CartController@Increment');
Route::get('/decrement/{id}', 'PublicApi\CartController@Decrement');
Route::get('/related-product/{id}','PublicApi\OnlineProductController@related');
