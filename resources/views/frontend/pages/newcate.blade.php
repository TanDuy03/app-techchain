@extends('frontend.index')

@section('header-pages')
    <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Tin tức</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Tin tức</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="/img/newww.jpg" alt="">
                </div>
            </div>
        </div>
    <!-- Header End -->
@endsection

@section('search')
    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <form action="{{route('search')}}" method="get" class="d-flex">
                    <div class="col-md-10">
                        <input type="text" name="tukhoa" class="form-control border-0 py-3" placeholder="Nhập từ khóa tại đây...">
                    </div>
                    <div class="px-2"></div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3" type="submit">Tìm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search End -->
@endsection

@section('content')
    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-uppercase">Tin tức trong ngày</h1>
                <p>Luôn cập nhập tất cả tin tức trong tức trong nước và quốc tế một cách nhanh chóng và chính xác.</p>
            </div>
            @foreach ($loaitin as $key => $row)
                @if ($key == 0)
                    @section('title')
                       Tin {{$row->ten}}
                    @endsection
                    <div class="bg-danger rounded p-2 mb-3">
                        <h5 class="text-white my-0 text-center">Tin tức {{$row->ten}}</h5>
                    </div>
                @endif
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" onerror="this.src='/upload/img_error.jpg'" src="../{{ $row->urlHinh }}" alt=""
                                    style="height:300px; object-fit: cover;">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">{{ $row->tieuDe }}</h1>
                                    <p>{{ $row->tomTat }}.</p>
                                </div>
                                <a href="/chi-tiet/{{ $row->slug}}.html" class="btn btn-primary py-3 px-4 me-2">
                                    Xem chi tiết <i class="fas fa-arrow-right"></i>
                                </a>
                                <a href="" class="btn btn-dark py-3 px-4"><i
                                        class="fa fa-calendar-alt me-2"></i>{{ date('d/m/Y', strtotime($row->ngayDang)) }}</a>
                                <button type="button" class="btn btn-warning text-white position-relative py-3 px-3">
                                    Lượt xem
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $row->xem }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="w-100 d-flex justify-content-center">
                <div class="mt-3">
                    {{ $loaitin->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
