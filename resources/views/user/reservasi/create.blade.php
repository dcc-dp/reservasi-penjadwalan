@extends('layouts.siswa.siswa')

@section('title','Reservasi Kursus')

@section('content')

<div class="container py-5 hero-header">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-white border-0 text-center pt-4">

                    <h3 class="fw-bold text-success">
                        📚 Reservasi Kursus
                    </h3>

                    <p class="text-muted mb-0">
                        Pilih kursus dan jadwal belajar kamu
                    </p>

                </div>


                <div class="card-body px-4 pb-4">

                    <form action="{{ route('siswa.reservasi.store') }}" method="POST">
                        @csrf


                        {{-- PILIH KURSUS --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                <i class="fas fa-book me-2 text-success"></i>
                                Kursus
                            </label>

                            <select
                                name="id_kursus"
                                id="kursusSelect"
                                class="form-select form-select-lg"
                                required
                            >

                                <option value="" disabled selected>
                                    Pilih kursus
                                </option>

                                @foreach ($kursusList as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>


                        {{-- PILIH PAKET --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                <i class="fas fa-layer-group me-2 text-success"></i>
                                Paket Kursus
                            </label>

                            <select
                                name="id_paket"
                                id="paketSelect"
                                class="form-select form-select-lg"
                                required
                            >

                                <option value="" disabled selected>
                                    Pilih paket
                                </option>

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

                            <label class="form-label fw-semibold">
                                <i class="fas fa-money-bill-wave me-2 text-success"></i>
                                Harga
                            </label>

                            <div
                                id="hargaText"
                                class="form-control bg-success text-white fw-bold text-center py-3"
                            >

                                Pilih paket terlebih dahulu

                            </div>

                        </div>



                        {{-- JADWAL --}}
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Pilih Jadwal Belajar
                        </h6>


                        {{-- JADWAL 1 --}}
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Hari Pertama
                                </label>

                                <input
                                    type="date"
                                    name="jadwal[0][hari]"
                                    class="form-control"
                                    required
                                >

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Jam
                                </label>

                                <input
                                    type="time"
                                    name="jadwal[0][jam]"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>



                        {{-- JADWAL 2 --}}
                        <div class="row g-3 mb-4">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Hari Kedua (Opsional)
                                </label>

                                <input
                                    type="date"
                                    name="jadwal[1][hari]"
                                    class="form-control"
                                >

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Jam
                                </label>

                                <input
                                    type="time"
                                    name="jadwal[1][jam]"
                                    class="form-control"
                                >

                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Tempat Belajar
                            </label>

                            <select name="ruangan" class="form-select" required>
                                <option value="">Pilih Tempat</option>
                                <option value="Online">Online</option>
                                <option value="DCC Lab">DCC Lab</option>
                                <option value="Rumah Siswa">Rumah Siswa</option>
                            </select>
                        </div>



                        {{-- BUTTON --}}
                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-success btn-lg rounded-pill"
                            >
                                🚀 Kirim Reservasi
                            </button>

                        </div>



                        <div class="text-center mt-3">

                            <a href="{{ url()->previous() }}" class="text-muted">
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


// filter paket
kursusSelect.addEventListener('change', function(){

let kursusID = this.value;

Array.from(paketSelect.options).forEach(option => {

if(option.dataset.kursus == kursusID){

option.style.display = 'block';

}else{

option.style.display = 'none';

}

});

paketSelect.value = '';
hargaText.innerHTML = 'Pilih paket terlebih dahulu';

});


// tampilkan harga
paketSelect.addEventListener('change', function(){

let harga = this.options[this.selectedIndex].dataset.harga;

let format = new Intl.NumberFormat('id-ID').format(harga);

hargaText.innerHTML = 'Rp ' + format;

});

</script>

@endsection