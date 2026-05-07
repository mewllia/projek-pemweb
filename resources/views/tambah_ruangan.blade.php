<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan - PinjamKelas</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            color: #334155;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #7dd3fc;
            box-shadow: 0 0 0 4px rgba(125, 211, 252, 0.2);
        }
        .row {
            display: flex;
            gap: 15px;
        }
        .row .form-group {
            flex: 1;
        }
        .btn-save {
            width: 100%;
            padding: 12px;
            background-color: #0ea5e9;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn-save:hover {
            background-color: #0284c7;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #94a3b8;
            font-size: 13px;
        }
    </style>
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
        <a href="/home" class="btn-back">← Kembali ke Daftar Ruangan</a>
    </form>
</div>

</body>
</html>