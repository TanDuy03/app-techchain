@extends('frontend.index')

@section('title')
    {{ $detailNew->tieuDe }}
@endsection

@section('search')
@endsection

@section('header-pages')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Tin tức</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Chi tiết</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">{{ $detailNew->tieuDe }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="/img/newww.jpg" alt="" style="width: 675px; height: 472px;">
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection

@section('content')
    <!-- Call to Action Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row">
                        <div class="col-xl-8">
                            <h2 class="m-0 text">{{ $detailNew->tieuDe }}</h2>
                            <hr>
                            <div class="">
                                <ul class="list-group-flush d-flex p-0">
                                    <li class="d-flex p-0 align-items-center" style="font-size: 14px;"><i
                                            class="fas fa-list"></i>&nbsp; Tin <a href="#"
                                            class="ms-1">{{ $detailNew->ten }}</a></li>
                                    <li class="d-flex ms-4 align-items-center" style="font-size: 14px;"><i
                                            class="far fa-calendar-alt"></i>&nbsp;
                                        {{ date('d-m-Y', strtotime($detailNew->ngayDang)) }}</li>
                                    <li class="d-flex ms-4 align-items-center" style="font-size: 14px;"><i
                                            class="fas fa-pen"></i>&nbsp; Bởi <a href="#" class="ms-1">{{$detailNew->nguoiDang}}</a>
                                    </li>
                                    <li class="d-flex ms-4 align-items-center" style="font-size: 14px;"><i
                                            class="fas fa-eye"></i>&nbsp; {{ $detailNew->xem }}</li>
                                    <li class="d-flex ms-4 align-items-center" style="font-size: 14px;"><i
                                            class="fas fa-comment"></i>&nbsp;<a href="#" class="ms-1">23</a></li>
                                </ul>
                            </div>
                            <div class="card mb-3 border-0">
                                <img src="/{{ $detailNew->urlHinh }}" onerror="this.src='/upload/img_error.jpg'" class="card-img-top" alt="...">
                                <div class="card-body p-0 mt-2">
                                    <p class="card-text text-justify">{!! $detailNew->noiDung !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row mt-5">
                                <h4>Tin mới đăng</h4>
                                @foreach ($tinnew as $item)
                                    @if ($detailNew->slug !== $item->slug)
                                        <div class="card mb-3 p-0" style="width: 100%;">
                                            <img src="/{{ $item->urlHinh }}" class="card-img-top" alt="{{ $item->tieuDe }}"
                                                style="height: 200px;">
                                            <div class="card-body">
                                                <a href="{{route('detail', $item->slug)}}" class="card-text">
                                                    {{ $item->tieuDe }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="row">
                                <h4>Thể loại</h4>
                                @foreach ($listloai as $ll)
                                    <a href="{{ url('loai-tin', $ll->slug) }}"
                                        class="col-5 ms-2 mb-2 btn btn-outline-primary text-primary">{{ $ll->ten }}</a>
                                @endforeach
                            </div>
                            <div class="row">
                                <h4>Tags</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Social --}}
            <div class="p-3 mt-3" style="border-top: 1px solid #71b4eb;">
                <h6>Chia sẻ</h6>
                <div class="ms-3">
                    <a href="#" class="btn btn-outline-primary text-primary px-3">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="#" class="btn btn-outline-secondary px-3">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="#" class="btn btn-outline-primary text-primary px-3">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                </div>
            </div>
            {{--  --}}
            <div class="text-center mx-auto wow fadeInUp mt-5" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-uppercase text-center">Tin xem nhiều</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp mt-3" data-wow-delay="0.1s">
                @foreach ($viewNew as $item)
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>{{ $item->tieuDe }}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="/{{ $item->urlHinh }}"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Lượt xem: {{ $item->xem }}</h6>
                                    <small>{{ date('d/m/Y', strtotime($item->ngayDang)) }}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('detail', $item->slug)}}" class="btn btn-primary">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--  --}}
            {{-- <section>
                <div class="container-fluid my-5 py-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10 col-xl-8">
                            @if(!$cmt)
                                <div class="row">
                                    <form action="" method="post" class="p-0">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-9">
                                                <input type="text" class="form-control" placeholder="Nhập nội dung...">
                                            </div>
                                            <button class="col-2 ms-2 btn btn-primary">Bình luận</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                @foreach ($cmt as $item)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex flex-start align-items-center">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="/img/user.png"
                                                    alt="avatar" width="60" height="60" />
                                                <div>
                                                    <h6 class="fw-bold text-primary mb-1">{{$item->hoTen}}</h6>
                                                    <p class="text-muted small mb-0">
                                                        Công khai - {{date('d/m/Y', strtotime($item->ngayDang))}}
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-4 pb-2">
                                                {{$item->noiDung}}
                                            </p>
                                            <div class="small d-flex justify-content-start">
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="far fa-thumbs-up me-2"></i>
                                                    <p class="mb-0">Thích</p>
                                                </a>
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="far fa-comment-dots me-2"></i>
                                                    <p class="mb-0">Bình luận</p>
                                                </a>
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="fas fa-share me-2"></i>
                                                    <p class="mb-0">Chia sẻ</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                            <div class="d-flex flex-start w-100">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="/img/user.png"
                                                    alt="avatar" width="40" height="40" />
                                                <div class="form-outline w-100">
                                                    <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                    <label class="form-label" for="textAreaExample">Nội dung</label>
                                                </div>
                                            </div>
                                            <div class="float-end mt-2 pt-1">
                                                <button type="button" class="btn btn-primary btn-sm">Gửi</button>
                                                <button type="button" class="btn btn-outline-primary btn-sm">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>
    </div>
    </div>
    <!-- Call to Action End -->
@endsection
