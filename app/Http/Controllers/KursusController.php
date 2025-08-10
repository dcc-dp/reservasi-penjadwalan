<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Instruktur;
use App\Models\Instruktur_Profile;
use App\Models\Paket;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursusList = Kursus::with('instruktur', 'paket')->get();
        return view('kursus.index', compact('kursusList'));
    }

    public function create()
    {
        $instrukturs = Instruktur_Profile::all();
        $pakets = Paket::all();
        return view('kursus.create', compact('instrukturs', 'pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_instruktur' => 'required|exists:instrukturs,id',
            'id_paket' => 'required|exists:pakets,id',
            'deskripsi' => 'nullable|string',
        ]);

        Kursus::create($request->all());

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Kursus $kursus)
    {
        $instrukturs = Instruktur_Profile::all();
        $pakets = Paket::all();
        return view('kursus.edit', compact('kursus', 'instrukturs', 'pakets'));
    }

    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_instruktur' => 'required|exists:instrukturs,id',
            'id_paket' => 'required|exists:pakets,id',
            'deskripsi' => 'nullable|string',
        ]);

        $kursus->update($request->all());

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Kursus $kursus)
    {
        $kursus->delete();
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dihapus.');
    }
}
