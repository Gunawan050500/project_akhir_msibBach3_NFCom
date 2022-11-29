<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Anak_asuhController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kategori_KegiatanController;
use App\Http\Controllers\Data_anakController;
use App\Http\Controllers\Data_strukturController;
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

Route::resource('anak_asuh', Anak_asuhController::class);
Route::resource('donatur', DonaturController::class);
Route::resource('donasi', DonasiController::class);
Route::resource('user', UserController::class);
Route::resource('kategori_kegiatan', Kategori_KegiatanController::class);

//ini tambahan route untuk data di landingpage
Route::resource('data_anak', Data_anakController::class);
Route::resource('data_struktur', Data_strukturController::class);

//wxport bagian donatur
Route::get('donatur-pdf', [DonaturController::class, 'donaturPDF']);
Route::get('donatur-excel', [DonaturController::class, 'donaturExcel']);

//export bagian user
Route::get('user-pdf', [UserController::class, 'userPDF']);
Route::get('user-excel', [UserController::class, 'userExcel']);
Route::get('dashboard', [DashboardController::class, 'index']);


//export bagian user
Route::get('kategori_kegiatan-pdf', [Kategori_KegiatanController::class, 'kategori_kegiatanPDF']);
Route::get('kategori_kegiatan-excel', [Kategori_KegiatanController::class, 'kategori_kegiatanExcel']);
// Route::get('donatur-edit/{id}', [DonaturController::class, 'edit']);
Route::get('user-edit/{id}', [UserController::class, 'edit']);

//ini route untuk menu search
Route::get('donatur-cari', [DonaturController::class, 'cari']);
Route::get('kategori_kegiatan-cari', [Kategori_KegiatanController::class, 'cari']);
Route::get('user-cari', [UserController::class, 'cari']);
Route::get('data_anak-cari', [Data_anakController::class, 'cari']);
Route::get('data_struktur-cari', [Data_strukturController::class, 'cari']);