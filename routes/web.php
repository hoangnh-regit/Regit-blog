<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
        Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
        Route::post('/forgot-password', [AuthController::class, 'postForgotPassword'])->name('post.forgot_password');
    });
});

Route::middleware(['auth','status'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('user')->group(function () {
        Route::get('/home', [UserController::class, 'index'])->name('user.home');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });
    Route::resource('blogs', BlogController::class);
    Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
        Route::post('/store/{blog_id}', [CommentController::class, 'store'])->name('store');
        Route::put('/update/{id}', [CommentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('delete');
    });
});

Route::group(['as' => 'blogs.', 'prefix' => 'blogs'], function () {
    Route::get('/{blog}', [BlogController::class, 'show'])->name('show')->middleware('view.blog.not.approved');
});

Route::get('/', [BlogController::class, 'home'])->name('home');

Route::middleware(['auth','admin'])->group(function () {
    Route::group(['as' => 'blogs.', 'prefix' => 'blogs'], function () {
        Route::put('/approved/{blog}', [BlogController::class, 'approved'])->name('approved');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    });
});
