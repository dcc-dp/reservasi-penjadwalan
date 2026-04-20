@extends('layouts.siswa.siswa')

@section('title','Reservasi Kursus')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card reservasi-form-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <h3 class="reservasi-form-title mb-2">Reservasi Kursus</h3>
                    <p class="reservasi-form-subtitle mb-0">
                        Pilih kursus, paket, jadwal belajar, dan tempat belajar kamu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- FORM --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card reservasi-form-card">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('siswa.reservasi.store') }}" method="POST">
                        @csrf

                        {{-- PILIH KURSUS --}}
                        <div class="mb-4">
                            <label class="form-label reservasi-label">
                                <i class="fas fa-book me-2 text-primary"></i>
                                Kursus
                            </label>

                            <select
                                name="id_kursus"
                                id="kursusSelect"
                                class="form-select reservasi-input"
                                required
                            >
                                <option value="" disabled selected>Pilih kursus</option>

                                @foreach ($kursusList as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- PILIH PAKET --}}
                        <div class="mb-4">
                            <label class="form-label reservasi-label">
                                <i class="fas fa-layer-group me-2 text-primary"></i>
                                Paket Kursus
                            </label>

                            <select
                                name="id_paket"
                                id="paketSelect"
                                class="form-select reservasi-input"
                                required
                            >
                                <option value="" disabled selected>Pilih paket</option>

                                @foreach ($paketList as $p)
                                    <option
                                        value="{{ $p->id }}"
                                        data-harga="{{ $p->harga }}"
                                        data-kursus="{{ $p->kursus_id }}"
                                    >
                                        {{ $p->jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- HARGA --}}
                        <div class="mb-4">
                            <label class="form-label reservasi-label">
                                <i class="fas fa-money-bill-wave me-2 text-primary"></i>
                                Harga
                            </label>

                            <div id="hargaText" class="reservasi-price-box">
                                Pilih paket terlebih dahulu
                            </div>
                        </div>

                        {{-- JADWAL --}}
                        <div class="jadwal-block mb-4">
                            <h5 class="jadwal-block-title mb-3">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Pilih Jadwal Belajar
                            </h5>

                            {{-- JADWAL 1 --}}
                            <div class="jadwal-item-box mb-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Hari Pertama</label>
                                        <input
                                            type="date"
                                            name="jadwal[0][hari]"
                                            class="form-control reservasi-input"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Jam</label>
                                        <input
                                            type="time"
                                            name="jadwal[0][jam]"
                                            class="form-control reservasi-input"
                                            required
                                        >
                                    </div>
                                </div>
                            </div>

                            {{-- JADWAL 2 --}}
                            <div class="jadwal-item-box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Hari Kedua (Opsional)</label>
                                        <input
                                            type="date"
                                            name="jadwal[1][hari]"
                                            class="form-control reservasi-input"
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Jam</label>
                                        <input
                                            type="time"
                                            name="jadwal[1][jam]"
                                            class="form-control reservasi-input"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TEMPAT BELAJAR --}}
                        <div class="mb-4">
                            <label class="form-label reservasi-label">
                                <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                Tempat Belajar
                            </label>

                            <select name="ruangan" class="form-select reservasi-input" required>
                                <option value="">Pilih Tempat</option>
                                <option value="Online">Online</option>
                                <option value="DCC Lab">DCC Lab</option>
                                <option value="Rumah Siswa">Rumah Siswa</option>
                            </select>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg reservasi-submit-btn">
                                <i class="fas fa-paper-plane me-2"></i>
                                Kirim Reservasi
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ url()->previous() }}" class="reservasi-back-link">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
const kursusSelect = document.getElementById('kursusSelect');
const paketSelect  = document.getElementById('paketSelect');
const hargaText    = document.getElementById('hargaText');

kursusSelect.addEventListener('change', function () {
    let kursusID = this.value;

    Array.from(paketSelect.options).forEach(option => {
        if (!option.value) return;

        if (option.dataset.kursus == kursusID) {
            option.hidden = false;
        } else {
            option.hidden = true;
        }
    });

    paketSelect.value = '';
    hargaText.innerHTML = 'Pilih paket terlebih dahulu';
});

paketSelect.addEventListener('change', function () {
    let harga = this.options[this.selectedIndex].dataset.harga;

    if (!harga) {
        hargaText.innerHTML = 'Pilih paket terlebih dahulu';
        return;
    }

    let format = new Intl.NumberFormat('id-ID').format(harga);
    hargaText.innerHTML = 'Rp ' + format;
});
</script>

@endsection