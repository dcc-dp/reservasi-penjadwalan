@extends('layouts.siswa')

@section('content')
<div class="container-fluid py-4">

    {{-- Header Welcome --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-info shadow-lg border-0">
                <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div>
                        <h2 class="text-white mb-1">
                            Halo, {{ auth()->user()->name }} 👋
                        </h2>
                        <p class="text-white opacity-8 mb-0">
                            Siap belajar hari ini?
                        </p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <span class="badge bg-white text-info px-3 py-2">
                            
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu Utama --}}
    <div class="row">

        {{-- Daftar Kursus --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow me-3">
                            <i class="ni ni-books"></i>
                        </div>
                        <h5 class="mb-0">Kursus</h5>
                    </div>
                    <p class="text-sm text-muted">
                        Lihat dan pilih kursus yang tersedia.
                    </p>
                    <a href="{{ route('kursus.index') }}" class="btn btn-outline-primary btn-sm">
                        Lihat Kursus
                    </a>
                </div>
            </div>
        </div>

        {{-- Pendaftaran --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow me-3">
                            <i class="ni ni-single-copy-04"></i>
                        </div>
                        <h5 class="mb-0">Pendaftaran</h5>
                    </div>
                    <p class="text-sm text-muted">
                        Daftar kursus baru dengan cepat.
                    </p>
                    <a href="{{ route('siswa.jadwal') }}" class="btn btn-outline-success btn-sm">
                        Isi Form
                    </a>
                </div>
            </div>
        </div>

        {{-- Logout --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow me-3">
                            <i class="ni ni-button-power"></i>
                        </div>
                        <h5 class="mb-0">Keluar</h5>
                    </div>
                    <p class="text-sm text-muted">
                        Akhiri sesi belajar kamu.
                    </p>
                    <form action="{{ route('siswa.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- Statistik --}}
    <div class="row mt-3">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-sm text-muted mb-1">Kursus Aktif</p>
                    <h3 class="mb-0">5</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="text-sm text-muted mb-1">Total Pendaftaran</p>
                    <h3 class="mb-0">12</h3>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
