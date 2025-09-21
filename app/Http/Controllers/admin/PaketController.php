<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Materi;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paket::with('materi')->get();
        return view('admin.paket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           $materi = Materi::all();

            return view('admin.paket.create', compact('materi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_materi' => 'required|integer|exists:materis,id',
            'jenis'     => 'required|string|max:50',
            'harga'     => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Paket::create([
            'id_materi' => $request->id_materi,
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('paket.index');
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
        $materi = Materi::all();
        return view('admin.paket.edit', compact('paket','materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'id_materi' => 'required|integer|exists:materis,id',
        'jenis' => 'required|string|max:50',
        'harga' => 'required|numeric|min:0',
    ]);

    $paket = Paket::findOrFail($id);
    $paket->update([
        'id_materi' => $request->id_materi,
        'jenis' => $request->jenis,
        'harga' => $request->harga,
    ]);

    return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                $paket = Paket::findOrFail($id);
                $paket->delete();

            return redirect()->route('paket.index');
    }
}