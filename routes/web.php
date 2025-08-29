<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('idle');
});


Route::get('/login', function () {
    return view ('auth.login');
})->name('login');
