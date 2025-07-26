<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('auth')->get('/index', function () {
    return view('layouts.home');
})->name('index');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register.submit', [AuthController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/update-access', [UserController::class, 'updateAccess'])->name('update.access');
    Route::patch('/user/{user:email}/access', [UserController::class, 'updateAccessInline'])->name('user.update.access');
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('view.dashboard');
    Route::get('/pdrb', [DashboardController::class, 'showPDRB'])->name('view.pdrb');
    Route::get('/kesejahteraan', [DashboardController::class, 'showKesejahteraan'])->name('view.kesejahteraan');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
