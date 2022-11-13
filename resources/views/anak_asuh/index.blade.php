@extends('admin.index')
@section('content')
<div class="col-md-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Anak Asuh</h6>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="mt-3">
        <a class="bn btn-info btn-sm" href="{{route('anak_asuh.create')}}" title="Tambah Donatur">Tambah</a>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Pendidikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no= 1; @endphp
                        @foreach ($anak_asuh as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->tmp_lahir }}</td>
                            <td>{{ $row->tgl_lahir }}</td>
                            <td>{{ $row->gender }}</td>
                            <td>{{ $row->pendidikan }}</td>
                            <td>
                            <a title="Detail Anak Asuh" href="{{ route('anak_asuh.show',$row->id) }}">
                            <i class="fa fa-eye"></i>
                            </a>
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