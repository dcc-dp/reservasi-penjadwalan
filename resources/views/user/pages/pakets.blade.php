@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')

<section class="pricing-section pt-150 pb-120 bg-light">
<div class="container">

    <!-- TITLE -->
    <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-70">
            <h2 class="mb-20">Paket Kursus</h2>
            <p class="text-muted">
                Pilih paket belajar yang sesuai dengan kebutuhanmu.
                Mulai dari dasar hingga menjadi developer profesional.
            </p>
        </div>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- REGULER -->
        <div class="col-lg-4 col-md-6">
            <div class="single-pricing text-center p-5 bg-white shadow-sm h-100">

                <div class="mb-4">
                    <i class="lni lni-code-alt" style="font-size:40px;color:#4A6CF7;"></i>
                </div>

                <h4 class="mb-20">Paket Reguler</h4>

                <div class="price mb-25">
                    <span class="text-muted text-decoration-line-through">
                        Rp 1.500.000
                    </span>
                    <h2 class="fw-bold mt-2">Rp 900.000</h2>
                </div>

                <ul class="list mb-30 text-start">
                    <li>✔ 40+ Video Pembelajaran</li>
                    <li>✔ Materi Algoritma</li>
                    <li>✔ Latihan Soal</li>
                    <li>✔ Sertifikat Kelulusan</li>
                </ul>

                <a href="{{ route('siswa.form-pendaftaran',['paket_id'=>1]) }}"
                   class="btn btn-outline-primary w-100">
                   Daftar Sekarang
                </a>

            </div>
        </div>


        <!-- VIP -->
        <div class="col-lg-4 col-md-6">
            <div class="single-pricing text-center p-5 bg-white shadow-lg position-relative h-100">

                <span class="badge bg-primary position-absolute top-0 start-50 translate-middle px-3 py-2">
                    Paling Populer
                </span>

                <div class="mb-4 mt-3">
                    <i class="lni lni-world" style="font-size:40px;color:#4A6CF7;"></i>
                </div>

                <h4 class="mb-20">Paket VIP</h4>

                <div class="price mb-25">
                    <span class="text-muted text-decoration-line-through">
                        Rp 3.000.000
                    </span>
                    <h2 class="fw-bold mt-2">Rp 2.100.000</h2>
                </div>

                <ul class="list mb-30 text-start">
                    <li>✔ Belajar Web Development</li>
                    <li>✔ HTML, CSS, JavaScript</li>
                    <li>✔ Domain & Hosting Gratis</li>
                    <li>✔ Project Website Nyata</li>
                </ul>

                <a href="{{ route('siswa.form-pendaftaran',['paket_id'=>2]) }}"
                   class="btn btn-primary w-100">
                   Daftar Sekarang
                </a>

            </div>
        </div>


        <!-- VVIP -->
        <div class="col-lg-4 col-md-6">
            <div class="single-pricing text-center p-5 bg-white shadow-sm h-100">

                <div class="mb-4">
                    <i class="lni lni-layers" style="font-size:40px;color:#4A6CF7;"></i>
                </div>

                <h4 class="mb-20">Paket VVIP</h4>

                <div class="price mb-25">
                    <span class="text-muted text-decoration-line-through">
                        Rp 4.200.000
                    </span>
                    <h2 class="fw-bold mt-2">Rp 3.000.000</h2>
                </div>

                <ul class="list mb-30 text-start">
                    <li>✔ Mentoring Langsung</li>
                    <li>✔ Laravel & React</li>
                    <li>✔ Project Portfolio</li>
                    <li>✔ Sertifikat Profesional</li>
                </ul>

                <a href="{{ route('siswa.reservasi.create') }}"
                   class="btn btn-outline-primary w-100">
                   Daftar Sekarang
                </a>

            </div>
        </div>

    </div>

</div>
</section>

@endsection