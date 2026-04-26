@extends('layouts.siswa.siswa')
@section('title', 'Profil')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card profile-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <h3 class="fw-bold mb-2">Profil Saya</h3>
                    <p class="mb-0 opacity-8">
                        Lihat dan perbarui informasi akun kamu di sini.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        {{-- KIRI --}}
        <div class="col-lg-4 mb-4">
            <div class="card profile-card h-100">
                <div class="card-body text-center p-4">

                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}"
                             style="width:90px;height:90px;border-radius:24px;object-fit:cover;"
                             class="mb-3">
                    @else
                        <div class="avatar-box">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif

                    <h4 class="profile-name">{{ $user->name }}</h4>
                    <p class="profile-role">Siswa Aktif</p>

                    <span class="badge-soft-primary">
                        Akun Terdaftar
                    </span>

                </div>
            </div>
        </div>

        {{-- KANAN --}}
        <div class="col-lg-8">
            <div class="card profile-card">
                <div class="card-body p-4 p-md-5">

                    <h5 class="profile-section-title">Informasi Akun</h5>

                    <form action="{{ route('siswa.profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Profil</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="info-box">
                            <div class="info-label">Nama</div>
                            <input type="text" name="name" class="form-control mt-1"
                                   value="{{ $user->name }}">
                        </div>

                        <div class="info-box">
                            <div class="info-label">Email</div>
                            <input type="email" name="email" class="form-control mt-1"
                                   value="{{ $user->email }}">
                        </div>

                        <div class="info-box">
                            <div class="info-label">Role</div>
                            <div class="info-value">
                                {{ ucfirst($user->role) }}
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">Bergabung</div>
                            <div class="info-value">
                                {{ $user->created_at->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <button class="btn btn-primary mt-3">
                            Simpan Perubahan
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection