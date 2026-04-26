@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">

```
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Tambah Kursus</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('kursus.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Kursus</label>
                            <input 
                                type="text"
                                name="name"
                                class="form-control"
                                required
                            >
                        </div>

                        <select name="id_instruktur" class="form-control" required>

                            <option value="" disabled selected>
                                -- Pilih Instruktur --
                            </option>

                            @foreach($instrukturList as $instruktur)
                                <option value="{{ $instruktur->id }}">
                                    {{ $instruktur->name }}
                                </option>
                            @endforeach

                        </select>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea 
                                name="deskripsi"
                                class="form-control"
                                rows="3"
                            ></textarea>
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-2">
                                Simpan
                            </button>

                            <a href="{{ route('kursus.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
```

</main>

@endsection
