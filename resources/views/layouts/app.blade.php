<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pinjam Kelas</title>
    <link rel="stylesheet" href="{{ asset('css/ruangan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="app">
        @yield('content')

        <div class="bottom-nav">
            <a href="{{ url('/ruangan') }}" class="nav-link">
                <div class="nav-item {{ Request::is('ruangan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-building"></i><br>Ruangan
                </div>
            </a>
            <a href="{{ url('/jadwal') }}" class="nav-link">
                <div class="nav-item {{ Request::is('jadwal*') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar"></i><br>Jadwal Saya
                </div>
            </a>
            <a href="{{ url('/akun') }}" class="nav-link">
                <div class="nav-item {{ Request::is('akun*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i><br>Akun
                </div>
            </a>
        </div>
    </div>
</body>
</html>