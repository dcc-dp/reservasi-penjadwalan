<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Reservasi;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil semua data pembayaran, termasuk relasi reservasi
        $pembayarans = Pembayaran::with('reservasi')->latest()->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        // Kalau mau ada pilihan reservasi, bisa ambil data reservasi di sini
        $reservasis = Reservasi::all();
        return view('pembayaran.create', compact('reservasis'));

        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservasi_id'   => 'required|integer',
            'metode_bayar'   => 'required|string|max:100',
            'total'          => 'required|numeric|min:0',
            'status'         => 'required|in:proses,selesai,gagal',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reservasi_id'   => 'required|integer',
            'metode_bayar'   => 'required|string|max:100',
            'total'          => 'required|numeric|min:0',
            'status'         => 'required|in:proses,selesai,gagal',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
