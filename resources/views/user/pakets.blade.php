@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')
<style>
    /* Efek hover & tampilan kartu */
    .paket-card {
        transition: all 0.3s ease;
        border-top: 5px solid transparent;
    }
    .paket-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-top-color: #0dcaf0;
    }

    /* Efek hover tombol daftar */
    .btn-daftar {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: #fff;
        transition: all 0.3s ease;
    }
    .btn-daftar:hover {
        background: linear-gradient(90deg, #00bcd4, #007bff);
        box-shadow: 0 6px 20px rgba(0, 188, 212, 0.4);
        transform: translateY(-2px);
    }

    /* Judul dan badge */
    .hero-header h1 {
        color: #002b5c;
    }
    .badge {
        font-size: 0.85rem;
        letter-spacing: 0.3px;
    }
</style>

<div class="container-fluid pb-0 hero-header bg-light mb-5">
    <div class="container">
    
    /* === Modern Card Styling === */
    .pricing-card {
        border: none;
        border-radius: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .pricing-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .pricing-badge {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 50px;
        padding: 6px 14px;
        letter-spacing: 0.3px;
    }

    .card-price {
        font-size: 1.8rem;
        color: #111;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
    }

    .btn-modern {
        border: none;
        border-radius: 50px;
        font-weight: 600;
        padding: 12px 36px;
        transition: all 0.3s ease;
        background: linear-gradient(90deg, #0066ff, #00ccff);
        color: white;
    }

    .btn-modern:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #0055dd, #00bbee);
    }

    .popular-card {
        border-top: 6px solid gold;
    }

    .feature-list li {
        margin-bottom: 6px;
    }

    /* Responsive header */
    .hero-header h1 {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
    }

    .hero-header p {
        font-size: clamp(1rem, 2vw, 1.1rem);
    }

</style>

<div class="container-fluid pb-0 hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="border border-info rounded-pill px-3 py-1 text-info fw-semibold">
                Paket Belajar
            </span>
            <h1 class="fw-bold mt-3 display-6">Pilih Program Belajar Terbaik</h1>
            <p class="text-muted">Tentukan jalur suksesmu bersama <strong>Belajar Program 🚀</strong></p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Paket 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card paket-card shadow-sm border-0 rounded-4 h-100 text-center position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-secondary text-white px-3 py-2 rounded-pill shadow-sm">Kuota Terbatas</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Bimbel Intensif SNBT 2026</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 7.100.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 1.500.000</h3>
                        <p class="small text-muted">
                            Belajar intensif 30 hari tanpa menginap, siap hadapi ujian SNBT!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Paket 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card paket-card shadow-sm border-0 rounded-4 h-100 text-center position-relative" style="border-top-color: gold;">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-danger text-white px-3 py-2 rounded-pill shadow-sm">Paling Populer</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Supercamp Karantina</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 52.663.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 40.510.000</h3>
                        <p class="small text-muted">
                            Menginap 30 hari di apartemen premium, sistem belajar super intensif.
                        </p>
                        <ul class="list-unstyled small text-start d-inline-block mb-0">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Gratis Belajar Ulang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Paket 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card paket-card shadow-sm border-0 rounded-4 h-100 text-center position-relative">
                    <div class="position-absolute top-0 start-50 translate-middle mt-3">
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm">Diskon Spesial</span>
                    </div>
                    <div class="card-body p-4 mt-4">
                        <h5 class="fw-bold text-primary mb-2">Privat SNBT 2026</h5>
                        <p class="text-decoration-line-through text-muted mb-1">Rp 60.754.000</p>
                        <h3 class="fw-bold text-dark mb-3">Rp 41.675.000</h3>
                        <p class="small text-muted">
                            Program 1 guru 1 siswa, guru datang ke rumah siswa.
                        </p>
                        <ul class="list-unstyled small text-start d-inline-block mb-0">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Guru Sampai Cocok</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Daftar -->
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.create') }}" class="btn btn-daftar fw-semibold rounded-pill px-5 py-3 shadow-lg fs-5">
                🚀 Daftar Sekarang
            </a>
            <p class="mt-3 text-muted small">
                Jangan lewatkan promo & tempat terbatas — daftar hari ini untuk mulai perjalanan suksesmu!
            </p>
        </div>

        <!-- Tombol Daftar Satu Saja -->
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.create') }}" class="btn btn-modern">Daftar Sekarang</a>
        </div>=
    </div>
</div>
@endsection
