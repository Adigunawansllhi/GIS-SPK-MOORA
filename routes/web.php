<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route:: post('/logout', [AuthController::class, 'logout'])->name('logout');

// admin route
Route::get('/user', [UserController::class, 'index'])->name('user');


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
