<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [ UserController::class, 'users'])->name('users');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::get('/tayo/{id}', [UserController::class, 'tayo'])->name('tayo');
Route::get( '/information/{id}', [UserController::class, 'information'])->name('information');
Route::post('/information/update/{id}', [UserController::class, 'information_update'])->name('information_update');
Route::post('/tayo/update/{id}', [UserController::class, 'tayo_update'])->name('tayo_update');
Route::post('/create-user', [UserController::class, 'user'])->name('user');
