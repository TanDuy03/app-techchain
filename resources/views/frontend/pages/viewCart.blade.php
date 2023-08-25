@extends('frontend.layouts.master')

@section('title')
    Giỏ hàng của bạn
@endsection

@section('header-pages')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Giỏ hàng</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                        {{-- <li class="breadcrumb-item text-body active" aria-current="page">{{ $detailNew->tieuDe }}</li> --}}
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
@section('search')
@endsection
@section('content')
    <div class="container mt-5 rounded" id="container__order">
        <div class="row p-3">
            <a href="{{route('product')}}" class="text-primary"><i class="fas fa-arrow-left"></i> Tiếp tục mua hàng</a>
            <div class="col-8">
                <div class="row p-2">
                    @php
                        $tongtien=0; $tongsoluong=0;
                    @endphp
                    @foreach ($cart as $item)
                        @php
                            $id_sp = $item['id_sp'];            
                            $soluong = $item['soluong'];
                            $ten_sp = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('ten_sp');
                            $gia = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('gia_km');
                            $hinh = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('hinh');
                            $thanhtien = $gia*$soluong;
                            $tongtien+=$thanhtien; 
                            $tongsoluong+=$soluong; 
                            $thanhtien = number_format($thanhtien,0,',','.') ;
                            $gia = number_format($gia,0,',','.') ;
                        @endphp
                        <div class="col-2 p-0" style="width: 100px; height: 100px;">
                            <img class="w-100 rounded h-100 border" src="{{asset($hinh)}}" alt="">
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <span class="text-pro">{{$ten_sp}}</span>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="minus btn btn-outline-primary rounded-0">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="{{$soluong}}" class="btn btn-outline-primary rounded-0 quality" id="quality">
                                <button class="plus btn btn-outline-primary rounded-0">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-between">
                            <span>{{$gia}} VNĐ</span>
                            <a href="{{route('delCart',$id_sp)}}" onclick="return confirm('Bạn muốn xóa?')" class="btn text-danger p-0">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="border-bottom my-3"></div>
                    @endforeach
                    <!--  -->
                    <div class="d-flex justify-content-end me-5">
                        <span class="fw-bold fs-5">Tổng: </span>
                        <span class="px-3 fs-5 fw-bold text-price">{{number_format($tongtien, 0,',','.')}} VNĐ</span>
                    </div>
                    <!--  -->
                </div>
            </div>
            <div class="col-4 info__cart">
                <h4 class="text-center mt-3">Thông tin đặt hàng</h4>
                <div class="row mt-2 p-2">
                    <form action="{{route('order_cart', $id_sp)}}" method="POST">
                        @csrf @method('POST')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ tên</label>
                            <input type="text" name="orname" value="{{old('orname')}}" class="form-control" id="exampleFormControlInput1" placeholder="Đỗ Hương Nhi">
                            <span class="text-danger fst-italic">
                                @error('orname')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Điện thoại</label>
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="exampleFormControlInput2" placeholder="0368.999.939">
                            <span class="text-danger fst-italic">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control" id="exampleFormControlInput3" placeholder="Hồ Chí Minh">
                            <span class="text-danger fst-italic">
                                @error('address')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Mã giảm giá (*)</label>
                            <input type="text" name="price-sale" class="form-control" id="exampleFormControlInput3" placeholder="Nếu có">
                            <span class="text-danger fst-italic">
                                @error('price-sale')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <button class="w-100 btn btn-primary my-2">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css-prodetail')
    <style>
        #container__order {
            box-shadow: 0 5px 20px rgba(37, 35, 35, 0.05);
        }
        .info__cart {
            background-color: #EFFDF5;
        }
        .text-pro {
            word-break: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-height: 24px; 
            max-height: 72px; 
            -webkit-line-clamp: 2; 
            -webkit-box-orient: vertical;
        }
        .quality {
            width: 60px !important;
            border-left: none;
            border-right: none;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        a.text-danger:focus {
            box-shadow: none;
        }
        .text-price {
            color: #ff0000;
        }
    </style>
@endpush

@push('js-prodetail')
    <script>
        let plus = document.querySelectorAll('.plus');
        let minus = document.querySelectorAll('.minus');
        let quality = document.querySelectorAll('.quality');

        quality.forEach((amountInput) => {
            let amount = parseInt(amountInput.value);
            let plusButton = amountInput.nextElementSibling;
            let minusButton  = amountInput.previousElementSibling;

            plusButton.addEventListener('click', () => {
                if (amount >= 1) {
                    amountInput.value = ++amount;
                }
            });

            minusButton .addEventListener('click', () => {
                if(amount > 1){
                    amountInput.value = --amount;
                }
            });

            amountInput.addEventListener('input', () => {
                amount = amountInput.value;
                amount = parseInt(amount);
                amount = (isNaN(amount) || amount == 0)?1:amount;
                amountInput.value = amount;
            })
        });
    </script>
@endpush