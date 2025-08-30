<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('idle');
});


Route::get('/login', [AuthController::class, 'ShowLogin'])->name('auth.Showlogin');
