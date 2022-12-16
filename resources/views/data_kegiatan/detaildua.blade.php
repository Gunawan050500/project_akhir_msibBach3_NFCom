@extends('landingpage.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail | Kegiatan</title>
</head>

<body>

<!-- Spinner Start -->
<!--div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </!--div-->
    <!-- Spinner End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5"
									@empty($row->foto)
                                <img src="{{url('admin/images/nophotos.png')}}" alt="">
                                @else
                                <img src="{{url('admin/img')}}/{{$row->foto}}" alt="">
                                @endempty
                        <h1 class="mb-4">{{ $row->nama }}</h1>
                        
                        <p>{{ $row->deskripsi }}</p>
                    </div>
                    <!-- Blog Detail End -->
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h6 class="mb-0">Categories</h6>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                                <i class="bi bi-arrow-right me-2"></i>Web Design</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                                <i class="bi bi-arrow-right me-2"></i>Web Development</a>
                        </div>
                    </div>
                    <!-- Category End -->
    
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h6 class="mb-0">Recent Post</h6>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{url('landingpage/img/blog-1.jpg')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                            </a>
                        </div>
                        
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{url('landingpage/img/blog-1.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
    
                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h6 class="mb-0">Tag Cloud</h6>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
                <!-- Sidebar End -->
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