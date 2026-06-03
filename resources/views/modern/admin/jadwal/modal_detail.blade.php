<div class="modal-header border-bottom">
    <h6 class="modal-title">
        <i class="fas fa-calendar-alt me-2 text-primary"></i>
        Detail Jadwal
    </h6>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    <div class="row mb-3 text-sm text-center">
        <div class="col">
            <span class="text-muted">Nama</span>
            <div class="fw-bold">{{ $reservasi->user->name }}</div>
        </div>

        <div class="col">
            <span class="text-muted">Kursus</span>
            <div class="fw-bold">{{ $reservasi->kursus->name }}</div>
        </div>

        <div class="col">
            <span class="text-muted">Total Pertemuan</span>
            <div class="fw-bold">{{ $reservasi->jadwal->count() }}</div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead class="bg-gray-100">
                <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($reservasi->jadwal as $j)
                <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                    <td class="fw-bold">{{ $j->pertemuan }}</td>

                    <td>{{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}</td>

                    <td class="text-secondary">{{ $j->hari }}</td>

                    <td>{{ $j->jam }}</td>

                    <td>{{ $j->ruangan ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

<div class="modal-footer border-top">
    <button class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
        Tutup
    </button>
</div>