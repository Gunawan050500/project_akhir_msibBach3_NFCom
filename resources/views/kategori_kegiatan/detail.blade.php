@extends('admin.index')
@section('content')
<div class="col-md-6 col-xl-4">
	<hr>
	<div class="card">
		<div class="card-body">
	    	<h5 class="card-title">Nama Kegiatan </h5>
			<h6 class="card-subtitle mb-2 text-muted">{{$row->nama}}</h6>
		</div>
	</div>
<a class="btn btn-info btn-sm" href="{{url('donatur')}}">Back</a>
</div>
@endsection