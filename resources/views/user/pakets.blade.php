@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')
<style>
    .course-card {
        border: none;
        border-radius: 20px;
        transition: all 0.3s ease;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .course-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .course-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
    }

    .price-old {
        text-decoration: line-through;
        color: #999;
        font-size: 14px;
    }

    .price-new {
        font-size: 28px;
        font-weight: bold;
        color: #222;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #0072ff, #00c6ff);
        border: none;
        color: #fff;
        transition: all 0.3s;
    }

    .btn-gradient:hover {
        opacity: 0.9;
        transform: scale(1.03);
    }

    .btn-daftar {
        background: linear-gradient(90deg, #0072ff, #00c6ff);
        color: #fff;
        border: none;
        transition: 0.3s;
    }

    .btn-daftar:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }
</style>

<div class="container-fluid pb-0 hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="border border-info rounded-pill px-3 py-1 text-info fw-semibold">
                Belajar Coding Seru 🚀
            </span>
            <h1 class="fw-bold mt-3">Upgrade Skill Coding-mu Sekarang!</h1>
            <p class="text-muted">Mulai dari dasar logika pemrograman hingga membuat aplikasi profesional.</p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- Paket 1: Algoritma --}}
            <div class="col-lg-4 col-md-6">
                <div class="card course-card text-center p-4 h-100">
                    <div class="course-icon" style="background: linear-gradient(135deg, #0072ff, #00c6ff);">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Algoritma & Logika Pemrograman</h5>
                    <p class="price-old">Rp 1.500.000</p>
                    <p class="price-new">Rp 900.000</p>
                    <p class="text-muted small mb-4">
                        Pelajari dasar berpikir logis dan algoritmik menggunakan bahasa Python & C++.
                    </p>
                    <ul class="list-unstyled small text-start d-inline-block mb-4">
                        <li><i class="bi bi-check-circle text-success me-2"></i>40+ Video Interaktif</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Latihan Soal & Quiz</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Sertifikat Kelulusan</li>
                    </ul>
                    <a href="#!" class="btn btn-gradient fw-semibold rounded-pill px-4 py-2">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Paket 2: Website --}}
            <div class="col-lg-4 col-md-6">
                <div class="card course-card text-center p-4 h-100 border-top border-warning border-4">
                    <div class="course-icon" style="background: linear-gradient(135deg, #ffb347, #ffcc33);">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Fullstack Web Development</h5>
                    <p class="price-old">Rp 3.000.000</p>
                    <p class="price-new">Rp 2.100.000</p>
                    <p class="text-muted small mb-4">
                        Bangun website dari nol hingga online dengan HTML, CSS, JavaScript, dan PHP.
                    </p>
                    <ul class="list-unstyled small text-start d-inline-block mb-4">
                        <li><i class="bi bi-check-circle text-success me-2"></i>Proyek Nyata</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Domain & Hosting Gratis</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Belajar Sampai Bisa</li>
                    </ul>
                    <a href="#!" class="btn btn-gradient fw-semibold rounded-pill px-4 py-2" style="background: linear-gradient(90deg,#ffb347,#ffcc33);">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Paket 3: Framework --}}
            <div class="col-lg-4 col-md-6">
                <div class="card course-card text-center p-4 h-100">
                    <div class="course-icon" style="background: linear-gradient(135deg, #ff416c, #ff4b2b);">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Framework Mastery (Laravel & React)</h5>
                    <p class="price-old">Rp 4.200.000</p>
                    <p class="price-new">Rp 3.000.000</p>
                    <p class="text-muted small mb-4">
                        Kuasai framework modern Laravel & React.js untuk membangun aplikasi profesional.
                    </p>
                    <ul class="list-unstyled small text-start d-inline-block mb-4">
                        <li><i class="bi bi-check-circle text-success me-2"></i>Mentoring Langsung</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Proyek Akhir Portofolio</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Sertifikat Profesional</li>
                    </ul>
                    <a href="#!" class="btn btn-gradient fw-semibold rounded-pill px-4 py-2" style="background: linear-gradient(90deg, #ff416c, #ff4b2b);">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

        </div> <!-- end row -->

        <!-- Tombol Daftar -->
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.create') }}" class="btn btn-daftar fw-semibold rounded-pill px-5 py-3 shadow-lg fs-5">
                🚀 Daftar Sekarang
            </a>
            <p class="mt-3 text-muted small">
                Jangan lewatkan promo & tempat terbatas — daftar hari ini untuk mulai perjalanan suksesmu!
            </p>
        </div>
    </div>
</div>
@endsection
