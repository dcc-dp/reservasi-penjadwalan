@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')
<div class="container-fluid pb-0 hero-header bg-light mb-3">
    <div class="container">
        <div class="text-center mb-5">
            <span class="border border-info rounded-pill px-3 py-1 text-info fw-semibold">
                Paket Belajar
            </span>
            <h1 class="fw-bold mt-3">Pilih Program Belajar Terbaik</h1>
            <p class="text-muted">Tentukan jalur suksesmu bersama Belajar Program 🚀</p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Paket 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 rounded-4 h-100 text-center position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-secondary text-white px-3 py-2 rounded-pill">Kuota Terbatas</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Bimbel Intensif SNBT 2026</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 7.100.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 5.000.000</h3>
                        <p class="small text-muted mb-4">Belajar intensif 30 hari tanpa menginap, siap hadapi ujian SNBT!</p>
                        <a href="#!" class="btn btn-info fw-semibold rounded-pill px-4 py-2">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Paket 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 rounded-4 h-100 text-center position-relative" style="border-top: 5px solid gold;">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-danger text-white px-3 py-2 rounded-pill">Paling Populer</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Supercamp Karantina</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 52.663.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 40.510.000</h3>
                        <p class="small text-muted mb-4">
                            Menginap 30 hari di apartemen premium, sistem belajar super intensif.
                        </p>
                        <ul class="list-unstyled small text-start d-inline-block mb-3">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Gratis Belajar Ulang</li>
                        </ul>
                        <a href="#!" class="btn btn-warning fw-semibold rounded-pill px-4 py-2 text-white">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Paket 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-lg border-0 rounded-4 h-100 text-center position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-danger text-white px-3 py-2 rounded-pill">Diskon Spesial</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Privat SNBT 2026</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 60.754.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 41.675.000</h3>
                        <p class="small text-muted mb-4">
                            Program 1 guru 1 siswa, guru datang ke rumah siswa.
                        </p>
                        <ul class="list-unstyled small text-start d-inline-block mb-3">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Guru Sampai Cocok</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                        </ul>
                        <a href="#!" class="btn fw-semibold rounded-pill px-4 py-2 text-white"
                            style="background: linear-gradient(90deg, #ff4b2b, #ff416c);">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
