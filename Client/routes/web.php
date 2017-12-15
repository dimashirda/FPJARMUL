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

Route::get('/', 'HomeController@index') ;
Route::get('/home', 'HomeController@index');

Route::get('/user/upload', 'UserController@uploadForm');
Route::get('/login','LoginController@view');
Route::post('/login','LoginController@loggedin');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@registered');
Route::get('/logout','LoginController@logout');
Route::get('/profile/{idUser}','ProfileController@index');
Route::get('/user','ProfileController@user');
Route::get('/editprofile','ProfileController@edit');
Route::get('/trending','VideoController@trending');
Route::get('/sport','VideoController@sport');
Route::get('/games','VideoController@games');
Route::get('/education','VideoController@education');
Route::get('/music','VideoController@music');
Route::get('/entertainment','VideoController@entertainment');

Route::post('/editprofile','ProfileController@edited');
Route::get('/search','HomeController@search');

Route::get('/video/test', 'VideoController@single');
Route::post('/video/comment', 'VideoController@comment');
Route::get('/video', 'VideoController@watch');
Route::get('/video/{id}/{quality}', 'VideoController@watch');
Route::get('/like/{id}', 'VideoController@like');
Route::get('/dislike/{id}', 'VideoController@dislike');

