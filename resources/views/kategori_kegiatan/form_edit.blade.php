@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <h5 class="mt-5">Form Kategori Kegiatan</h5>
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
        <form method="POST" action="{{route('kategori_kegiatan.update', $row->id)}}">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" value="{{$row->nama}}" placeholder="Nama kegiatan">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Ubah</button>
                <a class="btn btn-secondary" href="{{url('kategori_kegiatan')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection