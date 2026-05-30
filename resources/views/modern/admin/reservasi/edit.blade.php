{{-- @extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-6 mx-auto">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Edit Reservasi</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reservasi.update', $reserv->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Kursus</label>
                                    <select name="name" class="form-control" required>
                                        <option value="Regular" {{ $paket->jenis == 'Regular' ? 'selected' : '' }}>Regular
                                        </option>
                                        @foreach (Helper::getData('roles') as $v)
                                            <option {{ isset($id) && $id == $v->id ? 'selected' : '' }}
                                                value="{{ $v->id }}">{{ $v->name }}
                                                {{ $v->role->nama ?? null }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select name="jenis" class="form-control" required>
                                        <option value="Regular" {{ $paket->jenis == 'Regular' ? 'selected' : '' }}>Regular
                                        </option>
                                        <option value="VIP" {{ $paket->jenis == 'VIP' ? 'selected' : '' }}>VIP</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}"
                                        required>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('paket.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection --}}
