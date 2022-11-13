<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/donasi', function () {
    return view('landingpage.donasi');
});
