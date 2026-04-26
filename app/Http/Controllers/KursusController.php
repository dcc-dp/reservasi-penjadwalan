<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\User;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursusList = Kursus::with(['instruktur', 'pakets'])->latest()->get();

        return view('kursus.index', compact('kursusList'));
    }

    public function create()
    {
        $instrukturList = User::where('role', 'instruktur')->get();

        return view('kursus.create', compact('instrukturList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'id_instruktur' => 'required|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        Kursus::create([
            'name' => $request->name,
            'id_instruktur' => $request->id_instruktur,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id);
        $instrukturList = User::where('role', 'instruktur')->get();

        return view('kursus.edit', compact('kursus', 'instrukturList'));
    }

    public function update(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:250',
            'id_instruktur' => 'required|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        $kursus->update([
            'name' => $request->name,
            'id_instruktur' => $request->id_instruktur,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}