@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Kursus</h5>

            <a href="{{ route('kursus.create') }}" class="btn btn-primary btn-sm mb-0">
                <i class="fas fa-plus me-1"></i> Tambah Kursus
            </a>
        </div>

        <div class="card-body px-0 pt-3 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kursus</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Instruktur</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paket</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kursusList as $index => $kursus)
                            <tr class="text-center align-middle">
                                <td>
                                    <span class="text-sm font-weight-bold">
                                        {{ $index + 1 }}
                                    </span>
                                </td>

                                <td>
                                    <span class="text-sm font-weight-bold">
                                        {{ $kursus->name }}
                                    </span>
                                </td>

                                <td>
                                    <span class="text-sm">
                                        {{ $kursus->instruktur->name ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    @forelse($kursus->pakets as $paket)
                                        <span class="badge bg-success me-1">
                                            {{ $paket->jenis }}
                                        </span>

                                        <span class="badge bg-info text-dark me-1">
                                            Rp{{ number_format($paket->harga, 0, ',', '.') }}
                                        </span>
                                        <br>
                                    @empty
                                        <span class="text-muted text-sm">
                                            Belum ada paket
                                        </span>
                                    @endforelse
                                </td>

                                <td style="max-width: 250px; white-space: normal;">
                                    <span class="text-sm">
                                        {{ $kursus->deskripsi ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('kursus.edit', $kursus->id) }}"
                                       class="btn btn-warning btn-sm mb-0">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('kursus.destroy', $kursus->id) }}"
                                          method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus kursus ini?')"
                                                class="btn btn-danger btn-sm mb-0">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada kursus yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>
@endsection