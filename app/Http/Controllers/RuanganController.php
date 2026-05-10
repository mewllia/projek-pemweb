<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $hariDipilih = $request->get('hari', 'Senin');
        $search = $request->get('search');

        $query = Ruangan::with(['peminjamans' => function($q) use ($hariDipilih) {
            $q->where('hari', $hariDipilih);
        }]);
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")->orWhere('gedung', 'like', "%{$search}%");
            });
        }
        $semua_ruangan = $query->get()->map(function($ruangan) use ($hariDipilih) {
            $totalJamTerpakai = $ruangan->peminjamans->count();
            $ruangan->is_available = $totalJamTerpakai < 12;
            return $ruangan;
        });
        return view('ruangan', compact('semua_ruangan', 'hariDipilih'));
    }
    public function create()
    {
        if (Session::get('role') !== 'admin') {
            return redirect('/ruangan')->with('error', 'Hanya Admin yang boleh menambah ruangan!');
        }

        return view('tambah_ruangan');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gedung' => 'required',
            'kapasitas' => 'required|integer',
        ]);

        Ruangan::create([
            'nama'      => $request->nama,
            'gedung'    => $request->gedung,
            'kapasitas' => $request->kapasitas,
            'fasilitas' => $request->fasilitas
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }
    public function pinjamForm($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('form_pinjam', compact('ruangan'));
    }
    public function show($id, Request $request)
    {
        $ruangan = Ruangan::findOrFail($id);
        $hariDipilih = $request->get('hari', 'Senin');
        $peminjamans = \App\Models\Peminjaman::where('ruangan_id', $id)
        ->where('hari', $hariDipilih)->get();
        $jadwalTerisi = $peminjamans->keyBy('jam');
        
        $totalJamTerpakai = $peminjamans->count();
        $ruangan->is_available = $totalJamTerpakai < 12;

        return view('ruangan_tabel', compact('ruangan', 'hariDipilih', 'jadwalTerisi'));
    }
}
