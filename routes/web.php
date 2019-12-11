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

Route::get('/create', 'FileController@create')->name('file.create')->middleware('role:admin');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin', 'AdminController@store')->name('admin.store')->middleware('role:admin');
Route::get('/admin/create', 'AdminController@create')->name('admin.create')->middleware('role:admin');
Route::get('/admin/{admin}', 'AdminController@show')->name('admin.show')->middleware('role:admin');
Route::put('/admin/{admin}', 'AdminController@update')->name('admin.show')->middleware('role:admin');
Route::post('/admin/delete', 'AdminController@delete')->name('admin.delete')->middleware('role:admin');