@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Tambah Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                        <label class="form-label">Reservasi</label>
                        <select name="reservasi_id" class="form-control" required>

                        <option value="">-- Pilih Reservasi --</option>

                        @foreach($reservasis as $r)
                        <option value="{{ $r->id }}">
                        {{ $r->user->name }} - {{ $r->kursus->name }}
                        </option>
                        @endforeach

                        </select>
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="time" name="jam" class="form-control" required>
                        </div>

                        {{-- <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <input type="text" name="ruangan" class="form-control" required>
                        </div> --}}

                        <div class="mb-3">
                        <label class="form-label">Pertemuan</label>
                        <input type="number" name="pertemuan" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
