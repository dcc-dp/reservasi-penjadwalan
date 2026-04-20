@extends('layouts.siswa.siswa')
@section('title', 'Bayar')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-3">Pembayaran Kursus</h4>

            <p><strong>Kursus:</strong> {{ $pembayaran->reservasi?->kursus?->name ?? '-' }}</p>
            <p><strong>Paket:</strong> {{ $pembayaran->reservasi?->paket?->jenis ?? '-' }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($pembayaran->total ?? 0, 0, ',', '.') }}</p>

            <p>
                <strong>Status:</strong>
                @if(in_array($pembayaran->status, ['settlement', 'capture']))
                    <span class="badge bg-success">Lunas</span>
                @elseif($pembayaran->status == 'pending')
                    <span class="badge bg-warning text-dark">Menunggu</span>
                @elseif($pembayaran->status == 'expire')
                    <span class="badge bg-secondary">Kedaluwarsa</span>
                @else
                    <span class="badge bg-danger">Gagal</span>
                @endif
            </p>

            @if(!in_array($pembayaran->status, ['settlement', 'capture']))
                <button id="pay-button" class="btn btn-primary">
                    Bayar Sekarang
                </button>
            @else
                <button class="btn btn-success" disabled>
                    Sudah Dibayar
                </button>
            @endif

        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

@if($pembayaran->snap_token && !in_array($pembayaran->status, ['settlement', 'capture']))
<script>
document.getElementById('pay-button').onclick = function () {
    window.snap.pay('{{ $pembayaran->snap_token }}', {
        onSuccess: function(result) {
            alert("Pembayaran berhasil");
            window.location.href = "{{ route('siswa.pembayaran') }}";
        },
        onPending: function(result) {
            alert("Menunggu pembayaran");
            window.location.href = "{{ route('siswa.pembayaran') }}";
        },
        onError: function(result) {
            alert("Pembayaran gagal");
        },
        onClose: function() {
            alert("Kamu menutup popup");
        }
    });
};
</script>
@elseif(!in_array($pembayaran->status, ['settlement', 'capture']))
<script>
document.getElementById('pay-button').onclick = function () {
    alert("Snap token belum tersedia.");
};
</script>
@endif
@endsection