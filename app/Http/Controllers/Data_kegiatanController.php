<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Kategori_Kegiatan;
use Illuminate\Support\Facades\DB;

class Data_kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $ar_kategori = Kategori_Kegiatan::all();
        $kegiatan = Kegiatan::all();
        return view('data_kegiatan.index', compact('kegiatan', 'ar_kategori'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baris = Kategori_Kegiatan::find($id);
        $row = Kegiatan::find($id);
        return view('data_kegiatan.detail', compact('row', 'baris'));
    }

    public function showdua($id)
    {
        $baris = Kategori_Kegiatan::find($id);
        $row = Kegiatan::find($id);
        return view('data_kegiatan.detaildua', compact('row', 'baris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function tampil()
    // {
    //     //menampilkan seluruh data
    //     $ar_kategori = Kategori_Kegiatan::all();
    //     $kegiatan = Kegiatan::all();
    //     return view('data_kegiatan.indexdua', compact('kegiatan', 'ar_kategori'));
    // }
}
