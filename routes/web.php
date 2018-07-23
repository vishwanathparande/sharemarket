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
//Route::get('/files', 'FilesController@index')->name('files');
//Route::get('/files/{id}/edit', 'FilesController@edit')->name('edit');
Route::resource('files', 'FilesController');
Route::resource('users', 'UsersController');
Route::post('/assignfiles', 'UsersController@assignfiles')->name('assignfiles');
Route::post('/unassignfiles', 'UsersController@unassignfiles')->name('unassignfiles');
Route::post('/deletefiles', 'FilesController@deletefiles')->name('deletefiles');
//Route::get('/users', 'FilesController@users')->name('users');
