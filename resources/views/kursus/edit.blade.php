@extends('layouts.user_type.auth')

@section('content')

<div class="container mt-5">

    <h2>Edit Kursus</h2>

    <form action="{{ route('kursus.update', $kursus->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Kursus</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $kursus->name) }}" required>

        </div>


        <div class="mb-3">

            <label class="form-label">Instruktur</label>

            <select name="id_instruktur" class="form-control" required>

                @foreach($instrukturList as $instruktur)

                    <option 
                        value="{{ $instruktur->id }}"
                        {{ old('id_instruktur', $kursus->id_instruktur) == $instruktur->id ? 'selected' : '' }}
                    >
                        {{ $instruktur->name }}
                    </option>

                @endforeach

            </select>

        </div>
        <div class="mb-3">

            <label class="form-label">Deskripsi</label>

            <textarea 
                name="deskripsi"
                class="form-control"
                rows="3"
            >{{ old('deskripsi', $kursus->deskripsi) }}</textarea>

        </div>


        <button type="submit" class="btn btn-success">
            Update
        </button>

        <a href="{{ route('kursus.index') }}" class="btn btn-secondary">
            Batal
        </a>

    </form>

</div>

@endsection