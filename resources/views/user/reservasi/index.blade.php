@extends('layouts.siswa.siswa')
@section('title', 'Reservasi')

@section('content')

<div class="container-fluid py-4">

```
{{-- Table --}}
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header pb-0">
                <h6 class="mb-0">Data Reservasi</h6>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                <th>Kursus</th>
                                <th>Jadwal</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($reservasiList as $item)
                            <tr class="text-center">

                                {{-- Kursus --}}
                                <td>
                                    <h6 class="mb-0 text-sm">
                                        {{ $item->kursus->name ?? '-' }}
                                    </h6>
                                </td>

                                {{-- Jadwal --}}
                                <td>
                                    @if($item->jadwal && $item->jadwal->count())
                                        @foreach($item->jadwal as $jadwal)
                                            <div class="text-sm mb-1">
                                                <strong>{{ $jadwal->hari }}</strong> -
                                                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                                                <br>
                                                <small class="text-muted">
                                                    Pertemuan {{ $jadwal->pertemuan }}
                                                </small>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Belum ada jadwal</span>
                                    @endif
                                </td>

                                {{-- Status Pembayaran --}}
                                <td>
                                    @if(!$item->pembayaran)
                                        <span class="badge bg-secondary">
                                            Belum Ada Data
                                        </span>

                                    @elseif($item->pembayaran->status == 'proses')
                                        <span class="badge bg-warning text-dark">
                                            Menunggu Konfirmasi
                                        </span>

                                    @elseif($item->pembayaran->status == 'selesai')
                                        <span class="badge bg-success">
                                            Lunas
                                        </span>

                                    @elseif($item->pembayaran->status == 'gagal')
                                        <span class="badge bg-danger">
                                            Gagal
                                        </span>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    Belum ada reservasi
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
