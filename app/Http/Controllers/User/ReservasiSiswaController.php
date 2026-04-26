<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Paket;
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
            ->with(['kursus', 'jadwals', 'pembayaran'])
            ->get();

        return view('user.reservasi.index', compact('reservasiList'));
    }

    public function create(Request $request)
    {
        $selectedPaket = null;

        if ($request->has('paket_id')) {
            $selectedPaket = Paket::with('kursus')->findOrFail($request->paket_id);
        }

        $kursusList = Kursus::all();
        $paketList = Paket::with('kursus')->get();

        return view('user.reservasi.create', compact(
            'kursusList',
            'paketList',
            'selectedPaket'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kursus'     => 'required|exists:kursuses,id',
            'id_paket'      => 'required|exists:pakets,id',
            'ruangan'       => 'required',
            'jadwal.0.hari' => 'required|date',
            'jadwal.0.jam'  => 'required',
            'jadwal.1.hari' => 'nullable|date',
            'jadwal.1.jam'  => 'nullable',
        ]);

        try {
            $paket = Paket::findOrFail($request->id_paket);

            $reservasi = Reservasi::create([
                'id_user'   => Auth::id(),
                'id_kursus' => $request->id_kursus,
                'id_paket'  => $request->id_paket,
                'ruangan'   => $request->ruangan,
                'status'    => 'pending',
            ]);

            $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            foreach ($request->jadwal as $index => $j) {
                if (!empty($j['hari']) && !empty($j['jam'])) {
                    Jadwal::create([
                        'reservasi_id' => $reservasi->id,
                        'tanggal'      => $j['hari'],
                        'hari'         => $days[date('w', strtotime($j['hari']))],
                        'jam'          => $j['jam'],
                        'pertemuan'    => $index + 1,
                    ]);
                }
            }

            Pembayaran::create([
                'reservasi_id'   => $reservasi->id,
                'order_id'       => 'ORDER-' . $reservasi->id . '-' . time(),
                'snap_token'     => null,
                'transaction_id' => null,
                'metode_bayar'   => null,
                'payment_type'   => null,
                'total'          => $paket->harga,
                'status'         => 'pending',
                'paid_at'        => null,
            ]);

            return redirect()->route('siswa.pembayaran')
                ->with('success', 'Reservasi berhasil dibuat, silakan lakukan pembayaran');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
}