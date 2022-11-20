@extends('admin.index')
@section('content')
<div class="col-md-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Donasi</h6>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="mt-3">
        <a class="bn btn-info btn-sm" href="{{route('donasi.create')}}" title="Tambah Donatur">Tambah</a>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Tanggal Donasi</th>
                            <th>Jumlah Donasi</th>
                            <th>Nama Donatur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no= 1; @endphp
                        @foreach ($donasi as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>{{ $row->tgl_donasi }}</td>
                            <td>{{ $row->jml_donasi }}</td>
                            <td>{{ $row->donatur->nama }}</td>
                            <td>
                            <a title="Detail Donatur" href="{{ route('donasi.show',$row->id) }}">
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