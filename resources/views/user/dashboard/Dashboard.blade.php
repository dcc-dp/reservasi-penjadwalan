@extends('layouts.siswa.siswa')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg,#1F6F6D,#2c8f8b);">
                <div class="card-body text-white">
                    <h4 class="mb-1 fw-bold">
                        Halo, {{ auth()->user()->name }} 👋
                    </h4>
                    <p class="opacity-8 mb-0">
                        Selamat datang di dashboard kursusmu
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Total Kursus</p>
                        <h3 class="fw-bold mb-0">{{ $totalReservasi }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Kursus Aktif</p>
                        <h3 class="fw-bold mb-0">{{ $aktif }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-sm text-muted mb-1">Menunggu Pembayaran</p>
                        <h3 class="fw-bold mb-0">{{ $menunggu }}</h3>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-book me-2"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- TOMBOL RESERVASI --}}
    @if($totalReservasi == 0)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Mulai Kursus Kamu 🚀</h5>
                        <p class="text-muted mb-0">
                            Kamu belum memiliki kursus aktif. Silakan lakukan reservasi untuk memulai belajar.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('siswa.reservasi.create') }}" 
                        class="btn btn-primary btn-lg shadow-sm"
                        style="background: linear-gradient(135deg,#1F6F6D,#2c8f8b);">
                          <i class="fas fa-plus me-2"></i> Reservasi Kursus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- QUICK ACTION --}}
    <div class="row mt-4">

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.reservasi.create') }}" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">➕ Daftar Kursus</h5>
                    <p class="text-sm text-muted mb-0">
                        Pilih kursus baru dan mulai belajar.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('siswa.jadwal') }}" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">📅 Lihat Jadwal</h5>
                    <p class="text-sm text-muted mb-0">
                        Cek jadwal belajar kamu.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="#" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h5 class="mb-2">💳 Pembayaran</h5>
                    <p class="text-sm text-muted mb-0">
                        Lihat status pembayaran.
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>


{{-- MODAL RESERVASI --}}
@if($totalReservasi == 0)
<div class="modal fade" id="modalReservasi" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-body p-5 text-center">

        {{-- ICON --}}
        <div class="mb-4">
            <div style="
                width:50px;
                height:50px;
                background:linear-gradient(135deg,#1F6F6D,#2c8f8b);
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                margin:auto;
                box-shadow:0 10px 25px rgba(0,0,0,0.15);
            ">
                <i class="fas fa-graduation-cap text-white" style="font-size:40px;"></i>
            </div>
        </div>

        {{-- TITLE --}}
        <h3 class="fw-bold mb-2">
            Mulai Perjalanan Belajarmu 🚀
        </h3>

        {{-- DESC --}}
        <p class="text-muted mb-4" style="max-width:450px;margin:auto;">
            Kamu belum memiliki kursus aktif.  
            Pilih kursus yang ingin kamu pelajari dan mulai perjalanan belajar bersama kami.
        </p>

        {{-- BENEFIT LIST --}}
        <div class="mb-4 text-start" style="max-width:350px;margin:auto;">
            <p class="mb-2"><i class="fas fa-check text-success me-2"></i> Mentor berpengalaman</p>
            <p class="mb-2"><i class="fas fa-check text-success me-2"></i> Jadwal fleksibel</p>
            <p class="mb-0"><i class="fas fa-check text-success me-2"></i> Materi praktis & terstruktur</p>
        </div>

        {{-- BUTTON --}}
        <div class="mt-4">

            <a href="{{ route('siswa.reservasi.create') }}"
               class="btn btn-lg px-4 text-white"
               style="background:linear-gradient(135deg,#1F6F6D,#2c8f8b); border:none;">

               🚀 Mulai Reservasi Kursus
            </a>

        </div>

        {{-- CLOSE --}}
        <div class="mt-3">
            <button class="btn btn-link text-muted" data-bs-dismiss="modal">
                Nanti saja
            </button>
        </div>

      </div>

    </div>
  </div>
</div>
@endif

@endsection


@if($totalReservasi == 0)
<script>
document.addEventListener("DOMContentLoaded", function(){
    var reservasiModal = new bootstrap.Modal(document.getElementById('modalReservasi'));
    reservasiModal.show();
});
</script>
@endif