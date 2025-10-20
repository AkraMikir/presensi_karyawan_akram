<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PresensiController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// ==================== USER ROUTES ====================
Route::prefix('user')->name('user.')->group(function () {
    // User Login
    Route::get('/login', function () {
        return view('user.login');
    })->name('login');
    
    // User Dashboard (Protected)
    Route::get('/dashboard', function () {
        return view('user.dashboard-logged');
    })->name('dashboard');
    
    // User Presensi (Protected)
    Route::get('/presensi', function () {
        return view('user.presensi.index');
    })->name('presensi.index');
    
    // User Check In/Out (Protected)
    Route::get('/checkin', function () {
        return view('user.checkin');
    })->name('checkin');
    
    Route::get('/checkout', function () {
        return view('user.checkout');
    })->name('checkout');
});

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');
    
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Admin Presensi Management
    Route::prefix('presensi')->name('presensi.')->group(function () {
        Route::get('/', function () {
            return view('admin.presensi.index');
        })->name('index');
        
        Route::get('/checkin', function () {
            return view('presensi.checkin');
        })->name('checkin');
        
        Route::get('/checkout', function () {
            return view('presensi.checkout');
        })->name('checkout');
    });
    
    // Admin Karyawan Management
    Route::prefix('karyawan')->name('karyawan.')->group(function () {
        Route::get('/', function () {
            return view('admin.karyawan.index');
        })->name('index');
    });
    
    // Admin Perusahaan Management
    Route::prefix('perusahaan')->name('perusahaan.')->group(function () {
        Route::get('/', function () {
            return view('admin.perusahaan.index');
        })->name('index');
    });
    
    // Admin Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', function () {
            return view('admin.reports.index');
        })->name('index');
    });
});

// ==================== LEGACY ROUTES (for backward compatibility) ====================
// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Fallback route - redirect to user dashboard if route not found
Route::fallback(function () {
    return redirect()->route('user.dashboard');
});
