@extends('admin.index')
@section('content')
<div class="col-md-12">
    <h5 class="mt-5">Form Kegiatan</h5>
    <hr>
    {{-- @if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahann saat Input data<br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <form method="POST" action="{{route('kegiatan.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{old('nama')}}" placeholder="Nama Kegiatan">
                @error('nama')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-9">
                <input type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror" name="tgl_kegiatan"
                    value="{{old('tgl_kegiatan')}}" placeholder="Tanggal Kegiatan">
                @error('tgl_kegiatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="deskripsi" style="height: 100px">{{old('deskripsi')}}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Kategori Kegiatan</label>
            <div class="col-sm-5">
                <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
                    <option selected>-- Pilih Kategori --</option>
                    @foreach($ar_kategori as $kat)
                    @php
                    $sel = (old('kategori_id') == $kat->id)? 'selected':'';
                    @endphp
                    <option value="{{ $kat->id }}" {{ $sel }}>{{ $kat->nama }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row my-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input class="form-control" type="file" name="foto">
            </div>
        </div>

        <div class="text-left">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a class="btn btn-secondary" href="{{url('kegiatan')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection