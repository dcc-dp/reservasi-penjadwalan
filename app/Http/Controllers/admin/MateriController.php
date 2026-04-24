<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Paket;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::with('paket.kursus')->latest()->get();

        return view('admin.materi.materi', compact('materi'));
    }

    public function create()
    {
        $pakets = Paket::with('kursus')->get();

        return view('admin.materi.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Materi::create([
            'paket_id' => $request->paket_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $pakets = Paket::with('kursus')->get();

        return view('admin.materi.edit', compact('materi', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $materi = Materi::findOrFail($id);

        $materi->update([
            'paket_id' => $request->paket_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}