<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PegawaiController::class, 'index']);
Route::get('/absen', [AbsensiController::class, 'index']);
Route::post('/absen/masuk', [AbsensiController::class, 'absenMasuk']);
Route::post('/absen/pulang', [AbsensiController::class, 'absenPulang']);
Route::post('/pegawai', [PegawaiController::class, 'store']);
