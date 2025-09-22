<?php

namespace App\Http\Controllers;
use App\Models\Instruktur_Profile;
use App\Models\User ;
use Illuminate\Http\Request;

class InstrukturProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Instruktur_Profile::all();
        return view('admin.profile-instruktur.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $users = User::all();
        return view('admin.profile-instruktur.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'user_id' => 'required|exists:users,id',
            'keahlian' => 'required|string|max:255',
            'pengalaman' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Instruktur_Profile::create($request->all());

        return redirect()->route('profile-instruktur.index')->with('success', 'Profile berhasil ditambahkan');

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
        return view('admin.profile-instruktur.edit', compact('profile','users'));
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

        return redirect()->route('profile-instruktur.index')->with('success', 'Profile berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Instruktur_Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile-instruktur.index')->with('success', 'Profile berhasil dihapus');
    }
}