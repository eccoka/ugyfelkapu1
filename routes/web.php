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
Route::get('/files', 'HomeController@showFiles')->name('files');
Route::get('/messages', 'HomeController@showMessages')->name('messages');
Route::post('/messages', 'HomeController@readMessages')->name('read.messages');
Route::get('/personal', 'HomeController@changePersonal')->name('personal');
Route::post('/personal', 'HomeController@storePersonal')->name('store.personal');

Route::get('/file/delete', 'FileController@delete')->name('file.delete');
Route::resource('/file', 'FileController');
Route::resource('/message', 'MessageController');

/*
Route::get('/file', 'FileController@index')->name('file.index')->middleware('role:admin');
Route::get('/file/create', 'FileController@create')->name('file.create')->middleware('role:admin');
Route::post('/file', 'FileController@store')->name('file.store')->middleware('role:admin');
Route::delete('/file/{file}', 'FileController@destroy')->name('file.destroy')->middleware('role:admin');
//Route::get('/create', 'FileController@create')->name('file.create');
*/
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin', 'AdminController@store')->name('admin.store');
//show és edit -t lehet hogy kéne, hogy admin alol lehessen updateelni a user adatait?!
Route::put('/admin/{admin}', 'AdminController@update')->name('admin.update');   
Route::post('/admin/destroy', 'AdminController@destroy')->name('admin.destroy');