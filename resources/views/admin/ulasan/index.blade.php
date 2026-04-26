@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header pb-0">
            <h5 class="mb-0">Data Ulasan Siswa</h5>
        </div>

        <div class="card-body px-0 pt-3 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kursus</th>
                            <th>Rating</th>
                            <th>Ulasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($ulasans as $index => $ulasan)
                            <tr class="text-center align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ulasan->user->name ?? '-' }}</td>
                                <td>{{ $ulasan->kursus->name ?? '-' }}</td>
                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $ulasan->rating)
                                            ⭐
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </td>
                                <td style="max-width: 300px; white-space: normal;">
                                    {{ $ulasan->ulasan ?? '-' }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus ulasan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada ulasan.
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