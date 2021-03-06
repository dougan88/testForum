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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', 'ProfileController@profile')->name('profile');

    Route::get('/add-thread', 'ThreadController@add')->name('add-thread');
    Route::get('/list-threads', 'ThreadController@userThreads')->name('list-threads');
    Route::get('/threads', 'ThreadController@allThreads')->name('threads');
    Route::get('/delete-thread/{thread}', 'ThreadController@destroy')->name('delete-thread');
    Route::get('/edit-thread/{thread}', 'ThreadController@edit')->name('edit-thread');
    Route::post('/update-thread/{thread}', 'ThreadController@update')->name('update-thread');
    Route::get('/view-thread/{thread}', 'ThreadController@show')->name('view-thread');
    Route::post('/create-thread', 'ThreadController@store')->name('create-thread');

    Route::get('/reply-thread/{thread}', 'ReplyController@reply')->name('reply-thread');
    Route::post('/create-reply/{thread}', 'ReplyController@store')->name('create-reply');
});
