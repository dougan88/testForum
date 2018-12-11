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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@profile')->name('profile')->middleware('auth');
Route::get('/add-thread', 'ThreadController@add')->name('add-thread')->middleware('auth');
Route::get('/list-threads', 'ThreadController@index')->name('list-threads')->middleware('auth');

Route::get('/view-thread/{thread}', 'ThreadController@show')->name('view-thread')->middleware('auth');
Route::post('/create-thread', 'ThreadController@store')->name('create-thread')->middleware('auth');
