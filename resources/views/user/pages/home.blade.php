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


<!-- ABOUT PREVIEW -->
<section class="about-section pt-100 pb-100 bg-light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="{{ asset('template/img/about/about-img.svg') }}" class="img-fluid">
            </div>

            <div class="col-lg-6">
                <h2 class="mb-20">About Our Platform</h2>

                <p class="mb-30">
                    Bliss adalah platform belajar teknologi yang membantu
                    siswa mengembangkan skill digital melalui pembelajaran
                    yang terstruktur, mentor berpengalaman, dan praktik
                    langsung melalui project.
                </p>

                <a href="{{ route('about') }}" class="main-btn btn-hover">
                    Read More
                </a>
            </div>

        </div>
    </div>
</section>


<!-- BENEFIT -->
<section class="service-section pt-100 pb-100">
    <div class="container">

        <div class="section-title text-center mb-60">
            <h2>Why Learn With Us</h2>
            <p>Beberapa keuntungan belajar di platform kami</p>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-1">
                        <i class="lni lni-graduation"></i>
                    </div>
                    <h4>Interactive Learning</h4>
                    <p>Pembelajaran interaktif dengan praktik langsung.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-2">
                        <i class="lni lni-users"></i>
                    </div>
                    <h4>Experienced Mentors</h4>
                    <p>Dibimbing oleh mentor profesional di bidang teknologi.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-3">
                        <i class="lni lni-code"></i>
                    </div>
                    <h4>Real Projects</h4>
                    <p>Mengerjakan project nyata untuk meningkatkan skill.</p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- PROGRAM PACKAGE -->
<section class="pricing-section pt-100 pb-100 bg-light">
    <div class="container">

        <div class="section-title text-center mb-60">
            <h2>Program Packages</h2>
            <p>Pilih paket belajar sesuai kebutuhanmu</p>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="single-pricing text-center">
                    <h3>Basic</h3>
                    <h2 class="mb-20">Rp 500K</h2>
                    <p>Materi dasar programming</p>

                    <a href="{{ route('pakets') }}" class="main-btn btn-hover mt-20">
                        View Detail
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-pricing text-center">
                    <h3>Intermediate</h3>
                    <h2 class="mb-20">Rp 1.000K</h2>
                    <p>Belajar project dan framework</p>

                    <a href="{{ route('pakets') }}" class="main-btn btn-hover mt-20">
                        View Detail
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-pricing text-center">
                    <h3>Advanced</h3>
                    <h2 class="mb-20">Rp 1.500K</h2>
                    <p>Mentoring intensif + project besar</p>

                    <a href="{{ route('pakets') }}" class="main-btn btn-hover mt-20">
                        View Detail
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- CTA -->
<section class="pt-80 pb-80 text-center">
    <div class="container">

        <h2 class="mb-20">Start Learning Today</h2>

        <p class="mb-30">
            Bergabunglah dengan ratusan siswa yang telah
            meningkatkan skill digital mereka bersama Bliss.
        </p>

        <a href="{{ route('siswa.register') }}" class="main-btn btn-hover">
            Join Now
        </a>

    </div>
</section>

@endsection