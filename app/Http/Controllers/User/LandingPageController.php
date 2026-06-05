<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Paket;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $kursus = Kursus::all();
        $paket = Paket::with('kursus')->latest()->take(3)->get();

        $ulasans = Ulasan::with('user', 'kursus')
            ->latest()
            ->take(6)
            ->get();

        $totalStudents = User::where('role', 'siswa')->count();
        $totalCourses = Kursus::count();
        return view('user.pages.home', compact('paket', 'kursus', 'ulasans', 'totalStudents', 'totalCourses'));
    }
    public function about()
    {
        $totalStudents = User::where('role', 'siswa')->count();
        $totalCourses = Kursus::count();
        $totalMentors = User::where('role', 'instruktur')->count();

        return view('user.pages.about', compact('totalStudents', 'totalCourses', 'totalMentors'));
    }
    public function benefit()
    {

        return view('user.pages.benefit');
    }

    public function pakets()
    {
        $pakets = Paket::with('kursus')->latest()->get();

        return view('user.pages.pakets', compact('pakets'));
    }
}
