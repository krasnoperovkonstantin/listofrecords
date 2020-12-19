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
    return view('records');
})->name('records');

Route::get('/edit', function () {
    return view('edit');
})->name('edit');

Route::post('/edit/submit', 'EditController@submit')->name('edit-form');