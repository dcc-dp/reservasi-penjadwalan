@extends('layouts.landingpage.landingPage')

@section('title', 'Beranda')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section pt-150 pb-100">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="mb-25">
                            Learn Programming <br>
                            Build Your Future
                        </h1>

                        <p class="mb-35">
                            Platform pembelajaran teknologi yang membantu kamu
                            menguasai skill digital seperti Web Development,
                            Data Science, dan UI/UX melalui materi terstruktur
                            dan project nyata.
                        </p>

                        <a href="{{ route('siswa.login') }}" class="main-btn btn-hover me-3">
                            Daftar Sekarang
                        </a>

                        <a href="{{ route('about') }}" class="main-btn btn-hover border-btn">
                            Learn More
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('template/img/hero/hero-img.svg') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('template/img/about/about-img.svg') }}" class="img-fluid w-75" alt="About Bliss">
                </div>

                <div class="col-lg-6">

                    <span class="badge bg-primary px-3 py-2 mb-3">
                        TENTANG BLISS
                    </span>

                    <h2 class="fw-bold mb-4">
                        Belajar Skill Digital Lebih Mudah dan Terarah
                    </h2>

                    <p class="text-muted mb-4">
                        Bliss hadir untuk membantu siswa dan mahasiswa mengembangkan
                        keterampilan digital yang relevan dengan kebutuhan industri.
                        Materi disusun secara terstruktur, didampingi mentor
                        berpengalaman, serta dilengkapi praktik langsung melalui
                        project nyata.
                    </p>

                    <div class="row mb-4">

                        <div class="col-6">
                            <div class="border rounded p-3 text-center">
                                <h4 class="fw-bold text-primary mb-1">{{ $totalStudents }}</h4>
                                <small class="text-muted">Siswa Aktif</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="border rounded p-3 text-center">
                                <h4 class="fw-bold text-primary mb-1">{{ $totalCourses }}</h4>
                                <small class="text-muted">Kursus Tersedia</small>
                            </div>
                        </div>

                    </div>

                    <a href="{{ route('about') }}" class="btn btn-primary rounded-pill px-4">
                        Pelajari Lebih Lanjut
                    </a>

                </div>

            </div>

        </div>
    </section>

    <!-- BENEFIT -->

    <section class="service-section py-5">
        <div class="container">
            <div class="text-center mb-5">

                <span class="badge bg-primary px-3 py-2 mb-3">
                    KEUNGGULAN BLISS
                </span>

                <h2 class="fw-bold mb-3">
                    Mengapa Memilih Bliss?
                </h2>

                <p class="text-muted col-lg-6 mx-auto">
                    Kami menghadirkan pengalaman belajar yang terstruktur,
                    interaktif, dan relevan dengan kebutuhan dunia kerja saat ini.
                </p>

            </div>

            <div class="row g-4">

                <!-- Benefit 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4"> <span class="badge bg-light text-primary mb-4"> 01 </span>
                            <div class="mb-4">
                                <div class="icon color-1 mx-auto"> <i class="lni lni-book"></i> </div>
                            </div>
                            <h5 class="fw-bold mb-3"> Interactive Learning </h5>
                            <p class="text-muted"> Belajar melalui praktik langsung dan studi kasus sehingga materi lebih
                                mudah dipahami. </p>
                        </div>

                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-light text-primary">
                                    02
                                </span>

                                <i class="lni lni-users fs-2 text-primary"></i>
                            </div>

                            <h5 class="fw-bold mb-3">
                                Experienced Mentors
                            </h5>

                            <p class="text-muted">
                                Didampingi mentor profesional yang siap membantu
                                selama proses belajar berlangsung.
                            </p>

                        </div>

                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-light text-primary">
                                    03
                                </span>

                                <i class="lni lni-code fs-2 text-primary"></i>
                            </div>

                            <h5 class="fw-bold mb-3">
                                Real Projects
                            </h5>

                            <p class="text-muted">
                                Bangun portofolio melalui project nyata yang dapat
                                menunjukkan kemampuan Anda kepada dunia kerja.
                            </p>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- PROGRAM PACKAGE -->
    <section class="pricing-section py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <span class="badge bg-primary px-3 py-2 mb-3">
                    PAKET BELAJAR
                </span>

                <h2 class="fw-bold">
                    Pilih Program Terbaik Untukmu
                </h2>

                <p class="text-muted">
                    Temukan paket yang sesuai dengan kebutuhan dan target belajarmu.
                </p>
            </div>

            <div class="row g-4 justify-content-center">

                @foreach ($paket as $p)
                    <div class="col-lg-4 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body text-center p-5 d-flex flex-column">

                                {{-- Badge --}}
                                <div class="mb-3">
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                                        {{ strtoupper($p->jenis) }}
                                    </span>
                                </div>

                                {{-- Nama Kursus --}}
                                <h4 class="fw-bold mb-3">
                                    {{ $p->kursus->name }}
                                </h4>

                                {{-- Harga --}}
                                <div class="mb-4">

                                    <h2 class="fw-bold text-primary mb-0">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    </h2>

                                    <small class="text-muted">
                                        {{ Str::limit($p->kursus->deskripsi, 50) }}
                                    </small>

                                </div>

                                {{-- Tombol --}}
                                <div class="mt-auto">
                                    <a href="{{ route('pakets') }}" class="btn btn-primary rounded-pill px-4 py-2">
                                        Lihat Detail
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    {{-- Testimoni --}}
    <section class="pt-5 pb-5">
        <div class="container">

            {{-- Heading --}}
            <div class="text-center mb-5">

                <span class="badge bg-primary px-3 py-2 mb-3">
                    TESTIMONI SISWA
                </span>

                <h2 class="fw-bold mb-3">
                    Apa Kata Mereka Setelah Belajar Bersama Kami?
                </h2>

                <p class="text-muted col-lg-7 mx-auto">
                    Kepuasan siswa adalah prioritas kami. Simak pengalaman mereka
                    setelah mengikuti berbagai kursus dan meningkatkan skill digital
                    bersama Bliss.
                </p>

            </div>

            {{-- Testimoni --}}
            <div class="row g-4 justify-content-center">

                @forelse($ulasans as $ulasan)

                    <div class="col-lg-4 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body p-4 d-flex flex-column">

                                {{-- Rating --}}
                                <div class="mb-3 text-warning">

                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="far fa-star{{ $i <= $ulasan->rating ? '' : 'text-secondary' }}"></i>
                                    @endfor

                                </div>

                                {{-- Isi Ulasan --}}
                                <div class="flex-grow-1">

                                    <p class="text-muted mb-4">
                                        "{{ Str::limit($ulasan->ulasan, 70) }}"
                                    </p>

                                </div>

                                <hr>

                                {{-- Footer --}}
                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <h6 class="fw-bold mb-1">
                                            {{ $ulasan->user->name }}
                                        </h6>

                                    </div>

                                    <span class="badge bg-light text-primary border">
                                        {{ $ulasan->kursus->name }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-info text-center">
                            Belum ada ulasan.
                        </div>

                    </div>

                @endforelse

            </div>

        </div>
    </section>


    {{-- CTA --}}
    <section class="pt-5 pb-5">
        <div class="container">

            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">

                    <div class="mb-3">
                        <i class="lni lni-graduation fs-1 text-primary"></i>
                    </div>

                    <h2 class="fw-bold mb-3">
                        Start Learning Today
                    </h2>

                    <p class="text-muted mb-4">
                        Bergabunglah dengan ratusan siswa yang telah
                        meningkatkan skill digital mereka bersama Bliss.
                    </p>

                    <a href="{{ route('siswa.register') }}" class="btn btn-primary rounded-pill px-5 py-3">
                        Join Now
                    </a>

                </div>
            </div>

        </div>
    </section>

@endsection
