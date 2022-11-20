@extends('admin.index')
@section('content')
<div class="col-md-12">
    <h5 class="mt-5">Form User</h5>
    <hr>
    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahan saat Input data<br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{route('user.store')}}"
    enctype="multipart/form-data">
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

        <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" placeholder="email">
            </div>
        </div>

        <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="password" placeholder="password">
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
            <div class="col-sm-10">
                <div class="form-check ml-6" style="margin-left: 30%">
                    <div class="col-lg-7">
                        <input class="form-check-input" type="radio" name="status" value="ketua">
                        <label class="form-check-label" for="gridRadios1">
                            Ketua
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-check-input" type="radio" name="status" value="sekretaris">
                        <label class="form-check-label" for="gridRadios1">
                            Sekretaris
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-check-input" type="radio" name="status" value="bendahara">
                        <label class="form-check-label" for="gridRadios1">
                            Bendahara
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-check-input" type="radio" name="status" value="staff">
                        <label class="form-check-label" for="gridRadios1">
                            Staff
                        </label>
                    </div>

                </div>
            </div>
        </fieldset>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
            <div class="col-sm-10">
                <div class="form-check ml-6" style="margin-left: 30%">
                    <div class="col-lg-7">
                        <input class="form-check-input" type="radio" name="role" value="admin">
                        <label class="form-check-label" for="gridRadios1">
                            Admin
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-check-input" type="radio" name="role" value="pengurus">
                        <label class="form-check-label" for="gridRadios1">
                            Pengurus
                        </label>
                    </div>
                </div>
        </fieldset>

        <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="foto">
            </div>
        </div>
</div>
        <div class="text-center" style="margin-left: 27%">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a class="btn btn-secondary" href="{{url('user')}}">Cancel</a>
        </div>
@endsection