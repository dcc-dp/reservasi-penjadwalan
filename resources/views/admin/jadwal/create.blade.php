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
                        {{-- <form action="{{ route('jadwal.store') }}" method="POST"> --}}
                            @csrf

                            <div class="mb-3">
                                <label for="id_user" class="form-label">User</label>
                                <select name="id_user" id="user_id" class="form-control" required>
                                    <option value="">-- Pilih User --</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}" {{ old('id_user') == $u->id ? 'selected' : '' }}>
                                            {{ $u->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kursus_id" class="form-label">Kursus</label>
                                <select name="id_kursus" id="id_kursus" class="form-control" required>
                                    <option value="">-- Pilih Kursus --</option>
                                    @foreach($kursuses as $k)
                                        <option value="{{ $k->id }}" {{ old('id_kursus') == $k->id ? 'selected' : '' }}>
                                            {{ $k->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    value="{{ old('tanggal') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control"
                                    value="{{ old('jam') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="ruangan" class="form-label">Ruangan</label>
                                <input type="text" name="ruangan" id="ruangan" class="form-control"
                                    value="{{ old('ruangan') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pertemuan" class="form-label">Pertemuan</label>
                                <input type="number" name="pertemuan" id="pertemuan" class="form-control"
                                    value="{{ old('pertemuan') }}" required>
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
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
