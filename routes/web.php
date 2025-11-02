<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', fn () => redirect()->route('mahasiswa.index'));

// -- TARUH ROUTE KHUSUS DI ATAS RESOURCE --
Route::get('/mahasiswa/export-excel', [MahasiswaController::class, 'exportExcelView'])
    ->name('mahasiswa.export');

Route::get('/mahasiswa/pdf', [MahasiswaController::class, 'cetakPDF'])
    ->name('mahasiswa.pdf');

// -- TERAKHIR: RESOURCE CRUD --
Route::resource('mahasiswa', MahasiswaController::class);
