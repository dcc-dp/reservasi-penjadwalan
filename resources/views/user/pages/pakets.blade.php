@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')

    <section class="pricing-section pt-150 pb-120 bg-light">
        <div class="container">

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
                @forelse ($pakets as $p)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-pricing text-center p-4 bg-white shadow-sm h-100 rounded">

                            <div class="mb-3">
                                @php
                                    $kursusName = $p->kursus?->name ?? '';
                                @endphp
                                @if (str_contains(strtolower($kursusName), 'database'))
                                    <i class="lni lni-database text-primary" style="font-size:48px;"></i>
                                @else
                                    <i class="lni lni-code-alt text-primary" style="font-size:48px;"></i>
                                @endif
                            </div>

                            <h3 class="fw-bold mb-1">
                                {{ $p->kursus?->name ?? 'Kursus' }}
                            </h3>

                            <span class="badge bg-primary mb-3">{{ $p->jenis }}</span>

                            <h2 class="fw-bold mb-4">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </h2>

                            @if ($p->kursus?->deskripsi)
                                <p class="mb-4 text-muted">
                                    {{ \Illuminate\Support\Str::limit($p->kursus->deskripsi, 120) }}
                                </p>
                            @endif

                            <a href="{{ route('siswa.form-pendaftaran', ['paket_id' => $p->id]) }}"
                                class="main-btn btn-hover w-100">
                                Daftar Sekarang
                            </a>

                        </div>
                    </div>
                @empty
                    <div class="col-lg-8 text-center">
                        <div class="single-pricing p-5 bg-white shadow-sm rounded">
                            <i class="lni lni-package text-muted mb-3" style="font-size:48px;"></i>
                            <h4 class="mb-2">Belum Ada Paket Tersedia</h4>
                            <p class="text-muted mb-0">
                                Paket kursus akan ditampilkan di sini setelah ditambahkan melalui panel admin.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
