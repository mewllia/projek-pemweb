<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Ruangan;

class PeminjamanController extends Controller
{
    public function create(Request $request, $id){
        $ruangan = Ruangan::findOrFail($id);
        $hariSelected = $request->query('hari'); 

        return view('form_pinjam', compact('ruangan', 'hariSelected'));
    }
    public function store(Request $request) {
        Peminjaman::create([
            'ruangan_id'  => $request->ruangan_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kegiatan'    => $request->kegiatan,
        ]);
        $ruangan = Ruangan::findOrFail($request->ruangan_id);
        $ruangan->update(['status' => 'tidak_tersedia']);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dipinjam!');
    }
}
