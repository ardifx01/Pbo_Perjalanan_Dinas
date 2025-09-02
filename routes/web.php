<?php

use Illuminatr\App\Http\Controllers\EmployeeExportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('idle');
});


Route::get('/login', function () {
    return view ('auth.login');
})->name('login');


// route export
Route::get('/export/employees', [EmployeeExportController::class, 'export'])->name('employees.export');

// route api untuk chart jumlah pegawai
Route::get('/api/employees/count', function () {
    $total = DB::table('employees')->count();

    return response()->json([
        'labels' => ['Total Pegawai'],
        'values' => [$total],
    ]);
});
