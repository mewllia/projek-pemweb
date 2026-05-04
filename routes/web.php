<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;

Route::get('/', function () { return redirect('/pinjam'); });

Route::get('/pinjam', function () {
    return view('pinjam');
});

Route::get('/pinjam', [RuanganController::class, 'index'])->name('pinjam.index');
Route::get('/pinjam/tambah', [RuanganController::class, 'create'])->name('ruangan.create');;
Route::post('/pinjam/simpan', [RuanganController::class, 'store'])->name('ruangan.store');
// Jika kamu mengarahkannya ke halaman daftar ruangan/pinjaman

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/pinjam/form', function () {
    return view('form_pinjam');
});
