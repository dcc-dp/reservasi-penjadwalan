@extends('layouts.landingpage.landingPage')

@section('title', 'Benefit')

@section('content')
<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <span class="border border-warning rounded-pill px-3 py-1 text-warning fw-semibold">
            Kenapa Memilih Kami?
        </span>
        <h1 class="fw-bold mt-3 mb-4">Benefit Belajar Bersama Kami</h1>
        <p class="text-muted mb-5">
            Dapatkan pengalaman belajar terbaik dengan berbagai keuntungan yang kami tawarkan. 
            Program kami dirancang agar kamu bisa menguasai skill pemrograman secara praktis dan menyenangkan.
        </p>

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/young-analysts.jpg') }}" class="mx-auto mb-3" width="80" alt="Mentor Berpengalaman">
                    <h5 class="fw-bold mb-2">Mentor Berpengalaman</h5>
                    <p class="text-muted">
                        Belajar langsung dari mentor profesional yang sudah berpengalaman di industri teknologi.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/close-up-still-life-hard-exams.jpg') }}" class="mx-auto mb-3" width="80" alt="Materi Terstruktur">
                    <h5 class="fw-bold mb-2">Materi Terstruktur</h5>
                    <p class="text-muted">
                        Materi disusun dari dasar hingga mahir, lengkap dengan proyek nyata agar mudah dipahami.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/young-asian-woman-smile-with-clock-isolated-gray-background.jpg') }}" class="mx-auto mb-3" width="80" alt="Waktu Fleksibel">
                    <h5 class="fw-bold mb-2">Waktu Fleksibel</h5>
                    <p class="text-muted">
                        Belajar kapan saja dan di mana saja dengan sistem online yang fleksibel.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/young-asian-woman-smile-with-clock-isolated-gray-background.jpg') }}" class="mx-auto mb-3" width="80" alt="Sertifikat Resmi">
                    <h5 class="fw-bold mb-2">Sertifikat Resmi</h5>
                    <p class="text-muted">
                        Dapatkan sertifikat resmi setelah menyelesaikan kursus sebagai bukti kemampuanmu.
                    </p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/young-asian-woman-smile-with-clock-isolated-gray-background.jpg') }}" class="mx-auto mb-3" width="80" alt="Komunitas Belajar">
                    <h5 class="fw-bold mb-2">Komunitas Belajar</h5>
                    <p class="text-muted">
                        Gabung ke komunitas programmer dan saling berbagi pengalaman serta project.
                    </p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <img src="{{ asset('assets/img/young-asian-woman-smile-with-clock-isolated-gray-background.jpg') }}" class="mx-auto mb-3" width="80" alt="Dukungan Penuh">
                    <h5 class="fw-bold mb-2">Dukungan Penuh</h5>
                    <p class="text-muted">
                        Tim support kami siap membantu jika kamu mengalami kendala selama proses belajar.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="container text-center py-5">
    <h2 class="fw-bold mb-3">Siap Mulai Perjalanan Belajarmu?</h2>
    <p class="text-muted mb-4">Gabung sekarang dan rasakan pengalaman belajar yang menyenangkan dan bermanfaat!</p>
    <a href="#" class="btn btn-warning fw-semibold rounded-pill px-4 py-2">Daftar Sekarang</a>
</div>
@endsection
