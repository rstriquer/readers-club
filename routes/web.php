<?php

use App\Http\Controllers\BookGetUserAreaController;
use App\Http\Controllers\HomeIndexPublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeIndexPublicController::class)->name('public.index');
Route::get('/user-area/{isbn}', BookGetUserAreaController::class)->name('user-area.get.isbn');

// Route::get('/user-area' // user-area.list list book
// Route::delete('/user-area/{isbn}', BookDeleteUserAreaController::class) // delete book
// Route::get('/user-area/{isbn}' // add or edit user book (if does not exists show empty form)
// Route::post('/user-area/{isbn}',  // store book
