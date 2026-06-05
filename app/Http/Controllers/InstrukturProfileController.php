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

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'keahlian' => 'required',
                'pengalaman' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
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
        } catch (\Exception $e) {

            // dd($e->getMessage());
        }
    }
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
        return view('modern.admin.profile-instruktur.edit', compact('profile', 'users'));
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
<<<<<<< HEAD
=======
    public function userInstruktur(){
          $jadwals = Jadwal::with(['user', 'kursus'])->get();
            return view('instruktur.jadwal', compact('jadwals'));
    }

    




>>>>>>> 33abef5fe1e5f452be4f6dbb368fb1eb4ce6a2d4
}
