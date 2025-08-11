@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2>Tambah Kursus</h2>

    <form action="{{ route('kursus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kursus</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Instruktur</label>
            <select name="id_instruktur" class="form-control" required>
                @foreach($instrukturs as $instruktur)
                    <option value="{{ $instruktur->id }}">{{ $instruktur->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Paket</label>
            <select name="id_paket" class="form-control" required>
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->materi->Judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kursus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
