@extends('landingpage.index')
@section('content')
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Struktur</h6>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-6">
                    <nav class="justify-content-between mr-4" style="width: 70%">
                        <form class="form-inline" action="{{url('data_struktur-cari')}}" method="GET">
                            <input class="form-control mr-sm-2 form-sm" type="text" name="cari" placeholder="Search"
                                aria-label="Search" value="{{ old('cari') }}">
                            <input class="btn btn-outline-success" type="submit" value="Cari">
                        </form>
                    </nav>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Handphone</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no= 1; @endphp
                            @foreach ($user as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->no_hp }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->password }}</td>
                                <td>{{ $row->status }}</td>
                                <td>{{ $row->role }}</td>
                                <td>
                                    {{-- <form method="POST" action="{{route('user.destroy', $row->id)}}"> --}}
                                            <a class="btn btn-info btn-sm" title="Detail User"
                                                href="{{route('data_struktur.show', $row->id)}}">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br />
                Halaman : {{ $user->currentPage() }} <br />
                Jumlah Data : {{ $user->total() }} <br />
                Data Per Halaman : {{ $user->perPage() }} <br/>
                {{--  {{ $kategori_kegiatan->links() }}  --}}
            </div>
        </div>
    </div>
    {{--  //ini mengambil dari kelas di (show-alert-delete-box)  --}}
    @endsection