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
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [admin::class, 'index'])->name('admin.dahsboard');
    Route::get('/admin/daftar_pegawai', [PegawaiController::class, 'list'])->name('admin.pegawai.list');
    Route::get('/admin/daftar_pegawai/create', [PegawaiController::class, 'create'])->name('admin.pegawai.create');
    Route::post('/admin/daftar_pegawai/store', [PegawaiController::class, 'store'])->name('admin.pegawai.store');
    Route::get('/admin/daftar_pegawai/edit', [PegawaiController::class, 'edit'])->name('admin.pegawai.edit');
    Route::put('/admin/pegawai/edit', [PegawaiController::class, 'update'])->name('admin.pegawai.update');
    Route::resource('/admin/catatandinas', CatatanDinasController::class)->names('admin.catatan');
});

// Pegawai routes
Route::middleware(['role:pegawai'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::resource('/pegawai/catatandinas', CatatanDinasController::class)->names('pegawai.catatan');
});

// Route export
Route::get('/export/pegawai', [ExportController::class, 'exportPegawai']);
