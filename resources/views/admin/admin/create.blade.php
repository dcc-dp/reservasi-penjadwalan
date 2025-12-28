@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Create admin') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <form action="{{ route('user.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama admin</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email admin</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password admin</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="role">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role"
                                    name="role" value="{{ old('role') }}">
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <option value="admin">Admin</option>
                                    <option value="admin">admin</option>
                                    <option value="instruktur">Instruktur</option>
                                </select>

                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="notelp">No Telepon admin</label>
                                <input type="text" class="form-control @error('notelp') is-invalid @enderror"
                                    id="notelp" name="notelp" value="{{ old('notelp') }}">
                                @error('notelp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control @error('jk') is-invalid @enderror" id="jk"
                                    name="jk" value="{{ old('jk') }}">
                                    @error('jk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>

                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.admin.index') }}"
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
