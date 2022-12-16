<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {
        $data = User::where('id', Auth::user()->id)->first()->get();
        return view('profile.indexdua', compact('data'));
    }

    public function edit($id)
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('profile.form_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        //proses form input user
        $request->validate([
            'nama' => 'required|max:20',
            'no_hp' => 'required',
            // 'email' => 'required|unique:users',
            'password' => 'required',
            'status' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gift,svg|max:2048',
        ]);

        //apakah user inin upload foto
        if (!empty($request->foto)) {
            //$fileName = $request->foto->getClientOriginal
            $fileName = 'foto-' . $request->email. '.' . $request->foto->extension();
            //Ini figunakan untuk meletakkan fotonya di mana
            $request->foto->move(public_path('admin/images'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan insert data dari request form
        $data = User::where('id', Auth::user()->id)->first();
        return redirect()->route('profile.index', $data->id)
            ->with('success', 'User Berhasil Disimpan');
    }
}
