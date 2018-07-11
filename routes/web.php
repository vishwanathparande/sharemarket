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
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
//Route::get('/temp', 'Auth\RegisterController@temp')->name('temp');
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('/page1', 'HtmldemoController@page1')->name('page1');
Route::get('/page2', 'HtmldemoController@page2')->name('page2');
Route::get('/page3', 'HtmldemoController@page3')->name('page3');
Route::get('/page4', 'HtmldemoController@page4')->name('page4');
Route::get('/page5', 'HtmldemoController@page6')->name('page6');
