@extends('layouts.app')

@section('content')
    <div class="header" style="background: #0ea5e9; padding: 40px 25px; border-radius: 0 0 30px 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <div style="display: flex; align-items: center; gap: 15px;">
        
        <div style="background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <i class="fa-solid fa-circle-user" style="font-size: 28px; color: white;"></i>
        </div>

        <div>
            <h1 style="margin: 0; color: white; font-size: 18px; font-weight: 700; letter-spacing: 0.5px; line-height: 1.2;">
                PROFIL SAYA
            </h1>
            <p style="margin: 0; color: rgba(255,255,255,0.8); font-size: 12px; font-weight: 400;">
                Informasi Akun Terdaftar
            </p>
        </div>

    </div>
</div>
    
    <div class="content" style="padding: 20px; margin-top: -20px; margin-bottom: 80px;">
        <div class="card" style="text-align: center; padding: 25px; border-radius: 20px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: white;">
            <div style="background: #f0f9ff; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; border: 2px solid #0ea5e9;">
                <i class="fa-solid fa-user-graduate" style="font-size: 40px; color: #0ea5e9;"></i>
            </div>
            <h2 style="margin: 0; color: #1e293b; font-size: 20px;">{{ Session::get('nama') }}</h2>
            <p style="color: #64748b; font-size: 14px; margin-top: 5px;">Aplikasi Pinjam Kelas UM</p>
        </div>

        <div class="card" style="padding: 10px 0; border-radius: 20px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: white; margin-top: 20px;">
            
            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-shield-halved" style="color: #3b82f6;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px;">STATUS PENGGUNA</small>
                    <span style="font-weight: 600; color: #334155; text-transform: uppercase;">{{ Session::get('role') }}</span>
                </div>
                @if(Session::get('role') == 'admin')
                    <span class="badge full" style="font-size: 10px;">PRO</span>
                @else
                    <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                @endif
            </div>

            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #fef2f2; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-id-card" style="color: #ef4444;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px;">NOMOR INDUK MAHASISWA</small>
                    <span style="font-weight: 600; color: #334155;">{{ Session::get('nim') }}</span>
                </div>
            </div>

            <div style="display: flex; align-items: center; padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 40px; height: 40px; background: #f0fdf4; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="fa-solid fa-graduation-cap" style="color: #22c55e;"></i>
                </div>
                <div style="flex: 1;">
                    <small style="color: #94a3b8; display: block; font-size: 11px; text-transform: uppercase;">Jurusan / Kelas</small>
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