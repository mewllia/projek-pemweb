@extends('layouts.app')

@section('content')
    <div class="header">
        <a href="javascript:history.back()" style="color: white;"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="title">Form Peminjaman Ruang</div>
        <div></div> </div>

    <div class="content">
        <div class="card">
            <form action="{{ route('pinjam.store') }}" method="POST">
                @csrf
                <input type="hidden" name="ruangan_id" value="{{ $ruangan->id }}">
                <input type="hidden" name="hari" value="{{ $hariSelected }}">

                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Ruangan</label>
                    <input type="text" value="{{ $ruangan->nama }} ({{ $ruangan->gedung }})" disabled style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; background: #f9f9f9;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Program Studi/Offering</label>
                    <input type="text" name="peminjam" 
                           value="{{ Session::get('jurusan') }}" 
                           disabled
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; background: #f9f9f9;">
                </div>

                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Jam Mulai (Ke-)</label>
                        <input type="number" id="jam_mulai" name="jam_mulai" min="1" max="12" required 
                               placeholder="1" oninput="updatePreview()"
                               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Durasi (Jam)</label>
                        <input type="number" id="durasi" name="durasi" min="1" max="12" required 
                               placeholder="2" oninput="updatePreview()"
                               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
                </div>

                <div id="preview-jam" style="margin-bottom: 15px; font-size: 13px; color: #0ea5e9; font-weight: 600;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Keperluan</label>
                    <textarea name="keterangan" rows="3" placeholder="Matakuliah Pemrograman Web" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;"></textarea>
                </div>

                <button type="submit" onclick="return validateForm()" class="btn primary">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function updatePreview() {
        const mulai = parseInt(document.getElementById('jam_mulai').value);
        const durasi = parseInt(document.getElementById('durasi').value);
        const preview = document.getElementById('preview-jam');

        if (mulai && durasi) {
            // Jika mulai jam 1 durasi 2 jam, berarti pinjam jam 1 & jam 2.
            const selesai = mulai + durasi - 1;
            
            if (selesai > 12) {
                preview.style.color = "#dc2626";
                preview.innerText = "⚠️ Durasi melebihi batas (Maks jam 12)";
            } else {
                preview.style.color = "#0ea5e9";
                preview.innerText = `Pinjam dari jam ke-${mulai} sampai jam ke-${selesai}`;
            }
        } else {
            preview.innerText = "";
        }
    }

    function validateForm() {
        const mulai = parseInt(document.getElementById('jam_mulai').value);
        const durasi = parseInt(document.getElementById('durasi').value);
        
        // Hitung jam selesai secara virtual
        const selesai = mulai + durasi - 1;

        if (mulai < 1 || mulai > 12) {
            alert("Jam mulai harus antara 1-12");
            return false;
        }

        if (durasi < 1) {
            alert("Durasi minimal 1 jam");
            return false;
        }

        if (selesai > 12) {
            alert("Peminjaman melebihi batas operasional (Jam 12). Kurangi durasi atau mulai lebih awal.");
            return false;
        }

        return true;
    }
</script>