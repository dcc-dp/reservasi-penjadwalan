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
                @foreach ($pakets as $p)
                    <div class="col-lg-4 col-md-6">

                        <div class="single-pricing text-center p-4 bg-white shadow-sm h-100">

                            {{-- Icon --}}
                            <div class="mb-3">
                                @if ($p->kursus->name == 'Database')
                                    <i class="lni lni-database text-primary" style="font-size:48px;"></i>
                                @else
                                    <i class="lni lni-code-alt text-primary" style="font-size:48px;"></i>
                                @endif
                            </div>

                            {{-- Nama Kursus --}}
                            <h3 class="fw-bold mb-1">
                                {{ $p->kursus->name }}
                            </h3>

                            {{-- Jenis Paket --}}
                            <p class="text-primary fw-semibold mb-3">
                                {{ $p->jenis }}
                            </p>

                            {{-- Harga Awal --}}
                            @if (!empty($p->harga_awal) && $p->harga_awal > $p->harga)
                                <div class="text-danger text-decoration-line-through mb-1">
                                    Rp {{ number_format($p->harga_awal, 0, ',', '.') }}
                                </div>
                            @endif

                            {{-- Harga --}}
                            <h2 class="fw-bold mb-4">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </h2>

                            <div class="mb-4 text-muted">
                                {{ \Illuminate\Support\Str::limit($p->kursus->deskripsi, 120) }}
                            </div>
                            

                           

                            {{-- Tombol --}}
                            <a href="{{ route('siswa.form-pendaftaran', ['paket_id' => $p->id]) }}"
                                class="btn btn-primary w-100">
                                Daftar Sekarang
                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
