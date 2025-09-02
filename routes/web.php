<?php

use App\Http\Controllers\EmployeeExportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanDinasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/catatandinas', CatatanDinasController::class)->names('catatan');
});

// Pegawai routes
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
});

// Route export
Route::get('/export/employees', [EmployeeExportController::class, 'export'])->name('employees.export');

// Route api untuk chart jumlah pegawai
Route::get('/api/employees/count', function () {
    $total = DB::table('employees')->count();

    return response()->json([
        'labels' => ['Total Pegawai'],
        'values' => [$total],
    ]);
});
