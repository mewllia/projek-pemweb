@extends('layouts.app')

@section('content')
<div class="content" style="flex-direction: column;"">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('ruangan.index', ['hari' => $hariDipilih]) }}" style="text-decoration: none; color: #0ea5e9;">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </a>
        <h2 style="margin-top: 10px;">Jadwal {{ $ruangan->nama }}</h2>
        <span style="color: #64748b;">Gedung {{ $ruangan->gedung }} | Hari {{ $hariDipilih }}</span>
    </div>
    <div>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
            <thead>
                <tr style="background: #0ea5e9; color: white; text-align: left;">
                    <th style="padding: 15px;">Jam</th>
                    <th style="padding: 15px;">Status</th>
                    <th style="padding: 15px;">Peminjam</th>
                    <th style="padding: 15px;">Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1, 12) as $jam)
                    @php
                    $data = $jadwalTerisi->get($jam);
                    @endphp
                <tr style="border-bottom: 1px solid #f1f5f9; background: {{ $loop->even ? '#f8fafc' : '#fff' }};">
                    <td style="padding: 15px; font-weight: bold; color: #1e293b;">
                        Jam {{ $jam }}
                    </td>
                    <td style="padding: 15px;">
                        @if($data)
                            <span style="color: #dc2626; background: #fee2e2; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                TERISI
                            </span>
                        @else
                            <span style="color: #16a34a; background: #dcfce7; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                                KOSONG
                            </span>
                        @endif
                    </td>
                    <td style="padding: 15px; color: #475569; font-weight: 500;">
                        @if($data)
                            <i class="fa-solid fa-user" style="font-size: 12px; color: #94a3b8; margin-right: 5px;"></i>
                            {{ $data->peminjam }}
                        @else
                            <span style="color: #cbd5e1;">Belum ada peminjam</span>
                        @endif
                    </td>
                    <td style="padding: 15px; color: #475569;">
                        @if($data)
                            {{ $data->keterangan }}
                        @else
                            <span style="color: #cbd5e1;">Belum ada kegiatan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-bottom: 60px;">
        @if($ruangan->is_available)
            <a href="{{ route('pinjam.create', ['id' => $ruangan->id, 'hari' => $hariDipilih]) }}" 
               class="btn primary" 
               style="display: inline-block; padding: 15px 40px; border-radius: 12px; text-decoration: none; font-weight: bold; font-size: 16px; box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.3);">
                <i class="fa-solid fa- calendar-plus"></i> Pinjam Ruangan Ini
            </a>
        @else
            <button class="btn disabled" 
                    style="padding: 15px 40px; border-radius: 12px; font-weight: bold; font-size: 16px; cursor: not-allowed;" 
                    disabled>
                <i class="fa-solid fa-ban"></i> Ruangan Sudah Penuh
            </button>
        @endif
    </div>
</div>
@endsection
