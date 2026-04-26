@extends('layouts.instruktur.instruktur')

@section('title','Profil Saya')

@section('content')
<div class="container-fluid py-4">

    <div class="card instruktur-profile-hero border-0 shadow-lg mb-4">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <div class="instruktur-profile-avatar">
                    @if(auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Foto Profil">
                    @else
                        {{ strtoupper(substr(auth()->user()->name ?? 'I', 0, 1)) }}
                    @endif
                </div>

                <div>
                    <span class="instruktur-hero-badge mb-2">Profil Instruktur</span>
                    <h3 class="instruktur-hero-title mb-1">
                        {{ auth()->user()->name ?? 'Instruktur' }}
                    </h3>
                    <p class="instruktur-hero-subtitle mb-0">
                        Kelola data profil dan informasi akun instruktur.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card instruktur-panel-card border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="instruktur-profile-photo mx-auto mb-3">
                        @if(auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Foto Profil">
                        @else
                            {{ strtoupper(substr(auth()->user()->name ?? 'I', 0, 1)) }}
                        @endif
                    </div>

                    <h5 class="fw-bold mb-1">{{ auth()->user()->name }}</h5>
                    <span class="badge badge-instruktur mb-3">Instruktur</span>

                    <div class="instruktur-profile-info">
                        <div>
                            <small>Email</small>
                            <strong>{{ auth()->user()->email ?? '-' }}</strong>
                        </div>
                        <div>
                            <small>No Telp</small>
                            <strong>{{ auth()->user()->notelp ?? '-' }}</strong>
                        </div>
                        <div>
                            <small>Alamat</small>
                            <strong>{{ auth()->user()->alamat ?? '-' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card instruktur-panel-card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="mb-0">Edit Profil</h5>
                    <p class="text-muted text-sm mb-0">
                        Perbarui informasi pribadi kamu.
                    </p>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('instruktur.profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', auth()->user()->name) }}"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       class="form-control"
                                       value="{{ auth()->user()->email }}"
                                       readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="text"
                                       name="notelp"
                                       class="form-control"
                                       value="{{ old('notelp', auth()->user()->notelp) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Profil</label>
                                <input type="file"
                                       name="photo"
                                       class="form-control"
                                       accept="image/*">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat"
                                          class="form-control"
                                          rows="4">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-instruktur px-4">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection