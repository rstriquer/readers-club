<?php

use App\Http\Controllers\BookGetUserAreaController;
use App\Http\Controllers\BookStoreUserAreaController;
use App\Http\Controllers\HomeIndexPublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeIndexPublicController::class)->name('public.index');
Route::name('user-area.')
    ->middleware(['auth'])
    ->prefix('user-area')
    ->group(function() {
        Route::get('{isbn}', BookGetUserAreaController::class)->name('get.isbn');
        Route::post('{isbn}', BookStoreUserAreaController::class)->name('post.isbn');
    });

// Route::get('/user-area' // user-area.list list book
// Route::delete('/user-area/{isbn}', BookDeleteUserAreaController::class) // delete book
// Route::get('/user-area/{isbn}' // add or edit user book (if does not exists show empty form)
