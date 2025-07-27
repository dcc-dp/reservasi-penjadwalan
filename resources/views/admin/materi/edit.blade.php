@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Edit Materi') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="form-group">
                            <label for="Judul">Nama Materi</label>
                            <input type="text" class="form-control @error('Judul') is-invalid @enderror" id="Judul"
                                name="Judul" value="{{ $materi->Judul }}">
                            @error('Judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Materi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" name="deskripsi" value="{{ $materi->deskripsi }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="d-flex justify-content-end">
                            <a href="{{ route('materi') }}"
                                class="btn bg-secondary text-white mx-4 btn-md mt-4 mb-4">Batal</a>
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                        </div>
                    </form>

                    {{-- @if (session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif --}}


                </div>
            </div>
        </div>
    </div>
@endsection
