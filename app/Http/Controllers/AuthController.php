<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak terdaftar');
        }

        if (Hash::check($request->password, $user->password)) {
            Session::put('nama', $user->nama);
            Session::put('nim', $user->nim);
            Session::put('role', $user->role);
            Session::put('jurusan', $user->jurusan);
            Session::put('login', true);
            return redirect('/ruangan')->with('success', 'Selamat datang, ' . $user->nama);
        }
        else {
            return back()->with('error', 'Password yang Anda masukkan salah!');
        }
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'nim'      => 'required|numeric|digits:12|unique:users,nim', 
            'jurusan'  => 'required',
            'email'    => 'required|email|unique:users,email', 
            'password' => 'required|min:6|confirmed',
        ], [
            'nama.required'      => 'Nama lengkap wajib diisi.',
            'nim.required'       => 'NIM wajib diisi.',
            'nim.digits'         => 'NIM harus berisi 12 digit angka sesuai standar UM.',
            'nim.numeric'        => 'NIM harus berupa angka.',
            'nim.unique'         => 'NIM ini sudah terdaftar di sistem.',
            'jurusan.required'   => 'Jurusan wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email ini sudah digunakan.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        DB::table('users')->insert([
            'nama'  => $request->nama,
            'nim'        => $request->nim,
            'jurusan'    => $request->jurusan,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
    
    public function logout() {
        Session::flush();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}