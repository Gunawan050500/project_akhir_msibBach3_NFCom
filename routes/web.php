<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Anak_asuhController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kategori_KegiatanController;
use App\Http\Controllers\KegiatanController;

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

Route::resource('user', UserController::class);
Route::resource('anak_asuh', Anak_asuhController::class);
Route::resource('donatur', DonaturController::class);
Route::resource('donasi', DonasiController::class);
Route::resource('kategori_kegiatan', Kategori_KegiatanController::class);
Route::resource('kegiatan', KegiatanController::class);

//bagian anak_asuh
Route::get('anak_asuh-edit/{id}', [Anak_asuhController::class, 'edit']);
Route::get('anak_asuh-pdf', [Anak_asuhController::class, 'anak_asuhPDF']);
Route::get('anak_asuh-excel', [Anak_asuhController::class, 'anak_asuhExcel']);

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
Route::get('dashboard', [DashboardController::class, 'index']);


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

Auth::routes();

Route::get('/homed', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
