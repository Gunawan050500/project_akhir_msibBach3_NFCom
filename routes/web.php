<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Anak_asuhController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kategori_KegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Data_anakController;
use App\Http\Controllers\Data_strukturController;
use App\Http\Controllers\Data_kegiatanController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/administrator', function () {
    return view('admin.home');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/Donasi', function () {
    return view('landingpage.donasi');
});


//ini untuk tampilan dashboardnya
// Route::get('/dashboardcount', function () {
//     return view('dashboard.index');
// });

Route::resource('user', UserController::class);
Route::resource('anak_asuh', Anak_asuhController::class);
Route::resource('donatur', DonaturController::class);
Route::resource('donasi', DonasiController::class);
Route::resource('kategori_kegiatan', Kategori_KegiatanController::class);
Route::resource('kegiatan', KegiatanController::class);

// Route::get('kegiatandua', Data_kegiatanController::class, 'tampil');

//bagian anak_asuh
Route::get('anak_asuh-edit/{id}', [Anak_asuhController::class, 'edit']);
Route::get('anak_asuh-pdf', [Anak_asuhController::class, 'anak_asuhPDF']);
Route::get('anak_asuh-excel', [Anak_asuhController::class, 'anak_asuhExcel']);


//ini tambahan route untuk data di landingpage
Route::resource('data_anak', Data_anakController::class);
Route::resource('data_struktur', Data_strukturController::class);
Route::resource('data_kegiatan', Data_kegiatanController::class);

//bagian donatur
Route::get('donatur-pdf', [DonaturController::class, 'donaturPDF']);
Route::get('donatur-excel', [DonaturController::class, 'donaturExcel']);
Route::get('donatur-edit/{id}', [DonaturController::class, 'edit']);



//bagian donasi
Route::get('donasi-pdf', [DonasiController::class, 'donasiPDF']);
Route::get('donasi-excel', [DonasiController::class, 'donasiExcel']);
Route::get('donasi-edit/{id}', [DonasiController::class, 'edit']);

//bagian user
Route::get('user-pdf', [UserController::class, 'userPDF']);
Route::get('user-excel', [UserController::class, 'userExcel']);
Route::get('user-edit/{id}', [UserController::class, 'edit']);
Route::get('dashboardcount', [DashboardController::class, 'index']);


//bagian kategori kegiatan
Route::get('kategori_kegiatan-pdf', [Kategori_KegiatanController::class, 'kategori_kegiatanPDF']);
Route::get('kategori_kegiatan-excel', [Kategori_KegiatanController::class, 'kategori_kegiatanExcel']);
Route::get('user-edit/{id}', [UserController::class, 'edit']);

//bagian kategori kegiatan
Route::get('kegiatan-pdf', [KegiatanController::class, 'kegiatanPDF']);
Route::get('kegiatan-excel', [KegiatanController::class, 'kegiatanExcel']);
Route::get('kegiatan-edit/{id}', [KegiatanController::class, 'edit']);

//ini route untuk menu search
Route::get('donatur-cari', [DonaturController::class, 'cari']);
Route::get('kategori_kegiatan-cari', [Kategori_KegiatanController::class, 'cari']);
Route::get('kegiatan-cari', [KegiatanController::class, 'cari']);
Route::get('user-cari', [UserController::class, 'cari']);
Route::get('anak_asuh-cari', [Anak_asuhController::class, 'cari']);
Route::get('donasi-cari', [DonasiController::class, 'cari']);
Route::get('data_anak-cari', [Data_anakController::class, 'cari']);
Route::get('data_struktur-cari', [Data_strukturController::class, 'cari']);

Auth::routes();

Route::get('/homed', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ini bagian API
Route::get('/api-donatur', [DonaturController::class, 'apiDonatur']);
Route::get('/api-donatur/{id}', [DonaturController::class, 'apiDonaturDetail']);

Route::get('/api-kategori_kegiatan', [Kategori_KegiatanController::class, 'apiKategori_Kegiatan']);
Route::get('/api-kategori_kegiatan/{id}', [Kategori_KegiatanController::class, 'apiKategori_KegiatanDetail']);

//ini untuk update profile pada data user secara pribadi
Route::get('user-ubah', [UserController::class, 'userPDF']);

//ini untuk login menggunakan google
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//ini route untuk login menggunakan google
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


//ini route untuk detail user yang sedang login
Route::get('/profile', function () {
    return view('profile.indexsatu');
});

Route::get('profile-index/{id}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile-edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('profile-update/{id}', [ProfileController::class, 'update'])->name('profile.update');