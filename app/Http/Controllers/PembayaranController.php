<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil semua data pembayaran beserta relasi reservasi
        $pembayarans = Pembayaran::with('reservasi')
            ->latest()
            ->paginate(10); // pakai paginate biar rapi

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
