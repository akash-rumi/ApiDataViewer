<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostTypicodeController;
use App\Http\Controllers\PostPlaceholderOrgController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts-typicode', [PostTypicodeController::class, 'index'])->name('posts-typicode.index');
Route::get('/posts-placeholder', [PostPlaceholderOrgController::class, 'index'])->name('posts-placeholder.index');
Route::get('/posts-placeholder/{id}', [PostPlaceholderOrgController::class, 'show'])->name('posts-placeholder.show');

