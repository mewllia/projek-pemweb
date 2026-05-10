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
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Prodi/Organisasi</label>
                    <input type="text" name="peminjam" placeholder="TI-C" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                </div>

                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Jam Mulai (1-12)</label>
                        <input type="number" id="jam_mulai" name="jam_mulai" min="1" max="12" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Jam Selesai (1-12)</label>
                        <input type="number" id="jam_selesai" name="jam_selesai" min="1" max="12" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
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
    function validateForm() {
        const mulai = parseInt(document.getElementById('jam_mulai').value);
        const selesai = parseInt(document.getElementById('jam_selesai').value);
    
        if (selesai <= mulai) {
            alert("Jam selesai harus lebih besar dari jam mulai.");
            return false;
        }
    
        if (mulai < 1 || selesai > 12) {
            alert("Input tidak valid! Gunakan jam antara 1 sampai 12.");
            return false;
        }
        return true;
    }
</script>