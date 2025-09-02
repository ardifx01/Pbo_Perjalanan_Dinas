<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\catatanDinasController;
use App\Http\Controllers\pegawai;
use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
return redirect()->route('login.show');
})->name('root');
    
Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'LoginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout.process');


Route::middleware(['auth:pegawai', 'pegawai:admin'])->group(function () {
    Route::get('/admin', [admin::class, 'index'])
         ->name('admin.dashboard');
    Route::resource('/admin/catatandinas', catatanDinasController::class)->names('catatan');
});

Route::middleware(['auth:pegawai', 'pegawai:pegawai'])->group(function () {
    Route::get('/pegawai', [pegawai::class, 'index'])
         ->name('pegawai.dashboard');
});
