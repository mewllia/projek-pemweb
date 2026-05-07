<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use Carbon\Carbon;

class RuanganController extends Controller
{
    public function index(Request $request) {
        $hariDipilih = $request->get('hari', 'Senin');
        $semua_ruangan = Ruangan::all()->map(function($ruangan) use ($hariDipilih) {
            $isBooked = \App\Models\Peminjaman::where('ruangan_id', $ruangan->id)->where('hari', $hariDipilih)->exists();
            $ruangan->is_available = !$isBooked; 
            return $ruangan;
        });
        return view('home', compact('semua_ruangan', 'hariDipilih'));
    }
    public function create() {
        return view('tambah_ruangan');
    }
    public function store(Request $request) {
        Ruangan::create([
            'nama'           => $request->nama,
            'gedung'         => $request->gedung,
            'kapasitas'      => $request->kapasitas,
            'fasilitas'      => $request->fasilitas
        ]);
        return redirect()->route('ruangan.index');
    }
    public function pinjamForm($id) {
        $ruangan = Ruangan::findOrFail($id);
        return view('form_pinjam', compact('ruangan'));
    }
}
