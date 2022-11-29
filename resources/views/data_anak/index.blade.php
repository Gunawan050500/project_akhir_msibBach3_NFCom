@extends('landingpage.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data Anak Asuh</h6>
    </div>
    <div class="row">
    <div class="col-6">
    </div>
        <div class="col-6 my-2 mx-2">
        <nav class="justify-content-between mr-4" style="width: 40%">
            <form class="form-inline" action="{{url('data_anak-cari')}}" method="GET">
                <input class="form-control mr-sm-2 form-sm" type="text" name="cari" placeholder="Search"
                    aria-label="Search" value="{{ old('cari') }}">
                <input class="btn btn-outline-success" type="submit" value="Cari">
            </form>
        </nav>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="70%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th>
                        <th>Pendidikan</th>
                        <th>Detail</th>
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
                            <a class="btn btn-info btn-sm" title="Detail Anak Asuh"
                                href="{{route('data_anak.show', $row->id)}}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br/>
        Halaman : {{ $anak_asuh->currentPage() }} <br />
        Jumlah Data : {{ $anak_asuh->total() }} <br />
        Data Per Halaman : {{ $anak_asuh->perPage() }} <br/>
        {{--  {{ $anak_asuh->links() }}  --}}
    </div>
</div>
</div>
@endsection