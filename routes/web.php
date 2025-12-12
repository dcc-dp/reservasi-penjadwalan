<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ReservasiController;
use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\InstrukturProfileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\User\LandingPageController;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');

    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);

    // Route::get('/login', function () {
    //     return view('dashboard');
    // })->name('sign-up');

    //Manajemen Kursus
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    route::get('/materi/edit{id}', [MateriController::class, 'edit'])->name('materi.edit');
    route::put('/materi/update{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi');
    Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    // route::get('/reservasi/edit{id}', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    // route::put('/reservasi/update{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

    //Manajemen User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    route::get('/user/edit{id}', [UserController::class, 'edit'])->name('user.edit');
    route::put('/user/update{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    route::get('/admin/edit{id}', [AdminController::class, 'edit'])->name('admin.edit');
    route::put('/admin/update{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    //paket
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/index', [PaketController::class, 'store'])->name('paket.store');
    Route::post('/edit', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');

    // Profile Instruktur
    Route::resource('profile-instruktur', InstrukturProfileController::class);
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);

    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);

    Route::get('/Register', [LoginController::class, 'registerIndex'])->name('registerUser');
    Route::post('/register/store', [LoginController::class, 'register'])->name('registerStore');
});


Route::get('/User', [LoginController::class, 'index'])->name('loginUser');
Route::post('/User/store', [LoginController::class, 'login'])->name('loginUser.store');




// Kursus
Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
Route::get('/kursus/create', [KursusController::class, 'create'])->name('kursus.create');
Route::post('/kursus/store', [KursusController::class, 'store'])->name('kursus.store');
Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('kursus.edit');
Route::put('/kursus/edit/{kursus}', [KursusController::class, 'update'])->name('kursus.update');
Route::delete('/kursus/{kursus}', [KursusController::class, 'destroy'])->name('kursus.destroy');

// ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');

// pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('/pembayaran/edit/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

// Jadwal

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

// ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');


//USER:LANDING PAGE
// Route::get('/landingPage', [LandingPageController::class, 'index'])->name('landingPage');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/benefit', [LandingPageController::class, 'benefit'])->name('benefit');
Route::get('/pakets', [LandingPageController::class, 'pakets'])->name('pakets');

// USER ROUTES
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest:user')->group(function () {
        Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
        Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit');
    });

    Route::middleware('auth:user')->group(function () {
        Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    });
});



// Route::get('/login', function () {
//     return view('session/login-session');
// })->name('login');
