<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request) {
        $user = DB::table('user')
                ->where('email', $request->email)
                ->where('password', $request->password)
                ->first();

        if ($user) {
            Session::put('nama', $user->nama_user);
            Session::put('login', true);
            return redirect('/pinjam')->with('success', 'Berhasil Login!');
        } else {
            return back()->with('error', 'Email atau Password salah!');
        }
    }

    public function showRegister() {
        return view('register');
    }

    public function register(Request $request) {

        $request->validate([
            'nama'     => 'required|string|max:255',
            'nim'      => 'required|numeric|digits:12', 
            'jurusan'  => 'required',
            'email'    => 'required|email|unique:user,email', 
            'password' => 'required|min:6', 
        ], [

            'nim.digits'   => 'NIM harus berisi 12 digit angka.',
            'nim.numeric'  => 'NIM harus berupa angka.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'email.unique' => 'Email ini sudah terdaftar.',
        ]);

        DB::table('user')->insert([
            'nama_user' => $request->nama,
            'nim'       => $request->nim,
            'jurusan'   => $request->jurusan,
            'email'     => $request->email,
            'password'  => $request->password, 
        ]);
    return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
}
    
    public function logout() {
        Session::flush();
        return redirect('/login');
    }
}