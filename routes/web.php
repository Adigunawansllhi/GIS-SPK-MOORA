<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('home');
});

// Route untuk registrasi dan login
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk manajemen pengguna
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Menampilkan daftar pengguna
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Menyimpan data pengguna

// Route untuk dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/pimpinan/dashboard', function () {
    return view('pimpinan.dashboard');
})->middleware('auth');

Route::get('/masyarakat/dashboard', function () {
    return view('masyarakat.dashboard');
})->middleware('auth');
