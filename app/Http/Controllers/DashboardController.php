<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Donasi;

class DashboardController extends Controller
{
    public function index()
    {
        $ar_donasi = DB::table('donasi')-> select ('tgl_donasi', 'jml_donasi')->get();
        $ar_tempatlahir = DB::table('anak_asuh')
                -> selectRaw ('tmp_lahir, count(tmp_lahir) as jumlah')
                -> groupBy('tmp_lahir')
                -> get();
        $ar_pendidikan = DB::table('anak_asuh')
                -> selectRaw ('pendidikan, count(pendidikan) as jumlah')
                -> groupBy('pendidikan')
                -> get();
        $ar_gender = DB::table('anak_asuh')
                ->selectRaw('gender, count(gender) as jumlah')
                ->groupBy('gender')
                ->get();
        return view('dashboard.index', compact('ar_donasi', 'ar_gender', 'ar_pendidikan', 'ar_tempatlahir'));
    }
}
