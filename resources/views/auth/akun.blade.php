@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-left">
            <div class="title">
                Profil Saya
            </div>
        </div>
    </div>
    
    <div class="content" style="display: flex; padding: 20px; margin-top: 5px; margin-bottom: 80px;">
        <div class="card" style=" display: flex; flex-direction: column; gap: 0px; align-items: center; justify-content: center; text-align: center; padding: 25px; border-radius: 20px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: white;">
            <div style="background: #f0f9ff; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0; border: 2px solid #0ea5e9;">
                <i class="fa-solid fa-user-graduate" style="font-size: 40px; color: #0ea5e9;"></i>
            </div>
            <div>
                <span style="font-size: 32px; font-weight: bold; margin: 0; color: #1e293b;">{{ Session::get('nama') }}</span><br>
                <span style="color: #64748b; font-size: 14px; margin-top: 5px;">Universitas Negeri Malang</span>
            </div>
        </div>

        <div class="card" style="padding: 10px 0; border-radius: 20px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: white;">
        
            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-user" style="color: #3b82f6;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px;">Status Pengguna</small>
                    <span style="font-weight: 600; color: #334155; text-transform: uppercase;">{{ Session::get('role') }}</span>
                </div>
                @if(Session::get('role') == 'admin')
                    <span class="badge available" style="font-size: 10px;">PRO</span>
                @else
                    <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                @endif
            </div>

            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #fef2f2; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-id-card" style="color: #ef4444;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px;">NIM (Nomor Induk Mahasiswa)</small>
                    <span style="font-weight: 600; color: #334155;">{{ Session::get('nim') }}</span>
                </div>
            </div>

            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #f0fdf4; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-graduation-cap" style="color: #22c55e;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px;">Prodi/Offering</small>
                    <span style="font-weight: 600; color: #334155;">{{ Session::get('jurusan') ?? 'Jurusan Belum Diatur' }}</span>
                </div>
            </div>

            <a href="#" id="logout-btn" style="display: flex; align-items: center; padding: 15px 20px; text-decoration: none; transition: 0.3s;">
                <div style="width: 40px; height: 40px; background: #fff1f2; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-right-from-bracket" style="color: #e11d48;"></i>
                </div>
                <div style="flex: 1;">
                    <span style="font-weight: 600; color: #e11d48;">Keluar Aplikasi</span>
                </div>
                <i class="fa-solid fa-chevron-right" style="color: #cbd5e1; font-size: 12px;"></i>
            </a>
        </div>
    </div>

    <form id="logout-form" action="{{ url('/logout') }}" method="GET" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin mau keluar?',
                text: "Kamu harus login kembali untuk meminjam kelas.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                borderRadius: '15px'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        });
    </script>
@endsection