<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\AuthController;

Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index'); // Display all doctors
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store'); // Store a new doctor
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy'); // Delete a doctor

Route::get('pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::post('pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

Route::get('periksa', [PeriksaController::class, 'index'])->name('periksa.index');
Route::post('periksa', [PeriksaController::class, 'store'])->name('periksa.store');
Route::get('periksa/{id}/edit', [PeriksaController::class, 'edit'])->name('periksa.edit');
Route::put('periksa/{id}', [PeriksaController::class, 'update'])->name('periksa.update');
Route::delete('periksa/{id}', [PeriksaController::class, 'destroy'])->name('periksa.destroy');
Route::get('periksa/{id}', [PeriksaController::class, 'show'])->name('periksa.show');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk melindungi halaman pasien, dokter, dan periksa
Route::middleware(['auth'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa.index');
});


Route::get('/home', function () {
    return view('home');  // Pastikan ada file view home.blade.php
})->name('home');


