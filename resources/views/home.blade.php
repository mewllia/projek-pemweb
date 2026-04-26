<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pinjam Kelas</title>

    <!-- WAJIB -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            // hapus active semua
            navItems.forEach(i => i.classList.remove('active'));

            // kasih active ke yang diklik
            item.classList.add('active');
        });
    });
    </script>
</head>
<body>

<div class="app">

    <!-- HEADER -->
    <div class="header">
        <i class="fa-solid fa-building"></i>
        <div class="title">
            Aplikasi Pinjam Kelas <br>
            <span>Universitas Negeri Malang</span>
        </div>
            <i class="fa-solid fa-circle-info"></i>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="section-title">
            <h3>Ruang Kelas Tersedia</h3>
            <button class="filter">
                <i class="fa-solid fa-filter"></i> Filter</button>
        </div>

        <!-- CARD 1 -->
        <div class="card">
            <div class="card-top">
                <div>
                    <h4>Ruang A20-115</h4>
                    <p>Lantai 1</p>
                </div>
                <span class="badge full">Penuh</span>
            </div>

            <p class="capacity">
                <i class="fa-solid fa-users"></i> Kapasitas: 40 orang</p>

            <button class="btn disabled">Tidak tersedia</button>
        </div>

        <!-- CARD 2 -->
        <div class="card">
            <div class="card-top">
                <div>
                    <h4>Ruang A20-203</h4>
                    <p>Lantai 2</p>
                </div>
                <span class="badge available">Tersedia</span>
            </div>

            <p class="capacity">
                <i class="fa-solid fa-users"></i> Kapasitas: 35 orang</p>

            <button class="btn primary">Pinjam Ruangan</button>
        </div>

    </div>

    <!-- BOTTOM NAV -->
    <div class="bottom-nav">
        <div class="nav-item active">
            <i class="fa-solid fa-building"></i><br>Pinjam</div>
        <div class="nav-item">
            <i class="fa-solid fa-calendar"></i><br>Jadwal</div>
        <div class="nav-item">
            <i class="fa-solid fa-user"></i><br>Akun</div>
    </div>

</div>

</body>
</html>