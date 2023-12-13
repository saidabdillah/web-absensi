<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MasukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin
Route::middleware('admin')->group(function () {
  Route::get('/', [DashboardController::class, 'index']);
  Route::get('/mahasiswa', [DashboardController::class, 'show']);
  Route::get('/mahasiswa/lihat/{mahasiswa:nim}', [DashboardController::class, 'lihat']);
  Route::get('/mahasiswa/{mahasiswa:nim}/edit', [MahasiswaController::class, 'edit']);
  Route::put('/mahasiswa/{mahasiswa:nim}/update', [MahasiswaController::class, 'update']);
  Route::delete('/mahasiswa/{mahasiswa:nim}/delete', [DashboardController::class, 'destroy']);
  Route::get('/mahasiswa/tambah-mahasiswa', [MahasiswaController::class, 'create']);
  Route::post('/mahasiswa/tambah-mahasiswa', [MahasiswaController::class, 'store']);
  Route::get('/absen', [AbsenController::class, 'index']);
  Route::get('/absen/mahasiswa/{absen:nim}', [AbsenController::class, 'lihat']);
  Route::delete('/absen/{absen:id}/delete', [AbsenController::class, 'delete']);
  Route::post('/tambah-user', [DashboardController::class, 'store']);
});


// Mahasiswa
Route::middleware('mahasiswa')->group(function () {
  Route::get('/dashboard', [MahasiswaController::class, 'index']);
  Route::get('/dashboard/profile', [MahasiswaController::class, 'show']);
  Route::get('/dashboard/absen', [AbsenController::class, 'create']);
  Route::post('/dashboard/absen', [AbsenController::class, 'store']);
});


Route::get('/masuk', [MasukController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [MasukController::class, 'store'])->middleware('guest');
Route::post('/keluar', [MasukController::class, 'logout'])->middleware('auth');
