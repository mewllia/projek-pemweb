@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-left">
            <i class="fa-solid fa-building"></i>
            <div class="title">
                Aplikasi Pinjam Kelas <br>
                <span style="font-size: 16px;">Universitas Negeri Malang</span>
        </div>
        </div>
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <div class="content">
        <div class="section-title">
            <h3>Ruang Kelas Tersedia</h3>
            <div>
                <a href="{{ url('/pinjam/tambah') }}" class="nav-link">
                    <div class="nav-item {{ Request::is('pinjam*') ? 'active' : '' }}">
                        <i class="fa-solid fa-plus">Tambah kelas</i>
                    </div>
                </a>
            <button class="filter"><i class="fa-solid fa-filter"></i> Filter</button>
            </div>
        </div>

        <div class="card">
            <div class="card-top">
                <div>
                    <h4>Ruang A20-115</h4>
                    <p>Lantai 1</p>
                </div>
                <span class="badge full">Penuh</span>
            </div>
            <p class="capacity"><i class="fa-solid fa-users"></i> Kapasitas: 40 orang</p>
            <button class="btn disabled">Tidak tersedia</button>
        </div>

        <div class="card">
            <div class="card-top">
                <div>
                    <h4>Ruang A20-203</h4>
                    <p>Lantai 2</p>
                </div>
                <span class="badge available">Tersedia</span>
            </div>
            <p class="capacity"><i class="fa-solid fa-users"></i> Kapasitas: 35 orang</p>
            <a href="{{ url('/pinjam/form') }}" class="btn primary">
                Pinjam Ruangan
            </a>
        </div>
    </div>
@endsection