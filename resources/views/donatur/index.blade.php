@extends('admin.index')
@section('content')
<div class="col-md-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Donatur</h6>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="mt-3">
    {{--  <a class="bn btn-info btn" title="Tambah Donatur" href="{{route('donatur.create')}}"><i class="bi bi-file-plus-fill"></i></a>
    &nbsp;  --}}
    <a class="btn btn-info btn-sm ml-4" title="Tambah Donatur" href="{{route('donatur.create')}}"><i class="bi bi-file-plus-fill"></i>Tambah</a>
    &nbsp;
    <a class="btn btn-danger btn-sm" title="Export to PDF Donatur" href="{{url('donatur-pdf')}}"><i class="bi bi-filetype-pdf"></i></a>
    &nbsp;
    <a class="btn btn-success btn-sm" title="Export to Excel Donatur" href="{{url('donatur-excel')}}"><i class="bi bi-file-earmark-excel"></i></a>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no= 1; @endphp
                        @foreach ($donatur as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>
                            <form method="POST" action="{{route('donatur.destroy', $row->id)}}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm" title="Detail Donatur"
                                href="{{route('donatur.show', $row->id)}}">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" title="Ubah Donatur"
                                href="{{route('donatur.edit', $row->id)}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Donatur"
                                onclick="return confirm('Anda yakin data dihapus?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection