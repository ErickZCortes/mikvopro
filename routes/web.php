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
Route::get('/login', 'ViewsController@viewlogin')->name('/login');
Route::get('/register', 'ViewsController@viewregister')->name('/register');
Route::get('/dashboard', 'ViewsController@viewdashboard')->name('/dashboard');
Route::get('/dashboard/user', 'ViewsController@viewuser')->name('/dashboard/user');
Route::get('/dashboard/profiles', 'ViewsController@viewprofiles')->name('/dashboard/profiles');
Route::get('/dashboard/routerboard', 'ViewsController@viewrouterboard')->name('/dashboard/routerboard');
Route::get('/dashboard/vouchers', 'ViewsController@viewvouchers')->name('/dashboard/vouchers');



//login and register
Route::post('/login', 'UserController@loginSession')->name('login');
Route::post('/register', 'UserController@registro');

//user functions
Route::get('/user/{id}', 'UserController@getuserbyid');
Route::put('/user/{id}', 'UserController@updateuser');

//router functions
Route::get('/routerboard', 'RouterController@getrouters');
Route::get('/routerboard/{id}', 'RouterController@getroutersbyid');
Route::post('/routerboard', 'RouterController@addrouter');
Route::put('/routerboard', 'RouterController@updaterouter');
Route::delete('/routerboard', 'RouterController@deleterouter');

//profiles functions
Route::get('/profiles', 'ProfilesController@getprofiles');
Route::get('/profile/{id}', 'ProfilesController@getprofilebyid');
Route::post('/profiles', 'ProfilesController@addprofile');
Route::put('/profiles', 'ProfilesController@updateprofile');
Route::delete('/profiles', 'ProfilesController@deleteprofile');

//vouchers functions
Route::get('/vouchers', 'VouchersController@getvouchers');
Route::get('/voucher/{id}', 'VouchersController@getvoucherbyid');
Route::post('/vouchers', 'VouchersController@addvoucher');
Route::delete('/vouchers', 'VouchersController@deletevoucher');

//detailvouchers functions
Route::get('/detail-vouchers', 'DetailvController@getdetail');
Route::post('/detail-vouchers', 'DetailvController@adddetail');
Route::delete('/detail-voucher', 'DetailvController@deletedetail');

