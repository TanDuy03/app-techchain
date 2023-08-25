@extends('frontend.index')

@section('title')
    Laptop {{ $proDetail->ten_sp }}
@endsection

@section('header-pages')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Sản phẩm</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{url('hang-san-xuat', $proCate->slug)}}">{{$proCate->ten_loai}}</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">{{ $proDetail->ten_sp }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="/img/contact_img.jpg" alt="" style="width: 675px; height: 472px;">
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection

@section('search')
@endsection

@section('content')
    <div class="container mt-5 box-detail wow fadeInUp">
        <div class="row row-detail">
            <div class="col-lg-5 col-md p-3">
                <img src="{{asset($proDetail->hinh)}}" onerror="this.src='/upload/img_error.jpg'" alt="" class="w-100 img-detail rounded">
            </div>
            <div class="col-lg-7 col-md-6 p-3">
                <div class="card border-0">
                    <div class="card_body">
                        <h1 class="fs-3">{{$proDetail->ten_sp}}</h1>
                        <div class="d-flex align-items-center mt-3">
                            <h2 class="me-3 price_new">{{number_format($proDetail->gia_km,0, ',',',')}} VNĐ</h2>
                            <h5 class="ms-5 fw-normal" style="text-decoration: line-through;">{{number_format($proDetail->gia,0, ',',',')}} VNĐ</h5>
                        </div>
                        <div class="mt-4">
                            <span class="fs-5">Màu sắc</span>
                            <div class="ms-3">
                                <a href="" class="btn btn-primary w-25">Trắng</a>
                                <a href="" class="btn btn-outline-primary w-25 ms-3 text-primary">Xám</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="fs-5">Thông số</span>
                            <div class="col-10 d-flex ms-3">
                                <div class="btn btn-outline-primary p-2 text-center rounded  text-primary">RAM {{$proDetail->RAM}}</div>
                                <div class="btn btn-outline-primary ms-2 p-2 text-center rounded  text-primary">{{$proDetail->Dia}} SSD</div>
                                <div class="btn btn-outline-primary ms-2 p-2 text-center rounded  text-primary">Core {{$proDetail->CPU}}</div>
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div>
                            <a href="{{url('them-gio-hang/'.$proDetail->id_sp.'/1')}}" class="btn btn-success w-25">Mua ngay <i class="fab fa-amazon-pay"></i></a>
                            <a href="{{route('product')}}" class="btn btn-danger w-25 ms-3">Mua thêm <i class="fas fa-shopping-bag"></i></a>
                            <a href="#" class="btn btn-warning text-white w-25 ms-3">Hướng dẫn <i class="fas fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Sản phẩm liên quan</h1>
                {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --}}
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($splienquan as $item)
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <div class="d-flex">
                                <img class="img-fluid flex-shrink-0 rounded border w-50 h-100 p-2" src="{{$item->hinh}}" style="width: 45px; height: 45px;">
                                <div class="ps-3 mt-2">
                                    <h5 class="fw-bold mb-1 pro-name">{{$item->ten_sp}}</h6>
                                    <h6 class="text-danger fw-bold mt-2">{{number_format($item->gia_km,0, ',',',')}} VNĐ</h6>
                                    <div class="mt-3 d-flex">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}" class="btn btn-warning flex-fill border-0 text-white"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('them-gio-hang/'.$item->id_sp.'/1')}}" class="btn btn-success flex-fill ms-2"><i class="fas fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@push('css-prodetail')
    <style>
        .box-detail {
            box-shadow: 0 5px 20px rgba(8, 8, 8, 0.05);
            border-radius: 13px;
        }
        .box-detail .row img {
            width: 360px;
            height: 400px;
            border-radius: 13px;
            background: #ffffff;
            box-shadow:  7px 7px 24px #e6e6e6,
                        -7px -7px 24px #ffffff;
        }
        .price_new {
            color: #ff0000;
        }

        @media (max-width: 576px) {
            .row-detail {
                margin: 1rem;
            }
            .row-detail .img-detail{
                width: 100% !important;
            }
        }
    </style>
@endpush