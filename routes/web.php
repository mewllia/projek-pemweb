<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect('/ruangan');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');

Route::get('/ruangan/tambah', [RuanganController::class, 'create'])->name('ruangan.create');
Route::post('/ruangan/simpan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/ruangan/pinjam/{id}', [RuanganController::class, 'pinjamForm'])->name('pinjam.form');
Route::get('/ruangan/tabel/{id}', [RuanganController::class, 'show'])->name('ruangan.show');

Route::get('/pinjam/form/{id}', [PeminjamanController::class, 'create'])->name('pinjam.create');
Route::post('/pinjam/simpan', [PeminjamanController::class, 'store'])->name('pinjam.store');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
