@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Daftar Pembayaran</h4>
                </div>

                <div class="card-body px-0 pt-3 pb-2">

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-bordered table-hover">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Reservasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transaction ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembayarans as $index => $pembayaran)
                                <tr class="text-center align-middle">
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayarans->firstItem() + $index }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->reservasi_id ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->order_id ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->transaction_id ?? '-' }}
                                        </span>
                                    </td>
                                    {{-- <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->metode_bayar ?? '-' }}
                                        </span>
                                    </td> --}}
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->payment_type ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            Rp {{ number_format($pembayaran->total ?? 0, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if (in_array($pembayaran->status, ['settlement', 'capture']))
                                            <span class="badge badge-sm bg-gradient-success">
                                                {{ ucfirst($pembayaran->status) }}
                                            </span>
                                        @elseif ($pembayaran->status == 'pending')
                                            <span class="badge badge-sm bg-gradient-warning">
                                                {{ ucfirst($pembayaran->status) }}
                                            </span>
                                        @elseif (in_array($pembayaran->status, ['expire', 'cancel', 'deny', 'failure']))
                                            <span class="badge badge-sm bg-gradient-danger">
                                                {{ ucfirst($pembayaran->status) }}
                                            </span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-secondary">
                                                {{ $pembayaran->status ?? '-' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">
                                            {{ $pembayaran->paid_at ? \Carbon\Carbon::parse($pembayaran->paid_at)->format('d-m-Y H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin hapus pembayaran ini?')" class="btn btn-danger btn-sm mb-0">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted py-4">
                                        Belum ada data pembayaran.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="px-4 mt-3">
                        {{ $pembayarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection