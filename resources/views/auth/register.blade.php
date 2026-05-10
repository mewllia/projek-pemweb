<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Pinjam Kelas UM</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="auth-container" style="max-width: 450px;">
    <h2>Daftar Akun Baru</h2>
    <p class="subtitle">Lengkapi data diri untuk mulai meminjam kelas</p>

    @if ($errors->any())
        <div class="error-msg">
            <ul style="margin: 0; padding-left: 15px; text-align: left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap anda" required autofocus>
        </div>

        <div style="display: flex; gap: 10px;">
            <div class="form-group" style="flex: 1;">
                <label>NIM</label>
                <input type="number" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM" required>
            </div>
            <div class="form-group" style="flex: 1;">
                <label>Jurusan dan Offering</label>
                <input type="text" name="jurusan" value="{{ old('jurusan') }}" placeholder="Teknik Informatika C" required>
            </div>
        </div>

        <div class="form-group">
            <label>Email Student</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@students.um.ac.id" required>
        </div>

        <div class="form-group">
            <label>Password (Min. 6 Karakter)</label>
            <input type="password" name="password" placeholder="Buat password aman" required>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
        </div>

        <button type="submit" class="btn-login">Daftar Sekarang</button>
    </form>

    <p class="footer-text">
        Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a>
    </p>

    <div class="back-to-home">
        <a href="{{ route('ruangan.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</div>

</body>
</html>