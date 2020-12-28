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
Auth::routes();

Route::get('/', 'RecordsController@get')->name('records');

Route::get('/insert', 'RecordsController@insert')->name('insert');
Route::post('/insert/submit', 'RecordsController@insertSubmit')->name('insert-submit');

Route::get('/update/{id}', 'RecordsController@update')->name('update');
Route::post('/update/{id}/submit', 'RecordsController@updateSubmit')->name('update-submit');

Route::get('/delete/{id}/submit', 'RecordsController@deleteSubmit')->name('delete-submit');


Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/home', 'HomeController@index')->name('home');
