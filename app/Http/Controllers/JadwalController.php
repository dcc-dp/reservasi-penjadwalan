<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // ambil semua reservasi beserta user, kursus, jadwal
        $reservasis = Reservasi::with('user','kursus','jadwals')->get();
        return view('admin.jadwal.index', compact('reservasis'));
    }

    public function create()
    {
        $reservasis = Reservasi::with('user','kursus')->get();
        return view('admin.jadwal.create', compact('reservasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'pertemuan' => 'required|integer|min:1',
        ]);

        $days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $hari = $days[date('w', strtotime($request->tanggal))];

        Jadwal::create([
            'reservasi_id' => $request->reservasi_id,
            'tanggal' => $request->tanggal,
            'hari' => $hari,
            'jam' => $request->jam,
            'pertemuan' => $request->pertemuan
        ]);

        return redirect()->route('kursus.jadwal')->with('success','Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::with('reservasi.user','reservasi.kursus')->findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'pertemuan' => 'required|integer|min:1',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $hari = $days[date('w', strtotime($request->tanggal))];

        $jadwal->update([
            'tanggal' => $request->tanggal,
            'hari' => $hari,
            'jam' => $request->jam,
            'pertemuan' => $request->pertemuan
        ]);

        return redirect()->route('kursus.jadwal')->with('success','Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('kursus.jadwal')->with('success','Jadwal berhasil dihapus.');
    }

    // untuk modal detail
    public function detail($id)
    {
        $reservasi = Reservasi::with('user','kursus','jadwal')->findOrFail($id);
        return view('admin.jadwal.modal_detail', compact('reservasi'));
    }
}