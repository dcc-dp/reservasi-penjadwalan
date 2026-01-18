<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiSiswaController extends Controller
{
    public function create()
    {
        $kursusList = \App\Models\Kursus::all();
        return view('user.reservasi.create', compact('kursusList'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:kursuses,id',
            'hari1' => 'required',
            'jam1' => 'required',
            'hari2' => 'nullable',
            'jam2' => 'nullable',
        ]);

        $reservasi = Reservasi::create([
            'id_user' => Auth::id(),
            'id_kursus' => $request->id_kursus,
            'hari1' => $request->hari1,
            'jam1' => $request->jam1,
            'hari2' => $request->hari2,
            'jam2' => $request->jam2,
        ]);

        // otomatis buat pembayaran
        Pembayaran::create([
            'reservasi_id' => $reservasi->id,
            'status' => 'menunggu',
        ]);

        return redirect()->route('siswa.dashboard')
            ->with('success', 'Reservasi berhasil dibuat, silakan lakukan pembayaran');
    }
}

