<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reserv = Reservasi::all();
        return view('admin.reservasi.index',compact('reserv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    // public function edit(string $id)
    // {
    //     $reserv = Reservasi::findOrFail($id);
    //     return view('admin.reservasi.edit', compact('reserv'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hari1' => 'required',
            'jam1' => 'required',
            'hari2' => 'required',
            'jam2' => 'required',
        ]);
        $reserv = Reservasi::findorfail($id);
        $reserv->update([
            'hari1' => $request->hari1,
            'hari1' => $request->hari1,
            'hari2' => $request->hari2,
            'jam2' => $request->jam2,
        ]);
        return redirect()->route('reservasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserv = Reservasi::findOrFail($id);
        $reserv->delete();

        return redirect()->route('reservasi');
    }
}
