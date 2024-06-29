<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PasienDashboardController;
use App\Http\Controllers\RiwayatKesehatanController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/queue', [LandingController::class, 'queue'])->name('queue');
Route::get('/poli', [LandingController::class, 'poli']);
Route::get('/doctor', [LandingController::class, 'doctor']);
Route::get('/about', [LandingController::class, 'about']);

Route::group(['prefix' => 'pasien'], function () {
    // guest middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'loginPasien'])->name('pasien.login');
        Route::get('/register', [AuthController::class, 'register'])->name('pasien.register');
        Route::post('/auth-register', [AuthController::class, 'authRegister'])->name('pasien.processRegister');
        Route::post('/login-auth', [AuthController::class, 'authPasien'])->name('pasien.auth');
    });
    // auth middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [AuthController::class, 'logoutPasien'])->name('pasien.logout');
        Route::get('/dashboard', [PasienDashboardController::class, 'index'])->name('pasien.dashboard');
        Route::get('/queue', [AntrianController::class, 'indexPasien'])->name('pasien.antrian');
        Route::get('/history', [RiwayatKesehatanController::class, 'indexPasien'])->name('pasien.riwayat');
        Route::get('/profile', [PasienController::class, 'profile'])->name('pasien.profile');
        Route::get('/setting', [PasienController::class, 'setting'])->name('pasien.setting');
        Route::post('/setting/update-profile', [PasienController::class, 'updateProfile'])->name('pasien.updateprofile');
    });
});
Route::group(['prefix' => 'dokter'], function () {
    // guest middleware
    Route::group(['middleware' => 'dokter.guest'], function () {
        Route::get('/login', [AuthController::class, 'loginDokter'])->name('dokter.login');
        Route::post('/auth-dokter', [AuthController::class, 'authDokter'])->name('dokter.auth');
    });
    // auth middleware
    Route::group(['middleware' => 'dokter.auth'], function () {
        Route::get('/logout', [AuthController::class, 'logoutDokter'])->name('dokter.logout');
        Route::get('/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
        Route::get('/queue', [AntrianController::class, 'indexDokter'])->name('dokter.antrian');
        Route::get('/health-record', [RiwayatKesehatanController::class, 'indexDokter'])->name('dokter.rekmed');
        Route::get('/history', [RiwayatKesehatanController::class, 'indexDokter'])->name('dokter.riwayat');
        Route::get('/profile', [DokterController::class, 'profile'])->name('dokter.profile');
        Route::get('/setting', [DokterController::class, 'setting'])->name('dokter.setting');
    });
});