<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Kursus;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $data = Paket::with('kursus')->latest()->get();

        return view('admin.paket.index', compact('data'));
    }

    public function create()
    {
        $kursus = Kursus::latest()->get();

        return view('admin.paket.create', compact('kursus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'jenis' => 'required|in:Regular,VIP,VVIP',
            'harga' => 'required|numeric|min:0',
        ]);

        Paket::create([
            'kursus_id' => $request->kursus_id,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
        ]);

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        $kursus = Kursus::latest()->get();

        return view('admin.paket.edit', compact('paket', 'kursus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'jenis' => 'required|in:Regular,VIP,VVIP',
            'harga' => 'required|numeric|min:0',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update([
            'kursus_id' => $request->kursus_id,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
        ]);

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil diupdate');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('success', 'Paket berhasil dihapus');
    }
}