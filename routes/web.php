<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\user\UserCommentController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserPostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('role:user');
Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('post.show');
Route::post('/posts/{id}', [UserCommentController::class, 'store'])->name('comment.store');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
Route::put('/password', [UserController::class, 'resetPassword'])->name('password.update');
