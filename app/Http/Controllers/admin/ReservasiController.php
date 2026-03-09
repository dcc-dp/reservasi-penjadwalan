<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Kursus;
use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $reserv = Reservasi::with(['user','kursus','paket','pembayaran'])->get();

        return view('admin.reservasi.index', compact('reserv'));
    }

    public function create()
    {
        $kursusList = Kursus::with('pakets')->get();

        return view('admin.reservasi.create', compact('kursusList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:kursuses,id',
            'id_paket' => 'required|exists:pakets,id',
            'jadwal.*.hari' => 'required',
            'jadwal.*.jam' => 'required'
        ]);

        $paket = Paket::findOrFail($request->id_paket);

        // simpan reservasi
        $reservasi = Reservasi::create([
            'id_user' => Auth::id(),
            'id_kursus' => $request->id_kursus,
            'id_paket' => $request->id_paket
        ]);

        // simpan jadwal
        foreach ($request->jadwal as $j) {

            if(!empty($j['hari']) && !empty($j['jam'])){

                Jadwal::create([
                    'reservasi_id' => $reservasi->id,
                    'hari' => $j['hari'],
                    'jam' => $j['jam']
                ]);
            }
        }

        // buat pembayaran
        Pembayaran::create([
            'reservasi_id' => $reservasi->id,
            'total' => $paket->harga,
            'status' => 'proses'
        ]);

        return redirect()->route('reservasi.index')
        ->with('success','Reservasi berhasil dibuat');
    }

    public function show($id)
    {
        $reserv = Reservasi::with(['user','kursus','paket','jadwals'])->findOrFail($id);

        return view('admin.reservasi.show', compact('reserv'));
    }

    public function edit($id)
    {
        $reserv = Reservasi::with('jadwals')->findOrFail($id);

        return view('admin.reservasi.edit', compact('reserv'));
    }

    public function destroy($id)
    {
        $reserv = Reservasi::findOrFail($id);

        $reserv->delete();

        return redirect()->route('reservasi.index')
        ->with('success','Reservasi berhasil dihapus');
    }
}