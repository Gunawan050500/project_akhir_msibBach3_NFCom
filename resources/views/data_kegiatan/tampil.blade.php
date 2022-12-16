
@extends('landingpage.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kategori Kegiatan</title>
</head>
<body>
     <!-- Spinner Start -->
     <!-- div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </!-->
    <!-- Spinner End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
						@foreach ($kegiatan as $row)
                        @if ($ar_kategori->id)
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" >
									@empty($row->foto)
                                <img src="{{url('admin/images/nophotos.png')}}" alt="Profile">
                                @else
                                <img src="{{url('admin/img')}}/{{$row->foto}}" alt="Profile">
                                @endempty
                                    <a class="position-absolute bottom-0 start-0 bg-dark text-white rounded-end mt-5 py-2 px-4" 
                                    href="">{{ $row->kategori->nama}}</a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ $row->tgl_kegiatan }}</small>
                                    </div>
                                    <h4 class="mb-3">{{ $row->nama }}</h4>
                                    <p>{{ $row->deskripsi }}</p>
                                    <a class="text-uppercase" href="{{route('data_kegiatan.show', $row->id)}}">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
						@endforeach


                
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            <nav aria-label="Page navigation">
                            <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a class="active" href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                            </div>
                            </nav>
                        </div>
                        
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-titlee section-titlee-sm position-relative pb-3 mb-4"></br>
                            <h6 class="mb-0">Categories</h6>
                        </div>
						@foreach ($ar_kategori as $baris)
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{route('data_kegiatan.show', $baris->id)}}">
                                <i class="bi bi-arrow-right me-2"></i>{{ $baris->nama}}</a>
                        </div>
						@endforeach
                    </div>
                    <!-- Category End -->
    
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-titlee section-titlee-sm position-relative pb-3 mb-4"></br>
                            <h6 class="mb-0">Recent Post</h6>
                        </div>
                        
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{url('landingpage/img/blog-3.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-titlee section-titlee-sm position-relative pb-3 mb-4"></br>
                            <h6 class="mb-0">Tag Cloud</h6>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
  
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('landingpage/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('landingpage/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('landingpage/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('landingpage/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{url('landingpage/js2/main.js')}}"></script>
</body>

</html>
@endsection