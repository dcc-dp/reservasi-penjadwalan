@extends('layouts.user_type.auth')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pembayaran</h1>
        </div>

        <div class="section-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light text-center">
                            <tr>
                                <th>#</th>
                                <th>Reservasi</th>
                                <th>Metode Bayar</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembayarans as $index => $pembayaran)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pembayaran->reservasi->kode_reservasi ?? '-' }}</td>
                                <td>{{ $pembayaran->metode_bayar }}</td>
                                <td>Rp {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                                <td>{{ ucfirst($pembayaran->status) }}</td>
                                <td>
                                    <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus pembayaran ini?')" class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data pembayaran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
