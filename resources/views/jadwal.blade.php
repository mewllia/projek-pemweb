@extends('layouts.app')

@section('content')

<div class="header">
    <div class="header-left">
        <div class="title">Jadwal Peminjaman</div>
    </div>
    <span style="font-weight: bold;">Prodi/Offering: {{ $prodiUser }}</span>
</div>

<div class="jadwal-container">
    @forelse($jadwalGrouped as $hari => $perRuangan)
        <div class="hari-row">
            <div class="hari-sidebar">
                <div class="line-blue"></div>
                <div class="hari-text">
                    <h3>{{ strtoupper($hari) }}</h3>
                </div>
            </div>

            <div class="card-grid">
                @foreach($perRuangan as $perKegiatan)
                    @foreach($perKegiatan as $item)
                        <div class="card-item">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                                    <div style="background: #f0f9ff; color: #0369a1; padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; text-transform: uppercase;">
                                        Jam Ke {{ $item['jam_mulai'] }} - {{ $item['jam_selesai'] }}
                                    </div>
                                    <span style="font-size: 12px; color: #94a3b8; font-weight: 500;">
                                        <i class="fa-regular fa-clock"></i> {{ $item['total_jam'] }} Jam
                                    </span>
                                </div>
                                <h4 style="margin: 0 0 5px 0; color: #1e293b; font-size: 18px; line-height: 1.4; font-weight: 700;">
                                    {{ $item['kegiatan'] }}
                                </h4>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                                <div style="display: flex; align-items: center; gap: 15px; border-top: 1px solid #f8fafc;">
                                    <div style="display: flex; align-items: center; gap: 6px; color: #64748b; font-size: 13px;">
                                        <i class="fa-solid fa-door-open" style="color: #0ea5e9;"></i>
                                        <span style="font-weight: 600;">{{ $item['nama_ruangan'] }}</span>
                                    </div>

                                    <div style="display: flex; align-items: center; gap: 6px; color: #64748b; font-size: 13px;">
                                        <i class="fa-solid fa-location-dot" style="color: #0ea5e9;"></i>
                                        <span>Gedung {{ $item['gedung'] }}</span>
                                    </div>
                                </div>
                                
                                <form action="{{ route('pinjam.destroy') }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan peminjaman ini?')" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="ruangan_id" value="{{ $item['ruangan_id'] }}">
                                    <input type="hidden" name="hari" value="{{ $item['hari'] }}">
                                    <input type="hidden" name="keterangan" value="{{ $item['kegiatan'] }}">
                                    
                                    <button type="submit" class="btn-delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                
                <div class="spacer"></div>
                <div class="spacer"></div>
            </div>
        </div>
    @empty
        <div style="width: 100%; text-align: center; padding: 50px 20px;">
            <i class="fa-solid fa-calendar-xmark" style="font-size: 50px; color: #cbd5e1; margin-bottom: 15px;"></i>
            <p style="color: #94a3b8;">Kamu belum memiliki jadwal peminjaman.</p>
            <a href="{{ route('ruangan.index') }}" style="color: #0ea5e9; text-decoration: none; font-weight: 600;">Cari Ruangan Sekarang</a>
        </div>
    @endforelse
</div>
@endsection