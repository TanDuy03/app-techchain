<div style="width: 800px; margin: 10px auto;">
    <div style="width: 100%;">
        <h5 style="text-align: center; font-size: 1.3rem; margin-bottom: 10px; color: #0c0c0c;">Chúc <span style="color: #ff0000;">{{$data->ten}}</span> ngày mới tốt lành!</h5>
        <span style="text-align: center; font-size: 1rem; display: block; color: #0c0c0c;">
            Hệ thống <span style="color: #30A2FF; font-weight: bold;">Techchain</span> đã được bạn yêu cầu kích hoạt tài khoản.
            Mời bạn click vào nút bên dưới!
        </span>
    </div>
    <div style="width: 100%; margin: auto;">
        <a href="{{route('access.account', ['id'=>$data->id_user, 'token'=>$data->remember_token])}}"  style="width: 200px; height: 40px;
        background-color: #2374E1; display: block; margin: 20px auto 10px  auto;
        line-height: 40px;
        text-decoration: none; color: #fff; font-weight: bold; font-size: 1.2rem; text-align: center;
        border-radius: 8px;">Kích hoạt</a>
    </div>
</div>