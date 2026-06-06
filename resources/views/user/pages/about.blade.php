@extends('layouts.landingpage.landingPage')

@section('title', 'About Us')

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
    <section class="py-5">
        <div class="container">

            <div class="row align-items-center g-3-">

                <!-- IMAGE -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('template/img/about/about-img.svg') }}" class="img-fluid w-75 bg-white"
                        alt="About Bliss">
                </div>

                <!-- CONTENT -->
                <div class="col-lg-6">

                    <div class="card border-0 shadow-xs mb-4">
                        <div class="card-body">
                            <h4 class="fw-bold text-primary mb-3">
                                <i class="fas fa-bullseye me-2"></i>Our Mission
                            </h4>
                            <p class="text-muted mb-0">
                                Memberikan akses pembelajaran teknologi yang mudah
                                dipahami oleh semua orang mulai dari pemula hingga
                                tingkat lanjut melalui kurikulum yang terstruktur.
                            </p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h4 class="fw-bold text-success mb-3">
                                <i class="fas fa-star me-2"></i>Why Choose Us
                            </h4>
                            <p class="text-muted mb-0">
                                Kami menyediakan materi up to date, pembelajaran
                                berbasis praktik, serta dukungan mentor yang siap
                                membantu siswa memahami konsep secara mendalam.
                            </p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="fw-bold text-warning mb-3">
                                <i class="fas fa-eye me-2"></i>Our Vision
                            </h4>
                            <p class="text-muted mb-0">
                                Menjadi platform pembelajaran teknologi yang membantu
                                generasi muda menguasai keterampilan digital untuk
                                menghadapi masa depan.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Our Achievement</h2>
                <p class="text-muted">
                    Statistik perkembangan platform Bliss
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body py-5">
                            <i class="fas fa-user-graduate fa-3x text-primary mb-3"></i>
                            <h2 class="fw-bold">{{ $totalStudents }}+</h2>
                            <p class="text-muted mb-0">Students</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body py-5">
                            <i class="fas fa-book-open fa-3x text-success mb-3"></i>
                            <h2 class="fw-bold">{{ $totalCourses }}+</h2>
                            <p class="text-muted mb-0">Courses</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body py-5">
                            <i class="fas fa-chalkboard-teacher fa-3x text-warning mb-3"></i>
                            <h2 class="fw-bold">{{ $totalMentors }}+</h2>
                            <p class="text-muted mb-0">Mentors</p>
                        </div>
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
