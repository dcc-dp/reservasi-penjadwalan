<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('admin.materi.materi', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $materi = new Materi();
        $materi->Judul = $request->Judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();
        return redirect()->route('materi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Judul' => 'required',
            'deskripsi' => 'required',
        ]);
        $materi = Materi::findorfail($id);
        $materi->update([
            'Judul' => $request->Judul,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('materi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('materi.index');
    }
}
