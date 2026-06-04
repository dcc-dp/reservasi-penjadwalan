<?php

namespace App\Http\Controllers;
use App\Models\Instruktur_Profile;
use App\Models\Jadwal;
use App\Models\User ;
use Illuminate\Http\Request;

class InstrukturProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Instruktur_Profile::with('user')->latest()->get();
        return view('modern.admin.profile-instruktur.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modern.admin.profile-instruktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',

            'notelp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',

            'keahlian' => 'required|string|max:255',
            'pengalaman' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ], [
            'email.unique' => 'Email sudah terdaftar. Gunakan email lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'instruktur',

            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
        ]);

        Instruktur_Profile::create([
            'user_id' => $user->id,
            'keahlian' => $request->keahlian,
            'pengalaman' => $request->pengalaman,
            'bio' => $request->bio,
        ]);

        return redirect()
            ->route('instruktur.index')
            ->with('success', 'Instruktur berhasil ditambahkan');
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
      public function edit($id)
    {
        $profile = Instruktur_Profile::findOrFail($id);
        $users = User::all();
        return view('modern.admin.profile-instruktur.edit', compact('profile','users'));
    }


    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'keahlian' => 'required|string|max:255',
            'pengalaman' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $profile = Instruktur_Profile::findOrFail($id);
        $profile->update($request->all());

        return redirect()->route('instruktur.index')->with('success', 'Profile berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Instruktur_Profile::findOrFail($id);

        $user = $profile->user;

        $profile->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()
            ->route('instruktur.index')
            ->with('success', 'Instruktur berhasil dihapus');
    }
    public function userInstruktur(){
          $jadwals = Jadwal::with(['user', 'kursus'])->get();
            return view('instruktur.jadwal', compact('jadwals'));
    }

    




}
