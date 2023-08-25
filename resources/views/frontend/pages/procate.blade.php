@extends('frontend.index')

@section('title')
    Laptop {{$catePro->ten_loai}}
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
                            <li class="breadcrumb-item"><a href="{{route('product')}}">Sản phẩm</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">{{$catePro->ten_loai}}</li>
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
    @parent
@endsection

@section('content')
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-3 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Laptop {{$catePro->ten_loai}}</h1>
                        {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row g-0 p-2 alert alert-warning mb-3 w-100" role="alert">
                <span class="text-center">Tìm thấy {{$totalPro}} sản phẩm.</span>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($product as $item)
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
                        <div class="d-flex justify-content-center">
                            <div class="mt-3">
                                {{ $product->onEachSide(6)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection
