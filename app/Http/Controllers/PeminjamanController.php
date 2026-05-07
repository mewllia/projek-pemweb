<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Ruangan;

class PeminjamanController extends Controller
{
    public function create(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $hariSelected = $request->query('hari'); 

        return view('form_pinjam', compact('ruangan', 'hariSelected'));
    }
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'jam_mulai'   => 'required|integer|min:1|max:12',
            'jam_selesai' => 'required|integer|min:1|max:12|gt:jam_mulai',
            'kegiatan'    => 'required|string|max:255',
        ], [
            // Pesan kustom dalam bahasa Indonesia
            'jam_mulai.max'   => 'Jam mulai maksimal jam 12.',
            'jam_selesai.gt'  => 'Jam selesai harus lebih besar dari jam mulai.',
            'jam_selesai.max' => 'Jam selesai maksimal jam 12.',
        ]);

        $mulai = $request->jam_mulai;
        $selesai = $request->jam_selesai;
        $ruangan_id = $request->ruangan_id;
        $hari = $request->hari;

        $jamInput = range($mulai, $selesai); 
        
        // 2. Cek Bentrok
        $bentrok = Peminjaman::where('ruangan_id', $ruangan_id)
            ->where('hari', $hari)
            ->whereIn('jam', $jamInput)
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Maaf, salah satu jam di rentang tersebut sudah terisi!');
        }

        // 3. Simpan Data
        foreach ($jamInput as $j) {
            Peminjaman::create([
                'ruangan_id' => $ruangan_id,
                'hari'       => $hari,
                'jam'        => $j,
                'kegiatan'   => $request->kegiatan,
            ]);
        }

        return redirect()->route('ruangan.index')->with('success', 'Berhasil meminjam ruangan!');
    }
}
