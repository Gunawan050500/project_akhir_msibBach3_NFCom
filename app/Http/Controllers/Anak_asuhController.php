<?php

namespace App\Http\Controllers;

use App\Models\Anak_asuh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Anak_asuhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $anak_asuh = Anak_asuh::orderBy('id', 'DESC')->paginate(10);
        return view('anak_asuh.index', compact('anak_asuh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ar_gender = ['Laki-Laki', 'Perempuan'];
        //arahkan ke form input data
        return view('anak_asuh.form', compact('ar_gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input pegawai
        $request->validate([
            'nama' => 'required|max:45',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'pendidikan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        //Pegawai::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if (!empty($request->foto)) {
            $fileName = 'foto-' . $request->nama . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/images'), $fileName);
        } else {
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('anak_asuh')->insert(
            [
                'nama' => $request->nama,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'foto' => $fileName,
                'created_at' => now(),
            ]
        );

        return redirect()->route('anak_asuh.index')
            ->with('success', 'Data Pegawai Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Anak_asuh::find($id);
        return view('anak_asuh.detail', compact('row'));
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
}
