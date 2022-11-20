@extends('admin.index')
@section('content')
<div class="col-md-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="mt-3">
        <a class="btn btn-info btn-sm ml-4" title="Tambah User" href="{{route('user.create')}}"><i class="bi bi-file-plus-fill"></i>Tambah</a>
        &nbsp;
        <a class="btn btn-danger btn-sm" title="Export to PDF User" href="{{url('user-pdf')}}"><i class="bi bi-filetype-pdf"></i></a>
        &nbsp;
        <a class="btn btn-success btn-sm" title="Export to Excel User" href="{{url('user-excel')}}"><i class="bi bi-file-earmark-excel"></i></a
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
                            <th>Foto</th>
                            <th>Aksi</th>
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
                                @empty($row->foto)
                                <img src="{{url('admin/images/no_photo.png')}}" alt="Profile" class="rounded-circle" style="width: 40%">
                                @else
                                <img src="{{url('admin/images')}}/{{$row->foto}}" alt="Profile" class="rounded-circle" style="width: 40%">
                                @endempty
                            </td>
                            <td>
                            <form method="POST" action="{{route('user.destroy', $row->id)}}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm" title="Detail User"
                                href="{{route('user.show', $row->id)}}">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" title="Ubah User"
                                href="{{url('user-edit', $row->id)}}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus User"
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