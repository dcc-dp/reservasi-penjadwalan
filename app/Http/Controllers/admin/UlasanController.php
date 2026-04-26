<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::with(['user', 'kursus'])->latest()->get();

        return view('admin.ulasan.index', compact('ulasans'));
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}