@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card h-100">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Chúc mừng, {{Auth::guard('admin')->user()->ten }}🎉</h5>
                        <p class="mb-4">
                            Hôm nay bạn đã bán được <span class="fw-bold">86</span> sản phẩm.
                        </p>

                        <a href="#" class="btn btn-sm btn-outline-primary">Xem ngay</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="/backend/assets/img/illustrations/man-with-laptop-light.png"
                            height="140" alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Chi tiết
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Xóa
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Tài khoản</span>
                        <h3 class="card-title mb-2">{{$allUser}}</h3>
                        <small class="text-success fw-semibold"><i
                                class="bx bx-up-arrow-alt"></i> +72.80%</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fab fa-chrome"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Chi tiết
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Xóa
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Truy cập</span>
                        <h3 class="card-title mb-2">25,852</h3>
                        <small class="text-success fw-semibold"><i
                                class="bx bx-up-arrow-alt"></i> +72.80%</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-8">
                    <h5 class="card-header m-0 me-2 pb-3">Doanh thu</h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                    type="button" id="growthReportId"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    2023
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="growthReportId">
                                    <a class="dropdown-item"
                                        href="javascript:void(0);">2022</a>
                                    <a class="dropdown-item"
                                        href="javascript:void(0);">2021</a>
                                    <a class="dropdown-item"
                                        href="javascript:void(0);">2020</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="growthChart"></div>
                    <div class="text-center fw-semibold pt-3 mb-2">Tăng trưởng 62%</div>
                    <div
                        class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="avatar badge bg-label-primary p-2">
                                    <i class="fas fa-money-check text-primary"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>2022</small>
                                <h6 class="mb-0">32.5k</h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="avatar badge bg-label-info p-2">
                                    <i class="fas fa-wallet"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>2021</small>
                                <h6 class="mb-0">41.2k</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fab fa-paypal"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt4"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Chi tiết
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Xóa
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="d-block mb-1">Doanh thu</span>
                        <h3 class="card-title text-nowrap mb-2">2,456</h3>
                        <small class="text-danger fw-semibold"><i
                                class="bx bx-down-arrow-alt"></i> -14.82%</small>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1"
                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Chi tiết
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        Xóa
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Bán ra</span>
                        <h3 class="card-title mb-2">14,857</h3>
                        <small class="text-success fw-semibold"><i
                                class="bx bx-up-arrow-alt"></i> +28.14%</small>
                    </div>
                </div>
            </div>
            <!-- </div> <div class="row"> -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div
                                class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Báo cáo</h5>
                                    <span class="badge bg-label-warning rounded-pill">Năm
                                        2022</span>
                                </div>
                                <div class="mt-sm-auto">
                                    <small class="text-success text-nowrap fw-semibold"><i
                                            class="bx bx-chevron-up"></i>
                                        68.2%</small>
                                    <h3 class="mb-0">84,686k</h3>
                                </div>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Sản phẩm bán ra</h5>
                    <small class="text-muted">42.82k Tổng doanh số</small>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="orederStatistics"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Xem chi tiết</a>
                        <a class="dropdown-item" href="javascript:void(0);">Làm mới</a>
                        <a class="dropdown-item" href="javascript:void(0);">Chia sẻ</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <h2 class="mb-2">18,258</h2>
                        <span>Tổng đơn hàng</span>
                    </div>
                    <div id="orderStatisticsChart"></div>
                </div>
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class='bx bx-laptop'></i>
                            </span>
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Laptop</h6>
                                <small class="text-muted">Apple, Asus, Lenovo</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">2.5k</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i
                                    class="bx bx-closet"></i></span>
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Quần áo</h6>
                                <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">3.8k</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info">
                                <i class='bx bxs-mouse'></i>
                            </span>
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Phụ kiên</h6>
                                <small class="text-muted">Tai nghe, Chuột</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">2.2k</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class='bx bxs-watch-alt'></i>
                            </span>
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Đồng hồ</h6>
                                <small class="text-muted">Apple, Rolex</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">102</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Order Statistics -->

    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex">
                    <a href="" class="btn btn-priamry bg-primary text-white px-2 flex-fill">Thu nhập</a>
                    <a href="" class="btn btn-outline-primary px-2 flex-fill mx-2">Chi phí</a>
                    <a href="" class="btn btn-outline-primary px-2 flex-fill">Lợi nhuận</a>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income"
                        role="tabpanel">
                        <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="/backend/assets/img/icons/unicons/wallet.png"
                                    alt="User" />
                            </div>
                            <div>
                                <small class="text-muted d-block">Số dư</small>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">459.10</h6>
                                    <small class="text-success fw-semibold">
                                        <i class="bx bx-chevron-up"></i>
                                        42.9%
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div id="incomeChart"></div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                                <div id="expensesOfWeek"></div>
                            </div>
                            <div>
                                <p class="mb-n1 mt-1">Chi phí tuần này</p>
                                <small class="text-muted">39% ít hơn</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Expense Overview -->

    <!-- Transactions -->
    <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Giao dịch</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">10 ngày trước</a>
                        <a class="dropdown-item" href="javascript:void(0);">1 tháng trước</a>
                        <a class="dropdown-item" href="javascript:void(0);">4 tháng trước</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/paypal.png" alt="User"
                                class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Paypal</small>
                                <h6 class="mb-0">Chuyển khoản</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+82.6</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/wallet.png" alt="User"
                                class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Trả góp</small>
                                <h6 class="mb-0">Mua mới</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+270.69</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/chart.png" alt="User"
                                class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Tiền mặt</small>
                                <h6 class="mb-0">Đặt hàng</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+637.91</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/cc-success.png"
                                alt="User" class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Thẻ tín dụng</small>
                                <h6 class="mb-0">Đặt hàng</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">-838.71</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/wallet.png" alt="User"
                                class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Ví điện tử</small>
                                <h6 class="mb-0">Momo</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+203.33</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="/backend/assets/img/icons/unicons/cc-warning.png"
                                alt="User" class="rounded" />
                        </div>
                        <div
                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Mastercard</small>
                                <h6 class="mb-0">Đặt hàng</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">-92.45</h6>
                                <span class="text-muted">VNĐ</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Transactions -->
</div>
@endsection