@extends('admin.index')
@section('content')

 <!-- [ breadcrumb ] start -->
 <di class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Master Data</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Kegiatan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </di>
        <!-- [ breadcrumb ] end -->

<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Kegiatan</h6>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="mt-3">

            <div class="row">
                <div class="col-6">
                    <a class="btn btn-info btn-sm ml-4" title="Tambah Kegiatan" href="{{route('kegiatan.create')}}">
                    <i class="fas fa-plus"> add</i></a> 
                    &nbsp;
                    <a class="btn btn-danger btn-sm" title="Export to PDF Kegiatan" href="{{url('kegiatan-pdf')}}"><i
                            class="fas fa-file-pdf"></i></a>
                    &nbsp;
                    <a class="btn btn-success btn-sm" title="Export to Excel Kegiatan" href="{{url('kegiatan-excel')}}"><i
                            class="fas fa-file-excel"></i></a>
                </div>
                &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="col-4">
                <nav class="justify-content-between mr-4" style="width: 100%">
                    <form class="form-inlinee" action="{{url('kegiatan-cari')}}" method="GET">
                        <input class="form-controll mr-sm-2 form-sm" type="text" name="cari" placeholder="Search"
                            aria-label="Search" value="{{ old('cari') }}">
                        <button class="btn btn-outline-success" type="submit" value="Cari">
                        <i class="bi bi-search"></i></button>
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
                            <th>Tanggal Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Kategori Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no= 1; @endphp
                        @foreach ($kegiatan as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->tgl_kegiatan }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>{{ $row->kategori_id }}</td>
                            <td>
                            {{-- <form method="POST" action="{{route('Kategori_Kegiatan.destroy', $row->id)}}"> --}}
                                <form method="POST" id="formHapus">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info btn-sm" title="Detail Kegiatan"
                                        href="{{ route('kegiatan.show', $row->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" title="Ubah Kegiatan"
                                        href="{{ route('kegiatan.edit', $row->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm btnHapus"
                                        title="Hapus Kegiatan" data-action="{{ route('kegiatan.destroy', $row->id) }}"
                                        {{-- onclick="return confirm('Anda yakin data dihapus?')" --}}>
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br />
            {{-- Halaman : {{ $kegiatan->currentPage() }} <br />
            Jumlah Data : {{ $kegiatan->total() }} <br />
            Data Per Halaman : {{ $kegiatan->perPage() }} <br/> --}}
            {{--  {{ $kegiatan->links() }}  --}}
        </div>
    </div>
</div>
{{--  //ini mengambil dari kelas di (show-alert-delete-box) --}} 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '.btnHapus', function (e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formHapus').attr('action', action);
                $('#formHapus').submit();
            }
        })
    }) 
</script>
@endsection