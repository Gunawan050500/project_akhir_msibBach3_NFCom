<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Anak_asuhController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::get('donatur-pdf', [DonaturController::class, 'donaturPDF']);
Route::get('donatur-excel', [DonaturController::class, 'donaturExcel']);

Route::get('user-pdf', [UserController::class, 'userPDF']);
Route::get('user-excel', [UserController::class, 'userExcel']);
Route::get('dashboard', [DashboardController::class, 'index']);

// Route::get('donatur-edit/{id}', [DonaturController::class, 'edit']);
Route::get('user-edit/{id}', [UserController::class, 'edit']);