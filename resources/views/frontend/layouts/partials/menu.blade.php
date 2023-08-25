<!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
                <div class="p-2 me-2">
                    <img class="img-fluid" src="{{asset('backend/assets/img/favicon/favicon.ico')}}" alt="Icon" style="width: 35px; height: 35px;">
                </div>
                <h1 class="m-0 text-primary">Tech</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{route('home')}}" class="nav-item nav-link {{(url()->current())== route('home')?'active':''}}">Trang chủ</a>
                    <a href="{{route('about')}}" class="nav-item nav-link {{(url()->current())== route('about')?'active':''}}">Giới thiệu</a>
                    <a href="{{route('product')}}" class="nav-item nav-link {{(url()->current())== route('product')?'active':''}}">Sản phẩm</a>
                    <div class="nav-item dropdown">
                        <a href="{{route('new')}}" class="nav-link dropdown-toggle {{(url()->current())== route('new')?'active':''}}">Tin tức</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php 
                            
                                $loaitin = \DB::table('loaitin')
                                ->select('slug', 'ten')
                                ->orderBy('thuTu', 'ASC')
                                ->where('anHien', '=', '1')->limit(5)->get();
                            
                            ?>
                            @foreach ($loaitin as $item)
                                <a href="{{url('/loai-tin', [$item->slug])}}" class="dropdown-item">{{$item->ten}}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{route('contact')}}" class="nav-item nav-link {{(url()->current())== route('contact')?'active':''}}">Liên hệ</a>
                </div>
                <a href="{{route('viewCart')}}" class="btn btn-primary px-3 d-none d-lg-flex">
                    <i class="fas fa-shopping-bag"></i>
                </a>
            </div>
        </nav>
    </div>
<!-- Navbar End -->