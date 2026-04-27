@extends('layouts.app')

@section('content')
    <div class="header">
        <a href="javascript:history.back()" style="color: white;"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="title">Form Peminjaman Ruang</div>
        <div></div> </div>

    <div class="content">
        <div class="card">
            <form action="#">
                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Ruangan</label>
                    <input type="text" value="A20-115" disabled style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; background: #f9f9f9;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Nama Peminjam/Organisasi</label>
                    <input type="text" placeholder="Masukkan nama" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                </div>

                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Jam Mulai</label>
                        <input type="time" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
                    <div style="flex: 1;">
                        <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Jam Selesai</label>
                        <input type="time" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-size: 12px; color: #666; margin-bottom: 5px;">Keperluan</label>
                    <textarea rows="3" placeholder="Contoh: Rapat Koordinasi LIDM" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box;"></textarea>
                </div>

                <button type="button" class="btn primary">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
@endsection