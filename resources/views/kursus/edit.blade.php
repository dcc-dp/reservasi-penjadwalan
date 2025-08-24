@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Kursus</h2>

    <form action="{{ route('kursus.update', $kursus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kursus</label>
            <input type="text" name="nama" class="form-control" value="{{ $kursus->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Instruktur</label>
            <select name="id_instruktur" class="form-control" required>
                @foreach($instrukturs as $instruktur)
                    <option value="{{ $instruktur->id }}" {{ $kursus->id_instruktur == $instruktur->id ? 'selected' : '' }}>
                        {{ $instruktur->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Paket</label>
            <select name="id_paket" class="form-control" required>
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}" {{ $kursus->id_paket == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_paket }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kursus->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kursus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
