<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('instruktur.profil.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'notelp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /** @var \App\Models\User $user */
        $user = auth::user();

        $data = [
            'name' => $request->name,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diupdate');
    }
}