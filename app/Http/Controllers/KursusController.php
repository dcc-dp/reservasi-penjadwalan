<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Paket;
use App\Models\Instruktur_Profile;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\User;

class KursusController extends Controller
{
    public function index()
    {
        $kursusList = Kursus::with(['instruktur','pakets'])->get();

        $instrukturList = User::where('role','instruktur')->get();

        $paketList = Paket::all();

        $reserv = Reservasi::with(['user','kursus','pembayaran'])->get();

        return view('kursus.index', compact(
            'kursusList',
            'instrukturList',
            'paketList',
            'reserv'
        ));
    }

    public function create()
    {
        $instrukturList = User::where('role','instruktur')->get();
        $paketList = Paket::all();

        return view('kursus.create', compact('instrukturList','paketList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_instruktur' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Kursus::create([
            'name' => $request->name,
            'id_instruktur' => $request->id_instruktur,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit(Kursus $kursus, $id)
    {
        $kursus = Kursus::findOrFail($id);
        $instrukturList = User::where('role','instruktur')->get();
        $paketList = Paket::all();

        return view('kursus.edit', compact('kursus','instrukturList','paketList', 'id'));
    }

    public function update(Request $request, $id)
{
    $kursus = Kursus::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'id_instruktur' => 'required',
        'deskripsi' => 'nullable'
    ]);

    $kursus->update([
        'name' => $request->name,
        'id_instruktur' => $request->id_instruktur,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('kursus.index')
        ->with('success', 'Kursus berhasil diupdate.');
}

    public function destroy(Kursus $kursus, $id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}