@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <h5 class="mt-5">Form Donatur</h5>
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
        <form method="POST" action="{{route('donatur.store')}}">
        @csrf
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">No Handphone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_hp" placeholder="No HP">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a class="btn btn-secondary" href="{{url('donatur')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection