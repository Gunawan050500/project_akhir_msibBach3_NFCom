<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Anak_asuhController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;

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

Route::resource('anak_asuh', Anak_asuhController::class);
Route::resource('donatur', DonaturController::class);
Route::resource('donasi', DonasiController::class);
