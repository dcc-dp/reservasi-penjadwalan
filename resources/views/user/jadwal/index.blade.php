@extends('layouts.siswa.siswa')
@section('title', 'Jadwal')

@section('content')

<div class="container-fluid py-4">

```
{{-- HEADER --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-lg" style="background:#1F6F6D;">
            <div class="card-body text-white">
                <h4 class="mb-1 fw-bold">Jadwal Kursus</h4>
                <p class="mb-0 opacity-8">Lihat jadwal belajar kamu di sini</p>
            </div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr class="text-center text-secondary text-xs font-weight-bold">
                                <th>Kursus</th>
                                <th>Instruktur</th>
                                <th>Jadwal Belajar</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($reservasiList as $reservasi)
                            <tr class="text-center">

                                {{-- Kursus --}}
                                <td>
                                    {{ $reservasi->kursus->name ?? '-' }}
                                </td>

                                {{-- Instruktur --}}
                                <td>
                                    {{ $reservasi->kursus?->instruktur?->name ?? '-' }}
                                </td>

                                {{-- Jadwal --}}
                                <td class="text-start">
                                    @if($reservasi->jadwal && $reservasi->jadwal->count())

                                        @foreach ($reservasi->jadwal as $jadwal)
                                        <div class="border rounded p-2 mb-2 bg-light">

                                            <strong>
                                                {{ $jadwal->hari }} -
                                                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">
                                                Pertemuan {{ $jadwal->pertemuan }}
                                            </small>

                                            <br>

                                            <small>
                                                Ruangan :
                                                {{ $jadwal->ruangan ?? '-' }}
                                            </small>

                                        </div>
                                        @endforeach

                                    @else
                                        <span class="text-muted">
                                            Belum ditentukan
                                        </span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>
                                    @php
                                        $status = $reservasi->pembayaran?->status ?? 'belum';
                                    @endphp

                                    @if ($status === 'selesai')
                                        <span class="badge bg-success">Aktif</span>

                                    @elseif ($status === 'proses')
                                        <span class="badge bg-warning text-dark">Menunggu</span>

                                    @else
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    Belum ada jadwal kursus.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
```

</div>
@endsection
