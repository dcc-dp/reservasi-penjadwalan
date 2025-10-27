<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    /**
     * Menampilkan daftar semua reservasi (khusus admin)
     */
    public function index()
{
    $reserv = Reservasi::with(['user', 'kursus'])->get();
    return view('admin.reservasi.index', compact('reserv'));
}

public function create()
{
    $kursusList = Kursus::all();
    return view('admin.reservasi.create', compact('kursusList'));
}




    /**
     * Simpan data reservasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:kursuses,id',
            'hari1' => 'required|string|max:50',
            'jam1' => 'required|string|max:50',
            'hari2' => 'nullable|string|max:50',
            'jam2' => 'nullable|string|max:50',
        ]);

        Reservasi::create([
            'id_user' => Auth::id(),
            'id_kursus' => $request->id_kursus,
            'hari1' => $request->hari1,
            'jam1' => $request->jam1,
            'hari2' => $request->hari2,
            'jam2' => $request->jam2,
        ]);

        return redirect()->back()->with('success', 'Reservasi berhasil dibuat!');
    }

    /**
     * Tampilkan detail reservasi
     */
    public function show($id)
    {
        $reserv = Reservasi::with(['user', 'kursus'])->findOrFail($id);
        return view('admin.reservasi.show', compact('reserv'));
    }

    /**
     * Form edit reservasi
     */
    public function edit($id)
    {
        $reserv = Reservasi::findOrFail($id);
        return view('admin.reservasi.edit', compact('reserv'));
    }

    /**
     * Update data reservasi
     */
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

    /**
     * Hapus data reservasi
     */
    public function destroy($id)
    {
        $reserv = Reservasi::findOrFail($id);
        $reserv->delete();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus!');
    }
}
