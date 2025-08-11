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
        $kursusList = Kursus::all();
        return view('kursus.index', compact('kursusList'));
    }

    public function create()
    {
        $instrukturs = Instruktur_Profile::all();
        $pakets = Paket::all();
        // dd($pakets);
        return view('kursus.create', compact('instrukturs', 'pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_instruktur' => 'required|exists:instruktur__profiles,id',
            'id_paket' => 'required|exists:pakets,id',
            'deskripsi' => 'nullable|string',
        ]);

        Kursus::create($request->all());

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
{
    // Tambahkan id ke $request supaya bisa dipakai $request->id
    $request->merge(['id' => $id]);

    $instrukturs = Instruktur_Profile::all();
    $pakets = Paket::all();
    $kursusId = Kursus::findOrFail($id);

    return view('kursus.edit', compact('instrukturs', 'pakets', 'kursusId'));
}

    
    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_instruktur' => 'required|exists:instruktur__profiles,id',
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
