<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
//ini extension data koneksinya
use App\Exports\KegiatanExport;
use App\Models\Kategori_Kegiatan;
// //ini yang vendor excellnya
use Maatwebsite\Excel\Facades\Excel;
//ini bagian untuk sweetaler
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kegiatan = Kegiatan::orderBy('id', 'DESC')->paginate(10);
        return view('kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ar_kategori = Kategori_Kegiatan::all();
        return view('kegiatan.form', compact('ar_kategori'));
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
                'nama' => 'required|max:45',
                'tgl_kegiatan' => 'required',
                'deskripsi' => 'required',
                'kategori_id' => 'required',
            ],

            [
                'nama.required' => 'Nama Wajib diisi',
                'nama.max' => 'Jumlah katakter maksimal 45',
                'tgl_kegiatan.required' => 'Tanggal Kegiatan Wajib diisi',
                'deskripsi.required' => 'Deskripsi Kegiatan Wajib diisi',
                'kategori_id.required' => 'Kategori Kegiatan Wajib diisi',
            ]
        );

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Kegiatan::find($id);
        return view('kegiatan.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ar_kategori = Kategori_Kegiatan::all();
        $row = Kegiatan::find($id);
        return view('kegiatan.form_edit', compact('ar_kategori', 'row'));
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
        $request->validate([
            'nama' => 'required|max:45',
            'tgl_kegiatan' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        DB::table('kegiatan')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori_id,
                'updated_at' => now(),

            ]
        );

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Kegiatan::find($id);
        Kegiatan::where('id', $id)->delete();
        return redirect()->route('kegiatan.index')
            ->with('success', 'Data Kegiatan Berhasil dihapus');
    }

    public function kegiatanPDF()
    {
        $kegiatan = Kegiatan::all();
        $pdf = PDF::loadView('kegiatan.kegiatanPDF', ['kegiatan' => $kegiatan]);
        return $pdf->download('data_kegiatan.pdf');
    }

    public function kegiatanExcel()
    {
        return Excel::download(new KegiatanExport, 'data_kegiatan.xlsx');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $kegiatan = DB::table('kegiatan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        // mengirim data pegawai ke view index
        return view('kegiatan.index', compact('kegiatan'));
    }
}
