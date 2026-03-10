<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;

use App\Models\Paket;
use App\Models\Materi;
use App\Models\Pembayaran;
use App\Models\Jadwal;
use App\Models\Kursus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiSiswaController extends Controller
{
    public function index()
    {
        $reservasiList = Reservasi::where('id_user', Auth::id())
            ->with(['kursus','jadwal','pembayaran'])
            ->get();

        return view('user.reservasi.index', compact('reservasiList'));
    }
    
    public function create()
    {
        $kursusList = Kursus::with('pakets')->get();
        $paketList = Paket::with('kursus')->get();

        return view('user.reservasi.create', compact('kursusList', 'paketList'));
    }
    public function store(Request $request)
{
    $request->validate([
        'id_kursus' => 'required|exists:kursuses,id',
        'id_paket'  => 'required|exists:pakets,id',
        'jadwal.*.hari' => 'required|date',
        'jadwal.*.jam' => 'required'
    ]);

    $paket = Paket::findOrFail($request->id_paket);

    // Simpan reservasi
    $reservasi = Reservasi::create([
        'id_user'   => Auth::id(),
        'id_kursus' => $request->id_kursus,
        'id_paket'  => $request->id_paket,
        'ruangan'   => $request->ruangan ?? null, // optional
    ]);

    // Simpan jadwal
    $days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

    foreach ($request->jadwal as $index => $j) {
        if(!empty($j['hari']) && !empty($j['jam'])){
            Jadwal::create([
                'reservasi_id' => $reservasi->id,
                'tanggal'      => $j['hari'],
                'hari'         => $days[date('w', strtotime($j['hari']))],
                'jam'          => $j['jam'],
                'pertemuan'    => $index + 1,
            ]);
        }
    }

    // Buat pembayaran otomatis
    Pembayaran::create([
        'reservasi_id' => $reservasi->id,
        'total'        => $paket->harga,
        'status'       => 'proses'
    ]);

    return redirect()->route('siswa.dashboard')
        ->with('success','Reservasi berhasil dibuat, silakan lakukan pembayaran');
}
}

