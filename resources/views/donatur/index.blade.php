@extends('admin.index')
@section('content')
<div class="card mb-4 mx-auto">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Donatur
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="mt-3">
        <a class="bn btn-info btn-sm" href="{{route('donatur.create')}}" title="Tambah Donatur">Tambah</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Handphone</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            @php 
                $no = 1;
            @endphp
            @foreach ($donatur as $row)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->no_hp}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" title="Detail Donatur" href="{{route('donatur.show', $row->id)}}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--  <div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Data Donatur</span></h5>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div>
                <a class="bn btn-info btn-sm" href="{{route('donatur.create')}}">Tambah</a>
            </div>


            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;
                    @endphp

                    @foreach ($donatur as $row)
                    <tr>
                        <th scope="row">{{ $no++}}</th>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->no_hp}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" title="Detail Donatur"
                                href="{{route('donatur.show', $row->id)}}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>  --}}
@endsection