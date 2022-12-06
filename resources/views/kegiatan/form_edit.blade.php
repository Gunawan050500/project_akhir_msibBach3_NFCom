@extends('admin.index')
@section('content')
{{-- @php
$ar_kategori = App\Models\Kategori_Kegiatan::all();
@endphp --}}
<div class="col-md-12">
    <h5 class="mt-5">Form Kegiatan</h5>
    <hr>
    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahann saat Input data<br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{route('kegiatan.update', $row->id)}}"
    enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" value="{{$row->nama}}" placeholder="Nama kegiatan">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="tgl_kegiatan" value="{{$row->tgl_kegiatan}}"
                    placeholder="Tanggal kegiatan">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="deskripsi" style="height: 100px">{{ $row->deskripsi }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kategori Kegiatan</label>
            <div class="col-sm-5">
                <select class="form-select" name="kategori_id">
                    <option selected>-- Pilih Kategori Kegiatan --</option>
                    @foreach($ar_kategori as $kat)
                    @php $sel = ($kat->id == $row->kategori_id) ? 'selected' : ''; @endphp
                    <option value="{{ $kat->id }}" {{ $sel }}>{{ $kat->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputNumber" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input class="form-control" type="file" name="foto">
                @if(!empty($row->foto)) <img src="{{url('admin/img')}}/{{$row->foto}}" alt="Profile"
                    class="img-panel mt-2" style="width: 20%">
                <br />{{$row->foto}}
                @endif
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Ubah</button>
            <a class="btn btn-secondary" href="{{url('kegiatan')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection