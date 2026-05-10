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
        $request->validate([
            'ruangan_id' => 'required',
            'hari'       => 'required',
            'jam_mulai'  => 'required|integer|min:1|max:12',
            'durasi'     => 'required|integer|min:1|max:12',
            'peminjam'   => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $mulai = (int) $request->jam_mulai;
        $durasi = (int) $request->durasi;
        
        $jamInput = [];
        for ($i = 0; $i < $durasi; $i++) {
            $jamInput[] = $mulai + $i;
        }

        if (max($jamInput) > 12) {
            return back()->with('error', 'Peminjaman melebihi batas jam 12!');
        }

        $bentrok = Peminjaman::where('ruangan_id', $request->ruangan_id)
        ->where('hari', $request->hari)->whereIn('jam', $jamInput)->exists();
        if ($bentrok) {
            return back()->with('error', 'Salah satu jam sudah terisi!');
        }
        foreach ($jamInput as $j) {
            Peminjaman::create([
                'ruangan_id' => $request->ruangan_id,
                'hari'       => $request->hari,
                'jam'        => $j,
                'peminjam'   => $request->peminjam,
                'keterangan' => $request->keterangan,
            ]);
        }
        return redirect()->route('ruangan.index', ['hari' => $request->hari])->with('success', 'Berhasil meminjam ruangan!');
    }
}
