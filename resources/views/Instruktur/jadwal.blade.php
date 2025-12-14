@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">

        <h5 class="mb-4">Jadwal Saya</h5>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Kursus</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Ruangan</th>
                                <th>Pertemuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwals as $index => $jadwal)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $jadwal->kursus->name ?? '-' }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="text-center">{{ date('H:i', strtotime($jadwal->jam)) }}</td>
                                    <td class="text-center">{{ $jadwal->ruangan }}</td>
                                    <td class="text-center">{{ $jadwal->pertemuan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        Belum ada jadwal yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
