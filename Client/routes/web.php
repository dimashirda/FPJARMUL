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

Route::get('/', 'VideoController@index') ;
Route::get('/home', 'HomeController@index');

Route::get('/user/upload', 'UserController@uploadForm');
Route::get('/login','HomeController@login');
Route::get('/register', 'HomeController@register');

Route::get('/video/test', 'VideoController@single');