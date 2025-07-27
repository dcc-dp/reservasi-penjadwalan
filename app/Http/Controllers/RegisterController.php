<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'notelp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'password' => 'required|min:6',
            'agreement' => 'accepted'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);



        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
