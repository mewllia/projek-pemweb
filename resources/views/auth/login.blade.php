<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pinjam Kelas UM</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="auth-container">
    <h2>Selamat Datang</h2>
    <p class="subtitle">Silakan login ke sistem peminjaman kelas</p>
    
    @if(session('error'))
        <div class="error-msg">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Email Mahasiswa/Admin</label>
            <input type="email" name="email" placeholder="mahasiswa@students.um.ac.id" required autofocus>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
    </form>

    <p class="footer-text">
        Belum punya akun? <a href="{{ url('/register') }}">Daftar Sekarang</a>
    </p>

    <div class="back-to-home">
        <a href="{{ route('ruangan.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</div>

</body>
</html>