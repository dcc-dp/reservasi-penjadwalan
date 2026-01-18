<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Kursus;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $reserv = Reservasi::with(['user', 'kursus','pembayaran'])->get();
        return view('admin.reservasi.index', compact('reserv'));
    }

    public function create()
    {
        $kursusList = Kursus::all();
        return view('admin.reservasi.create', compact('kursusList'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_kursus' => 'required|exists:kursuses,id',
        'hari1' => 'required|string|max:50',
        'jam1' => 'required|string|max:50',
        'hari2' => 'nullable|string|max:50',
        'jam2' => 'nullable|string|max:50',
    ]);

    $reservasi = Reservasi::create([
        'id_user'   => Auth::id(),
        'id_kursus' => $request->id_kursus,
        'hari1'     => $request->hari1,
        'jam1'      => $request->jam1,
        'hari2'     => $request->hari2,
        'jam2'      => $request->jam2,
    ]);

    Pembayaran::create([
        'reservasi_id' => $reservasi->id,
        'metode_bayar' => null,
        'total'        => $reservasi->kursus->harga,
        'status'       => 'menunggu',
    ]);

    return redirect()->back()->with('success', 'Reservasi berhasil dibuat!');
}

    public function show($id)
    {
        $reserv = Reservasi::with(['user', 'kursus'])->findOrFail($id);
        return view('admin.reservasi.show', compact('reserv'));
    }

    
    public function edit($id)
    {
        $reserv = Reservasi::findOrFail($id);
        return view('admin.reservasi.edit', compact('reserv'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari1' => 'required|string|max:50',
            'jam1' => 'required|string|max:50',
            'hari2' => 'nullable|string|max:50',
            'jam2' => 'nullable|string|max:50',
        ]);

        $reserv = Reservasi::findOrFail($id);
        $reserv->update([
            'hari1' => $request->hari1,
            'jam1' => $request->jam1,
            'hari2' => $request->hari2,
            'jam2' => $request->jam2,
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Data reservasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $reserv = Reservasi::findOrFail($id);
        $reserv->delete();

        return redirect()->route('reservasi')->with('success', 'Reservasi berhasil dihapus!');
    }
}
