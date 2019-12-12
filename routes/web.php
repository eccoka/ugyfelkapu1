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
Route::post('/admin/store', 'AdminController@store')->name('admin.store')->middleware('role:admin');
//show és edit -t lehet hogy kéne, hogy admin alol lehessen updateelni a user adatait?!
Route::post('/admin/update', 'AdminController@update')->name('admin.update')->middleware('role:admin');
Route::post('/admin/destroy', 'AdminController@destroy')->name('admin.destroy')->middleware('role:admin');