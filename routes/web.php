<?php

use App\Exports\PegawaiExport;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanDinasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Root route
Route::get('/', function () {
    return redirect()->route('login.show');
})->name('root');

// Auth routes
Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'LoginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout.process');

// Admin routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [admin::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/catatandinas', CatatanDinasController::class)->names('catatan');
// });

// Pegawai routes
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('#');
});

// Route export
Route::get('/export/pegawai', [ExportController::class, 'exportPegawai']);
