<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\admin\ReservasiController;
use App\Http\Controllers\InstrukturProfileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\User\SiswaController;
use App\Http\Controllers\User\KursusSiswaController;
use App\Http\Controllers\User\JadwalSiswaController;
use App\Http\Controllers\user\ReservasiSiswaController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\User\KursusSayaController;
use App\Http\Controllers\User\PembayaranSiswaController;
use App\Http\Controllers\User\ProfilSiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Instruktur\DashboardInstrukturController;
use App\Http\Controllers\User\UlasanSiswaController;
use App\Http\Controllers\Instruktur\KursusInstrukturController;
use App\Http\Controllers\Instruktur\JadwalInstrukturController;
use App\Http\Controllers\Instruktur\UlasanInstrukturController;
use App\Http\Controllers\Instruktur\ProfilController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('pages.home');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/benefit', [LandingPageController::class, 'benefit'])->name('benefit');
Route::get('/pakets', [LandingPageController::class, 'pakets'])->name('pakets');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.admin');
        Route::post('/register', [RegisterController::class, 'store'])->name('register.admin.store');
    
        Route::get('/siswa/login', [SessionsController::class, 'createSiswa'])->name('siswa.login');
        Route::post('/siswa/login', [SessionsController::class, 'store']);
    
        Route::get('/siswa/register', [LoginController::class, 'register'])->name('siswa.register');
        Route::post('/siswa/register', [LoginController::class, 'register'])->name('siswa.register.store');

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);

    Route::get('/siswa/login', [SessionsController::class, 'createSiswa'])->name('siswa.login');
    Route::post('/siswa/login', [SessionsController::class, 'store']);

    Route::get('/siswa/register', [LoginController::class, 'registerIndex'])->name('siswa.register');
    Route::post('/siswa/register', [LoginController::class, 'register'])->name('siswa.register.store');

    Route::get('/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass']);
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword']);
});

/*
|--------------------------------------------------------------------------
| ADMIN (AUTH + ROLE ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('modern')
    ->group(function () {

        Route::get('/dashboard', [HomeController::class, 'dashboard'])
            ->name('modern.dashboard');

    });
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->name('admin.dashboard');

    // logout admin (opsional, beda nama biar tidak bentrok)
    Route::post('/logout', [SessionsController::class, 'destroy'])->name('admin.logout');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/edit/{id}', [MateriController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/update/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/destroy/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('admin.pembayaran.destroy');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/destroy/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');

    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/create', [KursusController::class, 'create'])->name('kursus.create');
    Route::post('/kursus/store', [KursusController::class, 'store'])->name('kursus.store');
    Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('kursus.edit');
    Route::put('/kursus/update/{id}', [KursusController::class, 'update'])->name('kursus.update');
    Route::delete('/kursus/destroy/{id}', [KursusController::class, 'destroy'])->name('kursus.destroy');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal');
    Route::get('/jadwal/detail/{id}', [JadwalController::class, 'detail'])->name('admin.jadwal.detail');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('admin.jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
    Route::put('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::delete('/jadwal/destroy/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');


    Route::get('/instruktur', [InstrukturProfileController::class, 'index'])->name('instruktur.index');
    Route::get('/instruktur/create', [InstrukturProfileController::class, 'create'])->name('instruktur.create');
    Route::post('/instruktur/store', [InstrukturProfileController::class, 'store'])->name('instruktur.store');
    Route::get('/instruktur/edit/{id}', [InstrukturProfileController::class, 'edit'])->name('instruktur.edit');
    Route::put('/instruktur/update/{id}', [InstrukturProfileController::class, 'update'])->name('instruktur.update');
    Route::delete('/instruktur/destroy/{id}', [InstrukturProfileController::class, 'destroy'])->name('instruktur.destroy');

    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('/reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/edit/{id}', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::put('/reservasi/update/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('/reservasi/destroy/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

    Route::get('/ulasan', [UlasanController::class, 'index'])->name('admin.ulasan.index');
    Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('admin.ulasan.destroy');

    Route::get('/instruktur', [InstrukturProfileController::class, 'index'])->name('instruktur.index');
    Route::post('/admin/logout', function () {
            Auth::logout();
            return redirect('/');
        })->name('logout');
});

/*
|--------------------------------------------------------------------------
| INSTRUKTUR (AUTH + ROLE INSTRUKTUR)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:instruktur'])
    ->prefix('instruktur')
    ->name('instruktur.')
    ->group(function () {

        Route::get('/dashboard', [DashboardInstrukturController::class, 'index'])
            ->name('dashboard');

        Route::get('/kursus', [KursusInstrukturController::class, 'index'])
            ->name('kursus.index');

        Route::get('/jadwal', [JadwalInstrukturController::class, 'index'])
            ->name('jadwal.index');

        Route::get('/ulasan', [UlasanInstrukturController::class, 'index'])
            ->name('ulasan.index');

        // PROFIL
        Route::get('/profil', [ProfilController::class, 'index'])
            ->name('profil');

        Route::post('/profil/update', [ProfilController::class, 'update'])
            ->name('profil.update');



        Route::post('/logout', function () {
            Auth::logout();
            return redirect('/');
        })->name('logout');
    });
/*
|--------------------------------------------------------------------------
| SISWA (AUTH + ROLE SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->group(function () {

    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

    Route::get('/form-pendaftaran', [pendaftaranController::class, 'index'])->name('siswa.form-pendaftaran');
    Route::post('/form-pendaftaran/store', [ReservasiSiswaController::class, 'store'])->name('form-pendaftaran.store');

    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('siswa.jadwal');

    // Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('siswa.pembayaran');

    Route::get('/reservasi', [ReservasiSiswaController::class, 'index'])->name('siswa.reservasi.index');
    Route::get('/reservasi/create', [ReservasiSiswaController::class, 'create'])->name('siswa.reservasi.create');
    Route::post('/reservasi/store', [ReservasiSiswaController::class, 'store'])->name('siswa.reservasi.store');

    Route::get('/kursus', [KursusSiswaController::class, 'index'])->name('siswa.kursus.index');
    Route::get('/kursus/{id}', [KursusSiswaController::class, 'show'])->name('siswa.kursus.show');
    Route::get('/kursus-saya', [KursusSayaController::class, 'index'])->name('siswa.kursus-saya.index');

    Route::get('/profil', [ProfilSiswaController::class, 'index'])->name('siswa.profil');
    Route::put('/profil/update', [ProfilSiswaController::class, 'update'])->name('siswa.profil.update');

    Route::get('/pembayaran', [PembayaranSiswaController::class, 'index'])->name('siswa.pembayaran');
    Route::get('/pembayaran/{id}', [PembayaranSiswaController::class, 'show'])->name('siswa.pembayaran.show');
    Route::get('/siswa/pembayaran/{id}/pay', [PembayaranSiswaController::class, 'bayar'])->name('siswa.pembayaran.bayar');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

    Route::get('/ulasan', [UlasanSiswaController::class, 'index'])->name('siswa.ulasan.index');
    Route::post('/ulasan/store', [UlasanSiswaController::class, 'store'])->name('siswa.ulasan.store');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('pages.home');
    })->name('siswa.logout');
});
