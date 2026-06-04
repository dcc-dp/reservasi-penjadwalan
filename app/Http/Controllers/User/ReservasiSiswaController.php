<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\Jadwal;
use App\Models\Kursus;
use Carbon\Carbon;
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
            'id_kursus'      => 'required|exists:kursuses,id',
            'id_paket'       => 'required|exists:pakets,id',
            'tanggal_mulai'  => 'required|date',
            'hari'           => 'required|array|min:1',
            'jam'            => 'required',
            'ruangan'        => 'nullable',
        ]);

        // dd($request->all());

        try {

            $paket = Paket::findOrFail($request->id_paket);

            $reservasi = Reservasi::create([
                'id_user'       => Auth::id(),
                'id_kursus'     => $request->id_kursus,
                'id_paket'      => $request->id_paket,
                'tanggal_mulai' => $request->tanggal_mulai,
                'ruangan'       => $request->ruangan,
                'status'        => 'pending',
            ]);

            $mapHari = [
                'Minggu' => 0,
                'Senin'  => 1,
                'Selasa' => 2,
                'Rabu'   => 3,
                'Kamis'  => 4,
                'Jumat'  => 5,
                'Sabtu'  => 6,
            ];

            $tanggal = Carbon::parse($request->tanggal_mulai);

            $pertemuan = 1;

            while ($pertemuan <= 15) {

                $hariSekarang = $tanggal->dayOfWeek;

                foreach ($request->hari as $hariDipilih) {

                    if ($hariSekarang == $mapHari[$hariDipilih]) {

                        Jadwal::create([
                            'reservasi_id' => $reservasi->id,
                            'tanggal'      => $tanggal->format('Y-m-d'),
                            'hari'         => $hariDipilih,
                            'jam'          => $request->jam,
                            'pertemuan'    => $pertemuan,
                        ]);

                        $pertemuan++;
                        break;
                    }
                }

                $tanggal->addDay();
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

            return redirect()
                ->route('siswa.pembayaran')
                ->with('success', 'Reservasi berhasil dibuat');
        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
