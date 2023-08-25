@extends('frontend.index')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- Category Start -->
        @include('frontend.widgets.category')
    <!-- Category End -->

    <!-- About End -->
        @include('frontend.widgets.about')
    <!-- About End -->

    <!-- Category Start -->
        @include('frontend.widgets.product')
    <!-- Category End -->

    <!-- Category Start -->
        @include('frontend.widgets.contact')
    <!-- Category End -->

    <!-- Category Start -->
        @include('frontend.widgets.team')
    <!-- Category End -->

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