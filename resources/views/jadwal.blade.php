@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="header-left">
            <i class="fa-solid fa-calendar-check"></i>
            <div class="title">Jadwal Penggunaan Ruang A20</div>
        </div>
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <div class="date-selector">
        <div class="date-item active"><span>Sen</span><strong>27</strong></div>
        <div class="date-item"><span>Sel</span><strong>28</strong></div>
        <div class="date-item"><span>Rab</span><strong>29</strong></div>
        <div class="date-item"><span>Kam</span><strong>30</strong></div>
        <div class="date-item"><span>Jum</span><strong>01</strong></div>
    </div>

    <div class="content">
    <div class="floor-filter">
        <button class="btn-floor active">1</button>
        <button class="btn-floor">2</button>
    </div>

    <div class="card card-ruang">
        <div class="ruang-header">
            <h3>A20-115</h3>
            <span class="badge available">Lantai 1</span>
        </div>
        <div class="ruang-body">
            <div class="slot-item">
                <span class="slot-time">07:00 - 10:00</span>
                <span class="slot-desc"><span class="status-dot dot-active"></span> Pemrog. Web</span>
            </div>
            
            <div class="slot-item">
                <span class="slot-time">10:00 - 12:00</span>
                <div class="slot-desc">
                    <a href="{{ url('/pinjam/form') }}" class="btn-booking">
                        KOSONG - Pinjam Ruangan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection