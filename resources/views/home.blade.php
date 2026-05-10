@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-left">
            <i class="fa-solid fa-graduation-cap" style="font-size: 30px;"></i>
            <div class="title">
                APLIKASI PINJAM KELAS<br>
                <span style="font-size: 16px;">UNIVERSITAS NEGERI MALANG</span>
        </div>
        </div>
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    
    <div class="content">
        <div class="section-title">
            <div class="day-selector">
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                    <a href="{{ route('ruangan.index', ['hari' => $hari]) }}" 
                       class="btn-day {{ $hariDipilih == $hari ? 'active' : '' }}"
                       style="padding: 10px 20px; border-radius: 20px; text-decoration: none; 
                              background: {{ $hariDipilih == $hari ? '#6c8dc7' : '#fff' }}; 
                              color: {{ $hariDipilih == $hari ? '#fff' : '#64748b' }};
                              border: 1px solid #e2e8f0; white-space: nowrap;">
                        {{ $hari }}
                    </a>
                @endforeach
            </div>
            <div class="section-right">
                <a href="{{ route('ruangan.create') }}" class="nav-link">
                    <div class="filter nav-item {{ Request::is('pinjam*') ? 'active' : '' }}">
                        <i class="fa-solid fa-plus"></i>
                        <label>Tambah Kelas</label>
                    </div>
                </a>
            {{-- <button class="filter"><i class="fa-solid fa-filter"></i>Filter</button> --}}
            </div>
        </div>
        
        @forelse($semua_ruangan as $ruangan)
            <div class="card">
                <div class="card-top">
                    <div>
                        <span style="font-size: 20px; font-weight: bold;">{{ $ruangan->nama }}</span><br>
                        <span style="font-weight: bold;">{{ $ruangan->gedung }}</span>
                    </div>
            
                    {{-- Status sekarang selalu tersedia selama total jam belum penuh 12 jam --}}
                    @if($ruangan->is_available)
                        <span class="badge available">Tersedia</span>
                    @else
                        <span class="badge full">Penuh</span>
                    @endif
                </div>
            
                <p class="capacity">
                    <i class="fa-solid fa-tv"></i> Fasilitas: {{ $ruangan->fasilitas }}
                </p>
                <p class="capacity">
                    <i class="fa-solid fa-users"></i> Kapasitas: {{ $ruangan->kapasitas }} orang
                </p>

                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <a href="{{ route('ruangan.show', ['id' => $ruangan->id, 'hari' => $hariDipilih]) }}" 
                    class="btn" style="flex: 1; background: #f1f5f9; color: #475569; text-decoration: none; 
                                        text-align: center; padding: 10px; border-radius: 8px; font-weight: 600;
                                        border: 1px solid #e2e8f0;">Lihat Jadwal</a>

                    @if($ruangan->is_available)
                        <a href="{{ route('pinjam.create', ['id' => $ruangan->id, 'hari' => $hariDipilih]) }}" 
                        class="btn primary" style="flex: 1; text-align: center;">
                            Pinjam
                        </a>
                    @else
                        <button class="btn disabled" style="flex: 1;" disabled>Penuh</button>
                    @endif
                </div>
            </div>

            @empty
            <div class="empty-state" style="width: 100%; text-align: center; padding: 50px 20px;">
                <i class="fa-solid fa-box-open" style="font-size: 50px; color: #cbd5e1; margin-bottom: 15px;"></i>
                <h3 style="color: #64748b;">Tidak ada kelas</h3>
                <p style="color: #94a3b8;">Belum ada ruangan yang ditambahkan ke database.</p>
                <a href="{{ route('ruangan.create') }}" style="color: #0ea5e9; text-decoration: none; font-weight: 600;">
                    + Tambah Ruangan Sekarang
                </a>
            </div>
        @endforelse
    </div>
@endsection