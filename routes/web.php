<?php

Route::get('/', function () {
    return view('welcome');
});
//views 

Route::get('/dashboard', 'ViewsController@viewdashboard')->name('/dashboard');

//-----------------------------------------LOGIN-------------------------------------------//
Route::get('/login', 'UserController@index')->name('/login');
Route::post('/login', 'UserController@loginSession')->name('login');
Route::post('/logout', 'UserController@logout')->name('logout');
//-----------------------------------------REGISTER-------------------------------------------//
Route::get('/register', 'UserController@indexregister')->name('/register');
Route::post('/register/create', 'UserController@register')->name('/register/create');
//-----------------------------------------USER-------------------------------------------//
Route::get('/dashboard/user', 'UserController@indexuser')->name('/dashboard/user');
Route::get('/dashboard/user/edit/{id}','UserController@edit')->name('/dashboard/user/edit');
Route::put('/dashboard/user/update/{id}','UserController@update')->name('/dashboard/user/update');
Route::get('/dashboard/user/change-password/{id}','UserController@password')->name('/dashboard/user/change-password');
Route::post('/dashboard/user/updatepassword/{id}', 'UserController@updatepassword')->name('/dashboard/user/updatepassword');

//-----------------------------------------ROUTER-------------------------------------------//
Route::get('/dashboard/routerboard', 'RouterController@index')->name('/dashboard/routerboard');
Route::get('/dashboard/routerboard/create', 'RouterController@create')->name('/dashboard/routerboard/create');
Route::put('/dashboard/routerboard/store','RouterController@store')->name('/dashboard/routerboard/store');

Route::get('/dashboard/routerboard/router-info/{id}', 'RouterController@indexinfo')->name('/dashboard/routerboard/router-info');
Route::put('/dashboard/routerboard/info-add/{id}','RouterController@addinfo')->name('/dashboard/routerboard/info-add');

Route::get('/dashboard/routerboard/edit/{id}', 'RouterController@edit')->name('/dashboard/routerboard/edit');
Route::put('/dashboard/routerboard/update/{id}','RouterController@update')->name('/dashboard/routerboard/update');
Route::put('/dashboard/routerboard/delete/{id}', 'RouterController@destroy')->name('/dashboard/routerboard/delete');

Route::get('/dashboard/routerboard/conect/{id}', 'RouterController@conectrouter')->name('/dashboard/routerboard/conect');

Route::get('/dashboard/search-router', 'RouterController@searchrouter')->name('/dashboard/search-router');
//-----------------------------------------PROFILES-------------------------------------------//
Route::get('/dashboard/profiles', 'ProfilesController@index')->name('/dashboard/profiles');
Route::get('/dashboard/profiles/create', 'ProfilesController@create')->name('/dashboard/profiles/create');
Route::put('/dashboard/profiles/store','ProfilesController@store')->name('/dashboard/profiles/store');
Route::get('/dashboard/profiles/edit/{id}', 'ProfilesController@edit')->name('/dashboard/profiles/edit');
Route::put('/dashboard/profiles/update/{id}','ProfilesController@update')->name('/dashboard/profiles/update');
Route::put('/dashboard/profiles/delete/{id}', 'ProfilesController@destroy')->name('/dashboard/profiles/delete');
Route::get('/dashboard/search-profile', 'ProfilesController@searchprofiles')->name('/dashboard/search-profile');

//-----------------------------------------VOUCHERS-------------------------------------------//
Route::get('/dashboard/vouchers', 'VouchersController@create')->name('/dashboard/vouchers');
Route::put('/dashboard/vouchers/store','VouchersController@store')->name('/dashboard/vouchers/store');
Route::get('/dashboard/vouchers/created', 'VouchersController@index')->name('/dashboard/created');
Route::put('/dashboard/vouchers/update/{id}','VouchersController@update')->name('/dashboard/vouchers/update');
Route::put('/dashboard/vouchers/delete/{id}', 'VouchersController@destroy')->name('/dashboard/vouchers/delete');
Route::get('/dashboard/vouchers/generate', 'VouchersController@generate')->name('/dashboard/vouchers/generate');
Route::get('/dashboard/vouchers/design/{id}', 'VouchersController@design')->name('/dashboard/vouchers/design');
Route::put('/dashboard/vouchers/pdf/{id}','VouchersController@exportPdf')->name('/dashboard/vouchers/pdf');
Route::get('/dashboard/search-voucher', 'VouchersController@searchvouchers')->name('/dashboard/search-voucher');

//-----------------------------------------VOUCHERS-------------------------------------------//
Route::get('/dashboard/vouchers/reprint','VouchersController@indexreprint')->name('/dashboard/vouchers/reprint');
Route::get('/dashboard/vouchers/reprintvoucher/{id}','VouchersController@reprintvoucher')->name('/dashboard/vouchers/reprintvoucher');
//-----------------------------------------TEMPLATE-------------------------------------------//
Route::get('/dashboard/vouchers/template/{id}', 'VouchersController@indextemplate')->name('/dashboard/vouchers/template');
Route::put('/dashboard/vouchers/template/create/{id}', 'VouchersController@createmp')->name('/dashboard/vouchers/template/create');


Route::put('/delete-scripts', 'ViewsController@deletescript')->name('/delete-scripts');

Route::get('/prueba', 'MikrotikController@conection')->name('/prueba');


Route::get('chart', 'ViewsController@indexapi')->name('api.chart');