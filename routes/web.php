<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use Illuminate\Support\Js;

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
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');

// Route untuk manajemen kerusakan
Route::get('/kerusakan', [KerusakanController::class, 'index'])->name('kerusakan.index');
Route::get('/kerusakan/create', [KerusakanController::class, 'create'])->name('kerusakan.create');
Route::post('/kerusakan', [KerusakanController::class, 'store'])->name('kerusakan.store');
Route::get('/kerusakan{id}/edit', [KerusakanController::class, 'edit'])->name('kerusakan.edit');
Route::put('/kerusakan{id}', [KerusakanController::class, 'update'])->name('kerusakan.update');
Route::delete('/kerusakan/{id}', [KerusakanController::class, 'destroy'])->name('kerusakan.delete');

// Route untuk manajemen jenis infrastruktur
Route::get('/jenisInfrastruktur', [JenisController::class, 'index'])->name('jenis.index');
Route::get('/jenis/create', [JenisController::class, 'create'])->name('jenis.create');
Route::post('/jenis', [JenisController::class, 'store'])->name('jenis.store');
Route::get('/jenis{id}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
Route::put('/jenis{id}', [JenisController::class, 'update'])->name('jenis.update');
Route::delete('/jenis/{id}', [JenisController::class, 'destroy'])->name('jenis.delete');

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
