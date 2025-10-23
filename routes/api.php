<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DivisiController;

// Public routes
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Protected routes
Route::group(['middleware' => 'jwt.auth'], function () {
    // Auth routes
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
    Route::get('/auth/user-profile', [AuthController::class, 'userProfile']);
    
    // Perusahaan routes
    Route::apiResource('perusahaan', PerusahaanController::class);
    
    // Jabatan routes
    Route::apiResource('jabatan', JabatanController::class);
    
    // Divisi routes
    Route::apiResource('divisi', DivisiController::class);
    
    // Presensi routes
    Route::apiResource('presensi', PresensiController::class);
    Route::post('/presensi/check-in', [PresensiController::class, 'checkIn']);
    Route::post('/presensi/check-out', [PresensiController::class, 'checkOut']);
});

// Legacy route for compatibility
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
