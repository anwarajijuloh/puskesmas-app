<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/reset-password', [AuthController::class, 'resetpass'])->name('resetpass');
Route::post('/register/store', [AuthController::class, 'store'])->name('store');
Route::post('/login/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('patient')->group(function () {
    Route::get('/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/queues{poli_id?}', [QueueController::class, 'index'])->name('patient.queue');
    Route::post('/queues/store', [QueueController::class, 'store'])->name('patient.storequeue');
    Route::post('/queues/delete/{id}', [QueueController::class, 'destroy'])->name('patient.destroyqueue');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('patient.appointment');
    Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('patient.appointmentstore');
    Route::post('/appointment/{id}', [AppointmentController::class, 'destroy'])->name('patient.appointmentdestroy');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('patient.healthrecord');
    Route::get('/message', [MessageController::class, 'index'])->name('patient.message');
    Route::get('/message/{sender_id?}', [MessageController::class, 'index'])->name('patient.message');
    Route::post('/message/store', [MessageController::class, 'store'])->name('patient.messagestore');
    Route::get('/profile', [UserController::class, 'profile'])->name('patient.profile');
    Route::get('/setting', [UserController::class, 'setting'])->name('patient.setting');
    Route::post('/setting/update-profile', [UserController::class, 'updateProfile'])->name('patient.updateProfile');
    Route::post('/setting/update-photo', [UserController::class, 'updatePhoto'])->name('patient.updatePhoto');
    Route::post('/setting/update-password', [UserController::class, 'updatePassword'])->name('patient.updatePassword');
});
Route::middleware('doctorAuth')->prefix('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('doctor.attendance');
    Route::get('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::get('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('doctor.appointment');
    Route::post('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('doctor.appointmentupdate');
    Route::get('/health-record', [HealthRecordController::class, 'index'])->name('doctor.healthrecord');
    Route::post('/health-record/store', [HealthRecordController::class, 'store'])->name('doctor.healthrecordstore');
    Route::get('/message', [MessageController::class, 'index'])->name('doctor.message');
    Route::get('/message/{sender_id?}', [MessageController::class, 'index'])->name('doctor.message');
    Route::post('/message/store', [MessageController::class, 'store'])->name('doctor.messagestore');
    Route::get('/profile', [UserController::class, 'profile'])->name('doctor.profile');
    Route::get('/setting', [UserController::class, 'setting'])->name('doctor.setting');
    Route::post('/setting/update-profile', [UserController::class, 'updateProfile'])->name('doctor.updateProfile');
    Route::post('/setting/update-photo', [UserController::class, 'updatePhoto'])->name('doctor.updatePhoto');
    Route::post('/setting/update-password', [UserController::class, 'updatePassword'])->name('doctor.updatePassword');
});
Route::middleware('adminAuth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/doctor-request', [AdminController::class, 'showDoctorRequests'])->name('admin.doctor-request');
    Route::patch('/doctor-request/{id}/approve', [AdminController::class, 'approveDoctorRequest'])->name('admin.doctor-request.approve');
    Route::patch('/doctor-request/{id}/reject', [AdminController::class, 'rejectDoctorRequest'])->name('admin.doctor-request.reject');
    Route::get('/appointment', [AdminController::class, 'appointment'])->name('admin.appointment');
});