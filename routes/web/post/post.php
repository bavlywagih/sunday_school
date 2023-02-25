<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::post('/create', [PostController::class, 'createPost'])->name('posts.create');
Route::get('/load', [PostController::class, 'posts'])->name('load.post');
Route::get('/posts/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
Route::get('/post/{id}',   [PostController::class, 'postshare'])->name('postshare');
Route::get('/posts/edit/{id}',   [PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/update/{id}',  [PostController::class, 'update'])->name('post.update');
Route::post('/posts/image/upload', [PostController::class, 'uploadPostImage'])->name('posts.image.upload');
