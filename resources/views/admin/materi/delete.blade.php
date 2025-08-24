@extends('layouts.user_type.auth')

@section('content')
        <div class="modal fade" id="Hapusdata{{ $materi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Materi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('materi.destroy',$materi->id) }}" method="POST">@csrf @method('DELETE')
                   
                    <h4 class="text-primary text-center">Ingin menghapus materi {{ $materi->Judul }} ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection
