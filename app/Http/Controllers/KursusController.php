<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Paket;
use App\Models\Instruktur_Profile;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursusList = Kursus::with(['instruktur.user', 'paket.materi'])->get();
        $instrukturList = Instruktur_Profile::with('user')->get();
        $paketList = Paket::with('Materi')->get();
        $reserv = Reservasi::with(['user','kursus','pembayaran'])->get();
        return view('kursus.index', compact('kursusList', 'instrukturList', 'paketList', 'reserv'));
    }

    public function create()
    {
        $paketList = Paket::with('materi')->get();
        $instrukturList = Instruktur_Profile::with('user')->get();

        return view('kursus.create', compact('paketList', 'instrukturList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_instruktur' => 'required',
            'id_paket' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Kursus::create([
            'name' => $request->name,
            'id_instruktur' => $request->id_instruktur,
            'id_paket' => $request->id_paket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Kursus $kursus)
    {
        $paketList = Paket::with('materi')->get();
        $instrukturList = Instruktur_Profile::with('user')->get();

        return view('kursus.edit', compact('kursus','paketList','instrukturList'));
    }

    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'name' => 'required',
            'id_instruktur' => 'required',
            'id_paket' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $kursus->update([
            'name' => $request->name,
            'id_instruktur' => $request->id_instruktur,
            'id_paket' => $request->id_paket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil diupdate.');
    }

    public function destroy(Kursus $kursus)
    {
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }

    
}