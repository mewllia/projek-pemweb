<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return redirect('/login'); });

Route::get('/pinjam', function () { return view('pinjam'); });
Route::get('/jadwal', function () { return view('jadwal'); });
Route::get('/pinjam/form', function () { return view('form_pinjam'); });
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/home', [RuanganController::class, 'index'])->name('ruangan.index');

Route::get('/ruangan/tambah', [RuanganController::class, 'create'])->name('ruangan.create');
Route::post('/ruangan/simpan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/ruangan/pinjam/{id}', [RuanganController::class, 'pinjamForm'])->name('pinjam.form');

Route::get('/pinjam/form/{id}', [PeminjamanController::class, 'create'])->name('pinjam.create');
Route::post('/pinjam/simpan', [PeminjamanController::class, 'store'])->name('pinjam.store');
