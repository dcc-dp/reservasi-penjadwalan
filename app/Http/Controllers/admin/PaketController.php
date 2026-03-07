<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Kursus;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paket::with('kursus')->get();

        return view('admin.paket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kursus = Kursus::all();

        return view('admin.paket.create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'jenis'     => 'required|in:Regular,VIP,VVIP',
            'harga'     => 'required|numeric|min:0',
        ]);

        Paket::create([
            'kursus_id' => $request->kursus_id,
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('paket.index')
            ->with('success','Paket berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        $kursus = Kursus::all();

        return view('admin.paket.edit', compact('paket','kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'jenis'     => 'required|in:Regular,VIP,VVIP',
            'harga'     => 'required|numeric|min:0',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update([
            'kursus_id' => $request->kursus_id,
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('paket.index')
            ->with('success','Paket berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('success','Paket berhasil dihapus');
    }
}