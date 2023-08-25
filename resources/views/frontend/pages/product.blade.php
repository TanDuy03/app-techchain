@extends('frontend.index')

@section('title')
    Sản phẩm
@endsection

@section('search')
    @parent
@endsection

@section('header-pages')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Sản phẩm</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" onerror="this.src='/upload/img_error.jpg'" src="img/header.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection

@section('content')
    <!-- Property List Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="mb-5">
                <div class="container text-center">
                    <div class="row d-flex justify-content-center">
                        @foreach ($catePro as $item)
                            <a href="{{url('hang-san-xuat/'.$item->slug)}}" class="col-xl-2 col-md-5 rounded py-2 btn btn-outline-primary text-primary mx-2 my-1">
                                {{$item->ten_loai}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Sản phẩm</h1>
                        <p>
                            Đắm chìm trong thế giới laptop tuyệt vời! Chúng tôi cung cấp những chiếc laptop hàng đầu, 
                            mang đến cho bạn sự tiện lợi, hiệu suất mạnh mẽ và trải nghiệm tuyệt vời.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Mới nhất</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Bán chạy</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">Ưu đãi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($proNew as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden pro-top">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}"><img class="img-fluid w-100 h-100 border-bottom" onerror="this.src='/upload/img_error.jpg'" src="{{$item->hinh}}" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Sale
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-danger mb-3">{{number_format($item->gia_km, 0, '', ',')}} VNĐ</h5>
                                            <h5 class="text-dark mb-3 text-decoration-line-through">{{number_format($item->gia, 0, '', ',')}} VNĐ</h5>
                                        </div>
                                        <a class="h5 mb-2 pro-name" href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}">{{$item->ten_sp}}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hồ Chí Minh</p>
                                    </div>
                                    <div class="d-flex border-top d-flex justify-content-between align-items-center">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}" class="btn btn-warning text-white m-3 px-2 flex-fill">Xem</a>
                                        <a href="{{url('them-gio-hang/'.$item->id_sp.'/1')}}" class="btn btn-success m-3 px-2 flex-fill"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 d-flex justify-content-center text-center wow fadeInUp" data-wow-delay="0.1s">
                            {{$proNew->onEachSide(5)->links()}}
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($proView as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden pro-top">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}"><img class="img-fluid w-100 h-100 border-bottom" onerror="this.src='/upload/img_error.jpg'" src="{{$item->hinh}}" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Sale
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-danger mb-3">{{number_format($item->gia_km, 0, '', ',')}} VNĐ</h5>
                                            <h5 class="text-dark mb-3 text-decoration-line-through">{{number_format($item->gia, 0, '', ',')}} VNĐ</h5>
                                        </div>
                                        <a class="h5 mb-2 pro-name" href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}">{{$item->ten_sp}}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hồ Chí Minh</p>
                                    </div>
                                    <div class="d-flex border-top d-flex justify-content-between align-items-center">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}" class="btn btn-warning text-white m-3 px-2 flex-fill">Xem</a>
                                        <a href="{{url('them-gio-hang/'.$item->id_sp.'/1')}}" class="btn btn-success m-3 px-2 flex-fill"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($proPrice as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden pro-top">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}"><img class="img-fluid w-100 h-100 border-bottom" src="{{$item->hinh}}" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            Sale
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-danger mb-3">{{number_format($item->gia_km, 0, '', ',')}} VNĐ</h5>
                                            <h5 class="text-dark mb-3 text-decoration-line-through">{{number_format($item->gia, 0, '', ',')}} VNĐ</h5>
                                        </div>
                                        <a class="h5 mb-2 pro-name" href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}">{{$item->ten_sp}}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hồ Chí Minh</p>
                                    </div>
                                    <div class="d-flex border-top d-flex justify-content-between align-items-center">
                                        <a href="{{url('laptop/'.$item->id_sp.'/'.$item->slug)}}" class="btn btn-warning text-white m-3 px-2 flex-fill">Xem</a>
                                        <a href="{{url('them-gio-hang/'.$item->id_sp.'/1')}}" class="btn btn-success m-3 px-2 flex-fill"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Đánh giá từ khách hàng</h1>
                <p>
                    Những đánh giá này là những phản hồi chân thành từ khách hàng sau khi 
                    trải nghiệm và sử dụng sản phẩm hoặc dịch vụ của chúng tôi.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @php
                    $cmt = \DB::table('binhluan')->where('anHien', 1)
                    ->orderBy('ngayDang', 'DESC')->get();
                @endphp
                @foreach ($cmt as $item)
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p class="text-comment">{{$item->noiDung}}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{$item->hoTen}}</h6>
                                    <small>{{date('d/m/Y', strtotime($item->noiDung))}}</small>
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
