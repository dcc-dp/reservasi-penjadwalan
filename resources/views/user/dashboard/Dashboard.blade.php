@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-primary text-white p-4">
                <h2 class="mb-2">Selamat datang, {{ auth()->user()->name }}!</h2>
                <p>Senang melihatmu kembali di dashboard Siswa.</p>
            </div>
        </div>
    </div>

    <!-- Menu Cepat / Quick Links -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.form-pendaftaran') }}" class="text-decoration-none">
                <div class="card shadow-sm p-3 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-file-alt fa-2x mb-2 text-primary"></i>
                        <h5 class="card-title">Form Pendaftaran</h5>
                        <p class="card-text">Isi form untuk mendaftar kursus baru.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('kursus.index') }}" class="text-decoration-none">
                <div class="card shadow-sm p-3 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-2x mb-2 text-success"></i>
                        <h5 class="card-title">Daftar Kursus</h5>
                        <p class="card-text">Lihat kursus yang tersedia untukmu.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <form action="{{ route('siswa.logout') }}" method="POST">
                @csrf
                <div class="card shadow-sm p-3 h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-sign-out-alt fa-2x mb-2 text-danger"></i>
                        <h5 class="card-title">Logout</h5>
                        <button type="submit" class="btn btn-danger mt-2">Keluar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Statistik / Info tambahan (opsional) -->
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kursus Aktif</h5>
                    <p class="card-text display-6">5</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <h5 class="card-title">Total Ulasan</h5>
                    <p class="card-text display-6">12</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
