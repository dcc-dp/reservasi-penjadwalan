@extends('layouts.landingpage.landingPage')

@section('title','About Us')

@section('content')

<!-- PAGE HEADER -->

<section class="pt-150 pb-80 text-center bg-light">
    <div class="container">
        <h1 class="mb-20">About Us</h1>
        <p class="lead">
            Bliss adalah platform pembelajaran teknologi yang membantu siswa
            mengembangkan keterampilan digital melalui kursus terstruktur,
            mentor berpengalaman, dan project nyata.
        </p>
    </div>
</section>


<!-- ABOUT CONTENT -->

<section class="about-section pt-100 pb-100">
    <div class="container">

        <div class="row align-items-center">

            <!-- IMAGE -->
            <div class="col-lg-6 mb-40">
                <img src="{{ asset('template/img/about/about-img.svg') }}"
                    class="img-fluid rounded shadow">
            </div>

            <!-- TEXT -->
            <div class="col-lg-6">

                <div class="mb-40">
                    <h3 class="mb-15">Our Mission</h3>
                    <p>
                        Memberikan akses pembelajaran teknologi yang mudah
                        dipahami oleh semua orang mulai dari pemula hingga
                        tingkat lanjut melalui kurikulum yang terstruktur.
                    </p>
                </div>

                <div class="mb-40">
                    <h3 class="mb-15">Why Choose Us</h3>
                    <p>
                        Kami menyediakan materi up to date, pembelajaran
                        berbasis praktik, serta dukungan mentor yang siap
                        membantu siswa memahami konsep secara mendalam.
                    </p>
                </div>

                <div>
                    <h3 class="mb-15">Our Vision</h3>
                    <p>
                        Menjadi platform pembelajaran teknologi yang membantu
                        generasi muda menguasai keterampilan digital untuk
                        menghadapi masa depan.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>


<!-- STATISTICS -->

<section class="pt-100 pb-100 bg-light">
    <div class="container">

        <div class="row text-center">

            <div class="col-lg-3 col-md-6 mb-30">
                <div class="single-service p-4 shadow-sm">
                    <h2 class="mb-10">500+</h2>
                    <p>Students</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-30">
                <div class="single-service p-4 shadow-sm">
                    <h2 class="mb-10">20+</h2>
                    <p>Courses</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-30">
                <div class="single-service p-4 shadow-sm">
                    <h2 class="mb-10">15+</h2>
                    <p>Mentors</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-30">
                <div class="single-service p-4 shadow-sm">
                    <h2 class="mb-10">5+</h2>
                    <p>Years Experience</p>
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
            Bergabunglah dengan ratusan siswa yang telah meningkatkan
            skill digital mereka bersama Bliss.
        </p>

        <a href="{{ route('siswa.register') }}" class="main-btn btn-hover">
            Join Now
        </a>

    </div>
</section>

@endsection