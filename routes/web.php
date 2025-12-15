<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::resource('surat', SuratController::class);
});

Route::middleware(['ceklogin', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.surat.index');
    })->name('admin.index');

    Route::get('/surat', [SuratController::class, 'index'])
        ->name('admin.surat.index');

    Route::patch('/surat/{id}/status', [SuratController::class, 'updateStatus'])
        ->name('admin.surat.updateStatus');
});
