<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('get.register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
    Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
});
