<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect('/pinjam'); });

Route::get('/pinjam', function () {
    return view('pinjam');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/pinjam/form', function () {
    return view('form_pinjam');
});