<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect('/ruangan');
});
Route::get('/welcome', function () {
    return view('/welcome');
});

Route::middleware(['App\Http\Middleware\CekLogin'])->group(function () {
    Route::get('/akun', function () {
        return view('auth.akun');
    })->name('akun');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/tabel/{id}', [RuanganController::class, 'show'])->name('ruangan.show');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/pinjam/form/{id}', [PeminjamanController::class, 'create'])->name('pinjam.create');
    Route::post('/pinjam/simpan', [PeminjamanController::class, 'store'])->name('pinjam.store');
    Route::delete('/pinjam/hapus', [PeminjamanController::class, 'destroy'])->name('pinjam.destroy');
    
    Route::get('/jadwal', [RuanganController::class, 'jadwalSaya'])->name('jadwal.index');
    
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/ruangan/tambah', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('/ruangan/simpan', [RuanganController::class, 'store'])->name('ruangan.store');
});;
