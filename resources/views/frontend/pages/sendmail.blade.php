<div style="width: 800px; margin: 10px auto;">
    <div style="width: 100%;">
        <h5 style="text-align: center; font-size: 1.3rem; margin-bottom: 10px; color: #0c0c0c;">Chúc <span style="color: #ff0000;">Tấn Duy</span> ngày mới tốt lành!</h5>
        <span style="text-align: center; font-size: 1rem; display: block; color: #0c0c0c;">
            Cảm ơn bạn đã tin tưởng và ủng hộ những sản phẩm cũng như sử dụng các dịch vụ của <span style="color: #30A2FF;">Techchain</span> chúng tôi.
        </span>
    </div>
    <div style="width: 100%; margin: auto;">
        <a href="#"  style="width: 200px; height: 40px;
        background-color: #2374E1; display: block; margin: 20px auto 10px  auto;
        line-height: 40px;
        text-decoration: none; color: #fff; font-weight: bold; font-size: 1.2rem; text-align: center;
        border-radius: 8px;">Xác nhận đơn hàng</a>
        <h5 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px; text-transform: uppercase;
        text-align: center; color: #0c0c0c;">Đơn hàng của bạn</h5>
    </div>
    <table style="border-collapse: collapse; border: 1px solid #ccc; width: 100%;">
        <thead>
            <tr style="text-align: center; background-color: #24d172; border: 1px solid #ccc; height: 40px; font-size: 1.1rem;
            color: #fff;">
                <th style="border: 1px solid #ccc; padding: 0 10px;">Mã đơn hàng</th>
                <th style="border: 1px solid #ccc; padding: 0 10px;">Tên sản phẩm</th> 
                <th style="border: 1px solid #ccc; padding: 0 10px;">Số lượng</th>
                <th style="border: 1px solid #ccc; padding: 0 10px;">Giá</th> 
                <th style="border: 1px solid #ccc; padding: 0 10px;">Ngày mua</th>
            </tr>
        </thead>
        <tbody style="border-top: none;">
            @php
                $tongtien=0; $total=0;
            @endphp
            @foreach ($orderInfo as $item)
                @php
                    $tongtien = $item['gia'] * $item['soluong'];
                    $total += $tongtien;
                @endphp
                <tr style="border: 1px solid #ccc; height: 35px;">
                    <td style="border: 1px solid #ccc; text-align: center; color: #0c0c0c;">{{$item['id_dh']}}</td>
                    <td style="border: 1px solid #ccc; text-align: center; color: #0c0c0c;">{{$item['ten_sp']}}</td>
                    <td style="border: 1px solid #ccc; text-align: center; color: #0c0c0c;">{{$item['soluong']}}</td>
                    <td style="border: 1px solid #ccc; text-align: center; color: #0c0c0c;">{{number_format($item['gia'],0,',','.')}} VNĐ</td>
                    <td style="border: 1px solid #ccc; text-align: center; color: #0c0c0c;">
                        {{$item['ngaymua']}}
                    </td>
                </tr>
            @endforeach
            <tr style=" height: 35px;">
                <td style="border: 1px solid #ccc; text-align: center; font-weight: bold;
                font-size: 1rem; color: #0c0c0c;">Tổng tiền</td>
                <td colspan="3">
                    <span style="margin-left: 1.2rem; font-size: 1.1rem; font-weight: bold; color: #ff0000;">{{number_format($total,0,',','.')}} VNĐ</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>