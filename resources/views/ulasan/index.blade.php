@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Daftar Ulasan</h2>

    {{-- Tampilkan notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form tambah ulasan --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Ulasan</div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf

                <label for="rating">Rating:</label>
                <select name="rating" id="rating" required class="form-control mb-2">
                    @for($i=1; $i<=5; $i++)
                        <option value="{{ $i }}">{{ $i }} ⭐</option>
                    @endfor
                </select>

                <label for="ulasan">Komentar:</label>
                <textarea name="ulasan" id="ulasan" class="form-control mb-2"></textarea>

                <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </form>
        </div>
    </div>

    {{-- Daftar ulasan --}}
    <div class="ulasan-list">
        @forelse($ulasan as $u)
            <div class="card mb-2">
                <div class="card-body">
                    <strong>{{ $u->user->name }}</strong> - {{ $u->rating }} ⭐
                    <p>{{ $u->ulasan }}</p>
                    <small class="text-muted">{{ $u->created_at->format('d M Y H:i') }}</small>
                </div>
            </div>
        @empty
            <p>Belum ada ulasan.</p>
        @endforelse
    </div>
</div>
@endsection

