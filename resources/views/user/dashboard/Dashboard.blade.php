@extends('layouts.siswa.siswa')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg,#1F6F6D,#2c8f8b);">
                <div class="card-body text-white">
                    <h4 class="mb-1 fw-bold">
                        Halo, {{ auth()->user()->name }} 👋
                    </h4>
                    <p class="opacity-8 mb-0">
                        Selamat datang di dashboard kursusmu
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Total Kursus</p>
                        <h3 class="fw-bold mb-0">{{ $totalReservasi }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Kursus Aktif</p>
                        <h3 class="fw-bold mb-0">{{ $aktif }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Menunggu Pembayaran</p>
                        <h3 class="fw-bold mb-0">{{ $menunggu }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-book me-2"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- TOMBOL RESERVASI --}}
    @if($totalReservasi == 0)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Mulai Kursus Kamu 🚀</h5>
                        <p class="text-muted mb-0">
                            Kamu belum memiliki kursus aktif. Silakan lakukan reservasi untuk memulai belajar.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('siswa.reservasi.index') }}" class="btn btn-primary btn-lg shadow-sm" style="background: linear-gradient(135deg,#1F6F6D,#2c8f8b);">
                          <i class="fas fa-plus me-2"></i> Reservasi Kursus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- JADWAL TERDEKAT --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0">📅 Jadwal Terdekat</h6>
                </div>
                <div class="card-body">

                    @if($jadwalTerdekat)

                        <h5>{{ $jadwalTerdekat->kursus->name ?? '-' }}</h5>

                        <p class="mb-1">
                            Hari : {{ $jadwalTerdekat->hari }}
                        </p>

                        <p class="mb-1">
                            Jam : {{ $jadwalTerdekat->jam }}
                        </p>

                    @else

                        <p class="text-muted">
                            Belum ada jadwal terdaftar.
                        </p>

                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- QUICK ACTION --}}
    <div class="row mt-4">

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.reservasi.index') }}" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">➕ Daftar Kursus</h5>
                    <p class="text-sm text-muted mb-0">
                        Pilih kursus baru dan mulai belajar.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.jadwal') }}" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">📅 Lihat Jadwal</h5>
                    <p class="text-sm text-muted mb-0">
                        Cek jadwal belajar kamu.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="#" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">💳 Pembayaran</h5>
                    <p class="text-sm text-muted mb-0">
                        Lihat status pembayaran.
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection