<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
    <link rel="stylesheet" href="{{ asset('css/tambah_ruangan.css') }}">
</head>
<body>

<div class="container">
    <h2>Tambah Ruangan Baru</h2>
    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Ruangan</label>
            <input type="text" id="nama" name="nama" placeholder="Lab Komputer 1" required>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="gedung">Gedung</label>
                <select id="gedung" name="gedung" required>
                    <option value="" disabled selected>Pilih Gedung</option>
                    <option value="B11">B11</option>
                    <option value="B12">B12</option>
                    <option value="A19">A19</option>
                    <option value="A20">A20</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas (Orang)</label>
                <input type="number" id="kapasitas" name="kapasitas" placeholder="0" required>
            </div>
        </div>

        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <textarea id="fasilitas" name="fasilitas" placeholder="AC, Proyektor, Papan Tulis, etc."></textarea>
        </div>

        <button type="submit" class="btn-save">Simpan Ruangan</button>
        <a href="/ruangan" class="btn-back">← Kembali ke Daftar Ruangan</a>
    </form>
</div>

</body>
</html>