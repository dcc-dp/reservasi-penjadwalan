<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Kursus;
use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $reserv = Reservasi::with(['user', 'kursus', 'paket', 'jadwals', 'pembayaran'])->get();

        return view('modern.admin.reservasi.index', compact('reserv'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kursus'     => 'required|exists:kursuses,id',
            'id_paket'      => 'required|exists:pakets,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'hari_belajar'  => 'required|array|min:1',
            'jam_belajar'   => 'required'
        ]);

        $paket = Paket::findOrFail($request->id_paket);

        // 1. SIMPAN RESERVASI (SESUAI DB)
        $reservasi = Reservasi::create([
            'id_user'   => Auth::id(),
            'id_kursus' => $request->id_kursus,
            'id_paket'  => $request->id_paket,
            'ruangan'   => null,
            'status'    => 'pending'
        ]);

        // 2. MAP HARI
        $mapHari = [
            'Minggu' => 0,
            'Senin'  => 1,
            'Selasa' => 2,
            'Rabu'   => 3,
            'Kamis'  => 4,
            'Jumat'  => 5,
            'Sabtu'  => 6,
        ];

        $hariTerpilih = [];

        foreach ($request->hari_belajar as $h) {
            if (isset($mapHari[$h])) {
                $hariTerpilih[] = $mapHari[$h];
            }
        }

        $currentDate = Carbon::parse($request->tanggal_mulai);
        $pertemuan = 1;
        $totalPertemuan = 15;

        while ($pertemuan <= $totalPertemuan) {

            if (in_array($currentDate->dayOfWeek, $hariTerpilih)) {

                $namaHari = [
                    'Minggu',
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu'
                ][$currentDate->dayOfWeek];

                Jadwal::create([
                    'reservasi_id' => $reservasi->id,
                    'tanggal'      => $currentDate->toDateString(),
                    'hari'         => $namaHari,
                    'jam'          => $request->jam_belajar,
                    'pertemuan'    => $pertemuan,
                ]);

                $pertemuan++;
            }

            $currentDate->addDay();
        }

        // 3. PEMBAYARAN
        Pembayaran::create([
            'reservasi_id' => $reservasi->id,
            'order_id'     => 'ORD-' . time() . '-' . $reservasi->id,
            'total'        => $paket->harga,
            'status'       => 'pending'
        ]);

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil dibuat + 15 jadwal otomatis');
    }
    
    public function show($id)
    {
        $reserv = Reservasi::with(['user', 'kursus', 'paket', 'jadwals'])->findOrFail($id);

        return view('modern.admin.reservasi.show', compact('reserv'));
    }

    public function edit($id)
    {
        $reserv = Reservasi::with('jadwals')->findOrFail($id);

        return view('modern.admin.reservasi.edit', compact('reserv'));
    }

    public function destroy($id)
    {
        $reserv = Reservasi::findOrFail($id);

        // hapus jadwal
        Jadwal::where('reservasi_id', $reserv->id)->delete();

        // hapus pembayaran
        Pembayaran::where('reservasi_id', $reserv->id)->delete();

        // hapus reservasi
        $reserv->delete();

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus');
    }
}
