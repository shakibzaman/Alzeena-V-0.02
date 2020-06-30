<?php

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

use App\User;
Route::get('/', function () {
    return view('homepage');
});

Route::get('/mark-all-read/{user}', function (User $user) {
    $user->unreadNotifications->markAsRead();
    return response(['message'=>'done', 'notifications'=>$user->notifications]);
});
//Route::get('/{any}', 'PublicController@index')->where('any', '.*');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route::any('/api/{any}', 'AdminController@index')->where('any','.*');

//Orginal

Route::any('/admin/{any?}', 'AdminController@index')->where('any','.*')->middleware('auth');
//Route::get('/{any}', 'PublicController@index')->where('any','.*');

//Active route
//Route::get('/admin/{any}', 'AdminController@index')->where('any','.*');
//Route::get('/{any}', 'PublicController@index')->where('any','.*');



Route::get('/{any}', function () {
    return view('homepage');
});

//Route::get('/admin/{any}', function () {
//    return view('admin');
//});
//Route::get('/{any}', function () {
//    return view('homepage');
//});

//Route::get('/{path}', function () {
//    return view('homepage');
//});
//
//Route::get('/{path}/{any}', function () {
//    return view('admin');
//});

//Route::group(['prefix' => 'admin'], function () {
//    Route::get('/{any}', function ()    {
//        return view('admin');
//    });
//});
//Route::get('/{any}', function () {
//    return view('homepage');
//});

//Route::get('/{anypath}','PublicController@index')->where('path','.*');
