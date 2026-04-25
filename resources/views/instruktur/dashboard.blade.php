@extends('layouts.instruktur.instruktur')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

    {{-- HERO --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg instruktur-hero-card">
                <div class="card-body p-4 p-md-5 position-relative">
                    <span class="instruktur-hero-badge mb-3">
                        Panel Instruktur
                    </span>

                    <h3 class="instruktur-hero-title mb-2">
                        Selamat Datang, {{ auth()->user()->name ?? 'Instruktur' }}
                    </h3>

                    <p class="instruktur-hero-subtitle mb-0">
                        Kelola kursus yang kamu ajar, pantau jadwal mengajar, dan lihat feedback dari siswa.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card instruktur-stat-card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="instruktur-stat-label mb-1">Total Kursus</p>
                            <h3 class="instruktur-stat-number mb-0">{{ $totalKursus ?? 0 }}</h3>
                        </div>

                        <div class="instruktur-stat-icon">
                            <i class="ni ni-books"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card instruktur-stat-card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="instruktur-stat-label mb-1">Total Siswa</p>
                            <h3 class="instruktur-stat-number mb-0">{{ $totalSiswa ?? 0 }}</h3>
                        </div>

                        <div class="instruktur-stat-icon">
                            <i class="ni ni-single-02"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card instruktur-stat-card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="instruktur-stat-label mb-1">Total Ulasan</p>
                            <h3 class="instruktur-stat-number mb-0">{{ $totalUlasan ?? 0 }}</h3>
                        </div>

                        <div class="instruktur-stat-icon">
                            <i class="ni ni-like-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- AKSES CEPAT --}}
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm instruktur-panel-card">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="mb-0">Akses Cepat</h5>
                    <p class="text-muted text-sm mb-0">
                        Menu utama untuk aktivitas instruktur.
                    </p>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('instruktur.kursus.index') }}" class="instruktur-quick-card">
                                <div class="instruktur-quick-icon">
                                    <i class="ni ni-books"></i>
                                </div>
                                <div>
                                    <h6>Kursus Saya</h6>
                                    <p>Lihat kursus yang kamu ajar</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('instruktur.jadwal.index') }}" class="instruktur-quick-card">
                                <div class="instruktur-quick-icon">
                                    <i class="ni ni-calendar-grid-58"></i>
                                </div>
                                <div>
                                    <h6>Jadwal</h6>
                                    <p>Pantau jadwal mengajar</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('instruktur.ulasan.index') }}" class="instruktur-quick-card">
                                <div class="instruktur-quick-icon">
                                    <i class="ni ni-like-2"></i>
                                </div>
                                <div>
                                    <h6>Ulasan</h6>
                                    <p>Lihat feedback siswa</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- INFO --}}
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm instruktur-panel-card">
                <div class="card-body p-4">
                    <div class="instruktur-info-icon mb-3">
                        <i class="ni ni-bulb-61"></i>
                    </div>

                    <h5 class="mb-2">Tips Mengajar</h5>
                    <p class="text-muted text-sm mb-0">
                        Periksa jadwal secara berkala dan gunakan ulasan siswa sebagai bahan evaluasi kualitas pembelajaran.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection