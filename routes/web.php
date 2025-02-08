<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\teacher\DashboardPostController;
use App\Http\Controllers\teacher\TeacherPostController;
use App\Http\Controllers\user\UserCommentController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserPostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

// Guest Routes
Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Authenticated User Routes
Route::middleware(['role:user,teacher', 'verified'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('post.show');
    Route::post('/posts/{id}', [UserCommentController::class, 'store'])->name('comment.store');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [UserController::class, 'resetPassword'])->name('password.update');
});


//teacher route
Route::middleware(['role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', [DashboardPostController::class, 'showDashboard'])->name('teacher.dashboard');
    Route::controller(TeacherPostController::class)->group(function () {
        Route::get('/teacher/posts', 'index')->name('teacher.post.index');
        Route::get('/teacher/posts/create', 'create')->name('teacher.post.create');
        Route::post('/teacher/posts/create', 'store')->name('teacher.post.store');
        Route::get('/teacher/posts/{id}/edit', 'edit')->name('teacher.post.edit');
        Route::put('/teacher/posts/{id}', 'update')->name('teacher.post.update');
    });
});

// Email Verification Routes
Route::controller(EmailVerificationController::class)->group(function () {

    //Email verification code
    Route::get('/email/verify', 'showVerificationForm')->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

    //Email verification handler
    Route::get('/email/verify/{id}/{hash}', 'verifyEmail')->middleware(['auth', 'signed'])->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notifacation', 'resendVerificationEmail')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});


//Admin Route
Route::controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'showTotals')->name('admin.dashboard');
});


// tester route for view template design
Route::view('/admin/create/post', 'admin.posts.create')->name('admin.post.create');
Route::view('/admin/posts', 'admin.posts.index')->name('admin.post.index');

Route::view('/admin/users', 'admin.users.index')->name('admin.user.index');
Route::view('/admin/users/create', 'admin.users.create')->name('admin.user.create');
