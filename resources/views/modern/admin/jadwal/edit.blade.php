@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kursus.jadwal.update', $jadwal->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="reservasi_id" value="{{ $jadwal->reservasi_id }}">
                            <div class="mb-3">
                                <label class="form-label">User</label>
                                <input type="text" class="form-control"
                                value="{{ $jadwal->reservasi->user->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kursus</label>
                                <input type="text" class="form-control"
                                value="{{ $jadwal->reservasi->kursus->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    value="{{ old('tanggal', $jadwal->tanggal) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control"
                                    value="{{ old('jam', date('H:i', strtotime($jadwal->jam))) }}" required>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="ruangan" class="form-label">Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" class="form-control"
                                    value="{{ old('ruangan', $jadwal->ruangan) }}" required>
                            </div> --}}

                            <div class="mb-3">
                                <label for="pertemuan" class="form-label">Pertemuan</label>
                                <input type="number" name="pertemuan" id="pertemuan" class="form-control"
                                    value="{{ old('pertemuan', $jadwal->pertemuan) }}" required>
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-success me-2">Update</button>
                                <a href="{{ route('kursus.jadwal') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
