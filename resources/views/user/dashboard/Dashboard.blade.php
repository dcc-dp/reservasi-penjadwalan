@extends('layouts.siswa.siswa')

@section('title', 'Dashboard')

@section('content')


<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card dashboard-hero border-0 shadow-lg text-white">
                <div class="card-body p-4 p-md-5 position-relative">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h4 class="dashboard-title">
                                Halo, {{ auth()->user()->name }} 👋
                            </h4>
                            <p class="dashboard-subtitle">
                                Selamat datang kembali di dashboard kursusmu. Kelola reservasi, cek jadwal, dan pantau pembayaran dengan mudah.
                            </p>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <span class="welcome-badge">
                                Siswa Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label">Total Kursus</p>
                        <h2 class="stat-value">{{ $totalReservasi }}</h2>
                    </div>
                    <div class="stat-icon primary">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label">Kursus Aktif</p>
                        <h2 class="stat-value">{{ $aktif }}</h2>
                    </div>
                    <div class="stat-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label">Menunggu Pembayaran</p>
                        <h2 class="stat-value">{{ $menunggu }}</h2>
                    </div>
                    <div class="stat-icon warning">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK ACTION -->
    <div class="row mt-1">
        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.reservasi.create') }}" class="action-card">
                <div class="card-body text-center p-4">
                    <div class="action-icon primary">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h5 class="action-title">Daftar Kursus</h5>
                    <p class="action-text">Mulai kursus baru dan pilih paket belajar yang sesuai.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.jadwal') }}" class="action-card">
                <div class="card-body text-center p-4">
                    <div class="action-icon success">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5 class="action-title">Lihat Jadwal</h5>
                    <p class="action-text">Cek jadwal pertemuan dan aktivitas belajar terdekatmu.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.pembayaran') }}" class="action-card">
                <div class="card-body text-center p-4">
                    <div class="action-icon warning">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h5 class="action-title">Pembayaran</h5>
                    <p class="action-text">Lihat status pembayaran dan pastikan reservasimu aktif.</p>
                </div>
            </a>
        </div>
    </div>

    <!-- AKTIVITAS -->
    <div class="card section-card mt-2">
        <div class="card-body p-4">
            <h5 class="section-title">Aktivitas Terakhir</h5>

            <div class="activity-empty">
                <div class="activity-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h6 class="fw-bold mb-2">Belum ada aktivitas terbaru</h6>
                <p class="text-muted mb-0">
                    Aktivitas reservasi, pembayaran, dan jadwal terbaru akan muncul di sini.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection