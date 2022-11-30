<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_Kegiatan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
//ini extension data koneksinya
use App\Exports\Kategori_KegiatanExport;
// //ini yang vendor excellnya
use Maatwebsite\Excel\Facades\Excel;
//ini bagian untuk sweetaler
use RealRashid\SweetAlert\Facades\Alert;

class Kategori_KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kategori_kegiatan = Kategori_Kegiatan::orderBy('id', 'DESC')->paginate(10);
        return view('kategori_kegiatan.index', compact('kategori_kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori_kegiatan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:kategori_kegiatan|max:45',
            ],

            [
                'nama.required' => 'Nama Wajib diisi',
                'nama.max' => 'Jumlah katakter maksimal 45',
            ]
        );

        Kategori_Kegiatan::create($request->all());

        return redirect()->route('kategori_kegiatan.index')
            ->with('success', 'Kategori Kegiatan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Kategori_Kegiatan::find($id);
        return view('kategori_kegiatan.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Kategori_Kegiatan::find($id);
        return view('kategori_kegiatan.form_edit', compact('row'));
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
        //proses input kategori_kegiatan
        $request->validate([
            'nama' => 'required|max:45',
        ]);

        DB::table('kategori_kegiatan')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'updated_at' => now(),

            ]
        );

        return redirect()->route('kategori_kegiatan.index')
            ->with('success', 'Kategori_Kegiatan Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Kategori_Kegiatan::find($id);
        Kategori_Kegiatan::where('id', $id)->delete();
        return redirect()->route('kategori_kegiatan.index')
            ->with('success', 'Data Kategori_Kegiatan Berhasil dihapus');
    }

    public function kategori_kegiatanPDF()
    {
        $kategori_kegiatan = Kategori_Kegiatan::all();
        $pdf = PDF::loadView('kategori_kegiatan.kategori_kegiatanPDF', ['kategori_kegiatan' => $kategori_kegiatan]);
        return $pdf->download('data_kategori_kegiatan.pdf');
    }

    public function kategori_kegiatanExcel()
    {
        return Excel::download(new Kategori_KegiatanExport, 'data_kategori_kegiatan.xlsx');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $kategori_kegiatan = DB::table('kategori_kegiatan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        // mengirim data pegawai ke view index
        return view('kategori_kegiatan.index', compact('kategori_kegiatan'));
    }
}
