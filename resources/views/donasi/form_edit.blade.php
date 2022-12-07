@extends('admin.index')
@section('content')
{{-- @php 
$ar_kategori = App\Models\Kategori_Kegiatan::all();
@endphp --}}
    <div class="col-md-12">
        <h5 class="mt-5">Form Donasi</h5>
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
        <form method="POST" action="{{route('donasi.update', $row->id)}}">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" style="height: 100px">{{$row->keterangan}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Tanggal Donasi</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="tgl_donasi" value="{{$row->tgl_donasi}}" placeholder="Tanggal Donasi">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Jumlah Donasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jml_donasi" value="{{$row->jml_donasi}}" placeholder="Jumlah Donasi">
                </div>
            </div>
            

            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Donatur</label>
            <div class="col-sm-5">
                <select class="form-select" name="donatur_id">
                    <option selected class="text-center">-- Pilih Donatur --</option>
                    @foreach($ar_donatur as $don)
                    @php $sel = ($don->id == $row->donatur_id) ? 'selected' : ''; @endphp
                    <option value="{{ $don->id }}" {{ $sel }}>{{ $don->nama }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="text-left">
                <button type="submit" title="Simpan Donasi" class="btn btn-success">Ubah</button>
                <a class="btn btn-secondary" title="Kembali" href="{{url('donasi')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection