<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostManagementController;
use App\Http\Controllers\admin\UserManagementController;
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
Route::middleware(['role:user,teacher,admin', 'verified'])->group(function () {
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
        Route::delete('/teacher/posts/{id}/delete', 'destroy')->name('teacher.post.destroy');
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
Route::controller(DashboardController::class)->middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', 'showTotals')->name('admin.dashboard');
});


// tester route for view template design'

Route::middleware(['role:admin'])->controller(UserManagementController::class)->group(function () {
    Route::get('/admin/users', 'showAllUsers')->name('admin.show.users');
    Route::get('/admin/teachers', 'showAllTeachers')->name('admin.show.teachers');
    Route::get('/admin/admins', 'showAllAdmins')->name('admin.show.admins');
    Route::get('/admin/users/create', 'create')->name('admin.user.create');
    Route::post('/admin/users/create', 'store')->name('admin.user.store');

    Route::get('/admin/users/{id}/edit', 'edit')->name('admin.user.edit');
    Route::put('/admin/users/{id}/edit', 'update')->name('admin.user.update');
    Route::delete('/admin/users/{id}/delete', 'destroy')->name('admin.user.destroy');
});
// Route::view('/admin/users/create', 'admin.users.create')->name('admin.user.create');


Route::get('/admin/posts', [PostManagementController::class, 'index'])->name('admin.post.index');

Route::get('/admin/create/post', [PostManagementController::class, 'create'])->name('admin.post.create');
Route::post('/admin/create/post', [PostManagementController::class, 'store'])->name('admin.post.store');
Route::get('/admin/posts/{id}/edit', [PostManagementController::class, 'edit'])->name('admin.post.edit');
Route::put('/admin/posts/{id}/edit', [PostManagementController::class, 'update'])->name('admin.post.update');
Route::delete('/admin/posts/{id}/delete', [PostManagementController::class, 'destroy'])->name('admin.post.destroy');
// Route::view('/admin/create/post', 'admin.posts.create')->name('admin.post.create');
