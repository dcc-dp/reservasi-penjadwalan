<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paket::all();
        return view('admin.paket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('admin.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_materi' => 'required|string|max:100',
            'jenis'     => 'required|string|max:50',
            'harga'     => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Paket::create([
            'id_materi' => $request->id_materi,
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'id_materi' => 'required|string',
        'jenis' => 'required|string',
        'harga' => 'required|numeric',
    ]);

    $paket = Paket::findOrFail($id);
    $paket->update($request->all());

    return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                $paket = Paket::findOrFail($id);
                $paket->delete();

            return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }
}
