<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        $semua_ruangan = Ruangan::all();
        return view('pinjam', compact('semua_ruangan'));
    }

    public function create() {
        return view('tambah_kelas');
    }

    public function store(Request $request) {
        Ruangan::create([
            'nama'           => $request->nama,
            'gedung'         => $request->gedung,
            'kapasitas'      => $request->kapasitas,
            'fasilitas'      => $request->fasilitas,
            'status'         => 'tersedia',
        ]);
        
        return redirect()->route('pinjam.index');
    }
}
