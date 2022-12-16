@extends('admin.index')
@section('content')
<section style="background-color: #eee;" class="col-md-12">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
          <div class="card-body text-center">
            @empty($data->foto)
              <img src="{{url('admin/images/no_photo.png')}}" alt="Profile" class="rounded-circle" style="width:40%; margin-top: 10%; margin-left: 20%">
            @else
              <img src="{{url('admin/images')}}/{{$data->foto}}" alt="Profile" class="rounded-circle" style="width:40%; margin-top: 10%">
            @endempty
            <h5 class="my-1">{{$data->nama }}</h5>
            <p class="text-muted">{{$data->status}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <h5>Details</h5>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">No. Handphone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->no_hp }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->password }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Role</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->role }}</p>
              </div>
            </div>
            <hr>
          </div>
        </div>
    <div>
          {{--  <a class="btn btn-info btn-sm mx-2" href="{{route('profile-edit.edit', Auth::user()->id)}}">Ubah Profile</a>  --}}
          <a class="btn btn-info btn-sm" href="{{route('profile.edit',$data->id)}}">Ubah Profile</a>
          <a class="btn btn-info btn-sm" href="{{url('administrator')}}">Back</a>
        </div>
      </div>
    </div>
  </div>
@endsection