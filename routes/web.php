<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;

// use App\Http\Controllers\Auth\LoginController::middleware();
// Route::get('/posts',[PostController::class,'index']);

// Route::get('/posts/create',[PostController::class,'create']);

// Route::post('/posts', [PostController::class,'store']);

// Route::get('/posts/{id}',[PostController::class,'show']);

// Route::get('/posts/{id}/edit',[PostController::class,'edit']);

// Route::put('/posts/{id}',[PostController::class,'update']);

// Route::delete('/posts/{id}',[PostController::class,'destroy']);  

Route::resource('posts',PostController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/posts/{id}/comments', [CommentController::class,'store'])->name('comments.store');
Route::get('/posts/{id}/comments/create', [CommentController::class,'create'])->name('comments.create');



Route::get('/auth/github', [LoginController::class, 'redirectToGitHub']);
Route::get('/auth/github/callback', [LoginController::class, 'handleGitHubCallback']);
