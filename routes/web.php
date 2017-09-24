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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::get('/home', 'HomeController@index');
//Articales
Route::get('/newArticale', 'HomeController@newArticale');
Route::post('/newArticale', 'HomeController@newArticale');


Route::get('/articale/{id}', 'HomeController@articale');

Route::post('/like/{id}', 'HomeController@like');
Route::post('/dislike/{id}', 'HomeController@dislike');