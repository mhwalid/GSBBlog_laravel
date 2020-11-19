<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/w', function () {
    return view('welcome');
});


Route::get('/index', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/home', 'PagesController@home');
Route::get('/services', 'PagesController@services');

//that will create alle resourcez route

Route::resource('posts', 'PostsController');


