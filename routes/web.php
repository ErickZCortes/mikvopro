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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'UserController@viewlogin')->name('/login');
Route::get('/register', 'UserController@register')->name('/register');

Route::get('/dashboard', 'UserController@dashboard');



Route::post('/login', 'UserController@login')->name('/login');
Route::post('/register', 'UserController@registro')->name('/register');
Route::get('/user/{id}', 'UserController@getuserbyid');
Route::put('/user/{id}', 'UserController@updateuser');

Route::get('/routerboard', 'RouterController@getrouters');
Route::get('/routerboard/{id}', 'RouterController@getroutersbyid');
Route::post('/routerboard', 'RouterController@addrouter');
Route::put('/routerboard', 'RouterController@updaterouter');
Route::delete('/routerboard', 'RouterController@deleterouter');

Route::get('/profiles', 'ProfilesController@getprofiles');
Route::get('/profile/{id}', 'ProfilesController@getprofilebyid');
Route::post('/profiles', 'ProfilesController@addprofile');
Route::put('/profiles', 'ProfilesController@updateprofile');
Route::delete('/profiles', 'ProfilesController@deleteprofile');

Route::get('/vouchers', 'VouchersController@getvouchers');
Route::get('/voucher/{id}', 'VouchersController@getvoucherbyid');
Route::post('/vouchers', 'VouchersController@addvoucher');
Route::delete('/vouchers', 'VouchersController@deletevoucher');

Route::get('/detail-vouchers', 'DetailvController@getdetail');
Route::post('/detail-vouchers', 'DetailvController@adddetail');
Route::delete('/detail-voucher', 'DetailvController@deletedetail');