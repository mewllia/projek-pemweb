<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return redirect('/login'); });

Route::get('/pinjam', function () { return view('pinjam'); });
Route::get('/jadwal', function () { return view('jadwal'); });
Route::get('/pinjam/form', function () { return view('form_pinjam'); });

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);