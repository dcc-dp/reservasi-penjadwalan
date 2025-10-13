@extends('layouts.landingpage.landingPage')

@section('title', 'About')

@section('content')
  <div class="container-fluid pb-0 hero-header bg-light mb-3">
        <div class="container">
            <div class="row g-5 align-items-center mb-2">

                <!-- Teks -->
                <div class="col-lg-7 mb-2">
                    <span class="border border-info rounded-pill px-3 py-1 text-info fw-semibold">
                        Belajar Program
                    </span>

                    <h1 class="fw-bold mt-3">
                        Belajar Bahasa <br>
                        Pemrograman
                    </h1>

                    <p class="mt-3">
                        <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. At quia.</strong>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, error.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, porro tenetur impedit nam
                        officiis illo!
                    </p>

                    <p>
                        Lorem, ipsum <strong>Lorem ipsum dolor sit.</strong>, dan <strong>Lorem.</strong>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Dicta molestiae non libero ducimus.
                    </p>

                    <a href="#" class="btn btn-warning fw-semibold rounded-pill px-4">
                        Informasi Selengkapnya →
                    </a>
                </div>

                <!-- Gambar -->
                <div class="col-lg-5 text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('assets/img/about.png') }}" class="img-fluid rounded-4 border-0 w-75"
                            alt="Belajar Pemrograman">

                        <div
                            class="position-absolute top-0 start-0 bg-white px-2 py-1 rounded-3 text-start small shadow-sm">
                            <i class="bi bi-shield-check text-success"></i>
                            <strong>Full Garansi</strong><br>
                            Program bergaransi lolos
                        </div>

                        <div class="position-absolute bottom-0 end-0 bg-white p-2 rounded-3 text-start small shadow-sm">
                            <i class="bi bi-gift text-primary"></i>
                            <strong>Bonus Spesial</strong><br>
                            Bonus hingga 63jt fasilitas gratis
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection