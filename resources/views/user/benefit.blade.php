@extends('layouts.landingpage.landingPage')

@section('title', 'Benefit')

@section('content')
<div class="container-fluid pb-0 hero-header bg-light mb-3">
    <div class="container">
        <div class="row g-5 align-items-center mb-2">

            <!-- Teks -->
            <div class="col-lg-7 mb-2">
                <span class="border border-success rounded-pill px-3 py-1 text-success fw-semibold">
                    Keuntungan Bergabung
                </span>

                <h1 class="fw-bold mt-3">
                    Mengapa Harus <br> Belajar Bersama Kami?
                </h1>

                <p class="mt-3">
                    Kami tidak hanya mengajarkan <strong>kode</strong>, tetapi juga <strong>cara berpikir sebagai programmer</strong>.
                    Dengan metode pembelajaran interaktif dan dukungan mentor berpengalaman, kamu bisa berkembang lebih cepat!
                </p>

                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Belajar langsung dari praktisi berpengalaman</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Materi pembelajaran berbasis proyek nyata</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Konsultasi dan mentoring gratis seumur hidup</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Sertifikat resmi setelah menyelesaikan kursus</li>
                </ul>

                <a href="#" class="btn btn-success fw-semibold rounded-pill px-4 mt-3">
                    Daftar Sekarang →
                </a>
            </div>

            <!-- Gambar -->
            <div class="col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('assets/img/benefit.png') }}" class="img-fluid rounded-4 border-0 w-75"
                        alt="Benefit Belajar">

                    <div class="position-absolute top-0 start-0 bg-white px-2 py-1 rounded-3 text-start small shadow-sm">
                        <i class="bi bi-star-fill text-warning"></i>
                        <strong>Top Rated</strong><br>
                        98% siswa puas dengan hasil belajar
                    </div>

                    <div class="position-absolute bottom-0 end-0 bg-white p-2 rounded-3 text-start small shadow-sm">
                        <i class="bi bi-award text-primary"></i>
                        <strong>Sertifikasi</strong><br>
                        Diakui oleh industri teknologi
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Section tambahan: highlight 3 benefit utama -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Benefit Utama Kami</h2>
        <p class="text-muted">Kami berkomitmen memberikan pengalaman belajar terbaik bagi setiap peserta.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="text-success fs-1 mb-3"><i class="bi bi-laptop"></i></div>
                <h5 class="fw-bold">Belajar Online & Offline</h5>
                <p>Fleksibilitas penuh — kamu bisa belajar di mana saja, kapan saja sesuai waktu kamu sendiri.</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="text-primary fs-1 mb-3"><i class="bi bi-people"></i></div>
                <h5 class="fw-bold">Mentor Berpengalaman</h5>
                <p>Dapatkan bimbingan langsung dari pengajar profesional yang sudah terjun di dunia kerja nyata.</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <div class="text-warning fs-1 mb-3"><i class="bi bi-trophy"></i></div>
                <h5 class="fw-bold">Portofolio & Sertifikat</h5>
                <p>Bangun portofolio proyek nyata dan dapatkan sertifikat yang bisa meningkatkan kariermu.</p>
            </div>
        </div>
    </div>
</div>
@endsection
