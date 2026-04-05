@extends('layouts.landingpage.landingPage')

@section('title', 'Benefit')

@section('content')

<!-- PAGE HEADER -->
<section class="pt-150 pb-80 text-center bg-light">
    <div class="container">
        <h1 class="mb-20">Learning Benefits</h1>
        <p>
            Temukan berbagai keuntungan belajar programming bersama platform kami.
        </p>
    </div>
</section>

<!-- BENEFIT SECTION -->
<section class="service-section pt-100 pb-100">
    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-1 mb-20">
                        <i class="lni lni-code-alt"></i>
                    </div>
                    <h4>Hands-on Project</h4>
                    <p>
                        Belajar coding melalui project nyata sehingga
                        skill yang dipelajari langsung bisa diterapkan.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-2 mb-20">
                        <i class="lni lni-users"></i>
                    </div>
                    <h4>Mentor Berpengalaman</h4>
                    <p>
                        Dibimbing oleh mentor yang berpengalaman di bidang
                        teknologi dan industri digital.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-3 mb-20">
                        <i class="lni lni-book"></i>
                    </div>
                    <h4>Materi Terstruktur</h4>
                    <p>
                        Kurikulum disusun secara sistematis dari
                        dasar hingga tingkat lanjut.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-4 mb-20">
                        <i class="lni lni-certificate"></i>
                    </div>
                    <h4>Sertifikat</h4>
                    <p>
                        Dapatkan sertifikat setelah menyelesaikan
                        program pembelajaran.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-1 mb-20">
                        <i class="lni lni-laptop-phone"></i>
                    </div>
                    <h4>Flexible Learning</h4>
                    <p>
                        Belajar kapan saja dan dimana saja
                        dengan sistem pembelajaran fleksibel.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-service text-center">
                    <div class="icon color-2 mb-20">
                        <i class="lni lni-rocket"></i>
                    </div>
                    <h4>Career Preparation</h4>
                    <p>
                        Persiapan karir di bidang teknologi dengan
                        skill yang dibutuhkan industri.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="cta-section pt-80 pb-80 text-center bg-light">
    <div class="container">
        <h2 class="mb-20">Start Your Coding Journey Today</h2>
        <p class="mb-30">
            Bergabunglah dengan platform belajar kami dan mulai
            membangun masa depan digitalmu.
        </p>

        <a href="{{ route('siswa.register') }}" class="btn btn-primary">
            Join Now
        </a>
    </div>
</section>

@endsection