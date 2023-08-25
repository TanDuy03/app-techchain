        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
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
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                                @foreach ($proList as $sp)
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden border-bottom">
                                                <a href="{{url('laptop/'.$sp->id_sp.'/'.$sp->slug)}}"><img class="img-fluid" src="{{$sp->hinh}}" alt="{{$sp->ten_sp}}" style="height: 235px; width: 100%;"></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Sale</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="text-danger mb-3" style="font-size: 1.2rem;">
                                                        {{number_format($sp->gia_km, 0, '', ',')}} VNĐ
                                                    </h5>
                                                    <h5 class="text-dark mb-3 text-decoration-line-through fs-6">
                                                        {{number_format($sp->gia, 0, '', ',')}} VNĐ
                                                    </h5>
                                                </div>  
                                                <a class="d-block h5 mb-2" href="{{url('laptop/'.$sp->id_sp.'/'.$sp->slug)}}" style="white-space: nowrap; text-overflow: ellipsis; 
                                                    overflow: hidden;">{{$sp->ten_sp}}
                                                </a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Hồ Chí Minh</p>
                                            </div>
                                            <div class="d-flex border-top d-flex justify-content-between align-items-center">
                                                <a href="{{url('laptop/'.$sp->id_sp.'/'.$sp->slug)}}" class="btn btn-warning text-white m-3 px-2 flex-fill">Xem</a>
                                                <a href="{{url('them-gio-hang/'.$sp->id_sp.'/1')}}" class="btn btn-success m-3 px-2 flex-fill"><i class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="{{route('product')}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

