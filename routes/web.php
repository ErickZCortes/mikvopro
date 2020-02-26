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

Route::get('/login', 'HomeController@login');
Route::get('/register', 'HomeController@registro');

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/profiles', 'HomeController@profiles');
Route::get('/reprint', 'HomeController@reprint');
Route::get('/rouerboard', 'HomeController@rouerboard');
Route::get('/user-profile', 'HomeController@userprofile');
Route::get('/design', 'HomeController@design');