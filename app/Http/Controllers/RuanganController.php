<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $hariDipilih = $request->get('hari', 'Senin');
        
        // Kita gunakan eager loading agar performa cepat saat looping di Blade
        $semua_ruangan = Ruangan::with(['peminjamans' => function($q) use ($hariDipilih) {
            $q->where('hari', $hariDipilih);
        }])->get()->map(function($ruangan) use ($hariDipilih) {
            
            // Karena satu baris = satu jam, kita cukup count() saja
            $totalJamTerpakai = $ruangan->peminjamans->count();

            // Ruangan penuh jika sudah ada 12 data jam (asumsi jam 1 sampai 12)
            $ruangan->is_available = $totalJamTerpakai < 12;
            
            return $ruangan;
        });

        return view('home', compact('semua_ruangan', 'hariDipilih'));
    }
    public function create()
    {
        return view('tambah_ruangan');
    }
    public function store(Request $request)
    {
        // Validasi sederhana agar database tidak error
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
}
