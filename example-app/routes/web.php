<?php

use Illuminate\Support\Facades\Route;

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
    return view('UpdateFoto');

Route::get('/image-upload', [UploadImageController::class, 'index'])->name('image.upload.index');
Route::post('/image-upload/store', [UploadImageController::class, 'store'])->name('image.upload.store');
});
