@extends('layouts.user_type.auth')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pembayaran</h1>
        </div>

        <div class="section-body">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Reservasi</label>
                            <input type="number" name="reservasi_id" class="form-control" value="{{ old('reservasi_id', $pembayaran->reservasi_id) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Metode Bayar</label>
                            <input type="text" name="metode_bayar" class="form-control" value="{{ old('metode_bayar', $pembayaran->metode_bayar) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" name="total" class="form-control" value="{{ old('total', $pembayaran->total) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="proses" {{ $pembayaran->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $pembayaran->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="gagal" {{ $pembayaran->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
