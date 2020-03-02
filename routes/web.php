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
//views 

Route::get('/dashboard', 'ViewsController@viewdashboard')->name('/dashboard');

Route::get('/dashboard/vouchers/create', 'ViewsController@viewvouchers')->name('/dashboard/vouchers/create');
Route::get('/dashboard/vouchers/reprint', 'ViewsController@viewreprintvouchers')->name('/dashboard/vouchers/reprint');
Route::get('/dashboard/vouchers/design', 'ViewsController@viewdesignvoucher')->name('/dashboard/vouchers/design');


//-----------------------------------------LOGIN-------------------------------------------//
Route::get('/login', 'UserController@index')->name('/login');
Route::post('/login', 'UserController@loginSession')->name('login');
Route::post('/logout', 'UserController@logout')->name('logout');
//-----------------------------------------REGISTER-------------------------------------------//
Route::post('/register', 'UserController@register')->name('register');
//-----------------------------------------USER-------------------------------------------//
Route::get('/dashboard/user', 'UserController@indexuser')->name('/dashboard/user');
Route::get('/dashboard/user/edit/{id}','UserController@edit')->name('/dashboard/user/edit');
Route::put('/dashboard/user/update/{id}','UserController@update')->name('/dashboard/user/update');

//-----------------------------------------ROUTER-------------------------------------------//
Route::get('/dashboard/routerboard', 'RouterController@index')->name('/dashboard/routerboard');
Route::get('/dashboard/routerboard/create', 'RouterController@create')->name('/dashboard/routerboard/create');
Route::put('/dashboard/routerboard/store','RouterController@store')->name('/dashboard/routerboard/store');
Route::get('/dashboard/routerboard/edit/{id}', 'RouterController@edit')->name('/dashboard/routerboard/edit');
Route::put('/dashboard/routerboard/update/{id}','RouterController@update')->name('/dashboard/routerboard/update');
Route::put('/dashboard/routerboard/delete/{id}', 'RouterController@destroy')->name('/dashboard/routerboard/delete');

//-----------------------------------------PROFILES-------------------------------------------//
Route::get('/dashboard/profiles', 'ProfilesController@index')->name('/dashboard/profiles');
Route::get('/dashboard/profiles/create', 'ProfilesController@create')->name('/dashboard/profiles/create');
Route::put('/dashboard/profiles/store','ProfilesController@store')->name('/dashboard/profiles/store');
Route::get('/dashboard/profiles/edit/{id}', 'ProfilesController@edit')->name('/dashboard/profiles/edit');
Route::put('/dashboard/profiles/update/{id}','ProfilesController@update')->name('/dashboard/profiles/update');
Route::put('/dashboard/profiles/delete/{id}', 'ProfilesController@destroy')->name('/dashboard/profiles/delete');

//-----------------------------------------VOUCHERS-------------------------------------------//
Route::get('/dashboard/vouchers', 'VouchersController@index')->name('/dashboard/vouchers');
Route::get('/dashboard/vouchers/create', 'VouchersController@create')->name('/dashboard/vouchers/create');
Route::put('/dashboard/vouchers/store','VouchersController@store')->name('/dashboard/vouchers/store');

//vouchers functions

Route::get('/voucher/{id}', 'VouchersController@getvoucherbyid');
Route::post('/vouchers', 'VouchersController@addvoucher');
Route::delete('/vouchers', 'VouchersController@deletevoucher');

//detailvouchers functions
Route::get('/detail-vouchers', 'DetailvController@getdetail');
Route::post('/detail-vouchers', 'DetailvController@adddetail');
Route::delete('/detail-voucher', 'DetailvController@deletedetail');


