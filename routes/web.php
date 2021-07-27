<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RecordController;
use \App\Http\Controllers\GenreController;
use \App\Http\Controllers\FormatController;
use \App\Http\Controllers\OriginController;
use \App\Http\Controllers\ManufacturerController;
use \App\Http\Controllers\TrackController;

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

Route::middleware('auth')->group(function () {
   // Route::get('/', [RecordController::class, 'index'])->name('record.index');
    Route::fallback([RecordController::class, 'index'])->name('record.index');
    Route::resource('record.track', TrackController::class)->shallow();
    Route::resource('record', RecordController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('format', FormatController::class);
    Route::resource('origin', OriginController::class);
    Route::resource('manufacturer', ManufacturerController::class);
});

Auth::routes();

