<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\teacher\DashboardPostController;
use App\Http\Controllers\teacher\TeacherPostController;
use App\Http\Controllers\user\UserCommentController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserPostController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['role:user,teacher', 'verified'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('post.show');
    Route::post('/posts/{id}', [UserCommentController::class, 'store'])->name('comment.store');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [UserController::class, 'resetPassword'])->name('password.update');
});


//teacher route
Route::middleware('role:teacher')->group(function () {

    Route::get('/teacher/dashboard', [DashboardPostController::class, 'showDashboard'])->name('teacher.dashboard');
    Route::get('/teacher/posts', [TeacherPostController::class, 'index'])->name('teacher.post.index');
    Route::get('/teacher/posts/create', [TeacherPostController::class, 'create'])->name('teacher.post.create');
    Route::post('/teacher/posts/create', [TeacherPostController::class, 'store'])->name('teacher.post.store');
    Route::get('/teacher/posts/{id}/edit', [TeacherPostController::class, 'edit'])->name('teacher.post.edit');
    Route::put('/teacher/posts/{id}', [TeacherPostController::class, 'update'])->name('teacher.post.update');
});


//Email verification code
Route::get('/email/verify', function () {

    if (Auth::user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }
    return view('auth.verify-email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

//Email verification handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('welcome')->with('success', 'Email verified successfully!');
})->middleware(['auth', 'signed'])->name('verification.verify');


// Resend verification email
Route::post('/email/verification-notifaction', function (Request $request) {

    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
