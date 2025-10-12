<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kursus;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['user', 'kursus'])->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $kursuses = Kursus::all();

        return view('admin.jadwal.create', compact('users', 'kursuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user'   => 'required|exists:users,id',
            'id_kursus' => 'required|exists:kursuses,id',
            'tanggal'   => 'required|date',
            'jam'       => 'required',
            'ruangan'   => 'required|string|max:50',
            'pertemuan' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data['hari'] = $days[date('w', strtotime($request->tanggal))];

        $data['jam'] = $request->tanggal . ' ' . $request->jam . ':00';

        Jadwal::create($data);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
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
        $jadwal = Jadwal::findOrFail($id);
        $users = User::all();
        $kursuses = Kursus::all();

        return view('admin.jadwal.edit', compact('jadwal', 'users', 'kursuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_user'   => 'required|exists:users,id',
            'id_kursus' => 'required|exists:kursuses,id',
            'tanggal'   => 'required|date',
            'jam'       => 'required',
            'ruangan'   => 'required|string|max:50',
            'pertemuan' => 'required|integer|min:1',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $data = $request->all();
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data['hari'] = $days[date('w', strtotime($request->tanggal))];

        $data['jam'] = $request->tanggal . ' ' . $request->jam;

        $jadwal->update($data);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
