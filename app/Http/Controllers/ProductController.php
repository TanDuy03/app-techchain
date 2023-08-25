<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderPro;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Mail;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use DateTimeZone;

Paginator::useBootstrap();

class ProductController extends Controller
{
    function index()
    {
        $perPage = 9;
        $catePro = Category::where('anhien', 1)->take(10)->get();
        $proNew = Product::where('anhien', 1)->orderBy('ngay', 'DESC')->paginate($perPage)->withQueryString();
        $proView = Product::where('anhien', 1)->orderBy('soluotxem', 'DESC')->take(6)->get();
        $proPrice = Product::where('anhien', 1)->orderBy('gia_km', 'ASC')->take(6)->get();
        return view('frontend.pages.product', compact('proNew', 'proView', 'proPrice', 'catePro'));
    }

    function detail($id, $slug)
    {
        $proDetail = Product::where('sanpham.id_sp', $id)->where('slug', $slug)
        ->join('sanphamchitiet', 'sanpham.id_sp', '=', 'sanphamchitiet.id_sp')
        ->select('sanpham.*', 'sanphamchitiet.*')->first();
        $idsp = $proDetail->id_sp; 
        $tc = $proDetail->tinhchat;
        $idloai = $proDetail->id_loai;     
        $splienquan = Product::where ('id_loai', $idloai)->where('tinhchat', $tc)
        ->orderBy('ngay','desc')
        ->limit(4)->get()->except($idsp);  
        $proCate = Category::where('id_loai', $proDetail->id_loai)->first();
        return view('frontend.pages.pro-detail', compact('proDetail', 'proCate', 'splienquan'));  
    }

    function cate($slug)
    {
        $perPage = 12;
        $catePro = Category::where('slug', $slug)->first();
        $product = Product::where('id_loai', $catePro->id_loai)
        ->paginate($perPage)->withQueryString();
        $totalPro = Product::where('id_loai', $catePro->id_loai)->count();
        return view('frontend.pages.procate', compact('product', 'catePro', 'totalPro'));
    }

    function addCart(Request $request, $id_sp = 0, $soluong = 1)
    {
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['id_sp'=> $id_sp,  'soluong'=> $soluong]);          
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart =  $request->session()->get('cart'); 
            $index = array_search($id_sp, array_column($cart, 'id_sp'));
            if ($index!=''){ //id_sp có trong giỏ hàng thì tăhg số lượng
                $cart[$index]['soluong']+=$soluong;
                $request->session()->put('cart', $cart);
            }
            else { //sp chưa có trong arrary cart thì thêm vào 
                $cart[]= ['id_sp'=> $id_sp, 'soluong'=> $soluong];
                $request->session()->put('cart', $cart);
            }    
        }   
        return redirect(route('viewCart'));     
        //$request->session()->forget('cart'); xóa cart khỏi session
    }

    function viewCart(Request $request){
        $cart =  $request->session()->get('cart'); 
        if($cart != null){
            return view('frontend.pages.viewCart', compact('cart'));
        }else {
            Session::flash('statusAlert', 'info');
            return redirect(route('product'))->with('status', 'Chưa có sản phẩm');
        }
    }

    function delCart(Request $request, $id_sp=0){
        $cart =  $request->session()->get('cart'); 
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index!=''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect(route('viewCart')); 
    }
    
    function order(Request $request, $id_sp=0)
    {   
        $detailOrder = new OrderDetail;
        $order = new OrderPro;
        $request->validate(
            [
                'orname' => ['required'],
                'phone' => ['required', 'digits:10', 'numeric', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/'],
                'address' => ['required', 'min:10'],
            ],[
                'orname.required' => 'Nhập trường này',
                'phone.required' => 'Nhập trường này',
                'phone.digits' => 'Số điện thoại phải có :digits số',
                'phone.numeric' => 'Vui lòng nhập số',
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Nhập trường này',
                'address.min' => 'Vui lòng nhập địa chỉ chi tiết',
            ]
        );
        $order->tennguoinhan = trim(strip_tags($request->input('orname')));
        $order->dienthoai = trim(strip_tags((int)$request->input('phone')));
        $order->diachigiaohang = $request->input('address');
        $order->id_dh = mt_rand(100000, 999999);
        $timeOrder = Carbon::now(); 
        $order->thoidiemmua = $timeOrder->format('d/m/Y H:i:s');
        $order->save();
        //
        $cart =  $request->session()->get('cart'); 
        $tongtien=0; $tongsoluong=0;
        $orderInfo = [];
        foreach ($cart as $item) {
            $id_sp = $item['id_sp'];     
            $soluong = $item['soluong'];
            $ten_sp = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('ten_sp');
            $gia = \DB::table('sanpham')->where('id_sp', '=', $id_sp)-> value('gia_km');
            //
            $thanhtien = $gia*$soluong;
            $tongtien+=$thanhtien; 
            $tongsoluong+=$soluong; 
            $thanhtien = number_format($thanhtien,0,',','.') ;
            $detailOrder = new OrderDetail;
            //
            $detailOrder->id_dh =  $order->id_dh;
            $detailOrder->id_sp =  $id_sp;
            $detailOrder->ten_sp =  $ten_sp;
            $detailOrder->soluong =  $soluong;
            $detailOrder->gia =  $gia;
            $detailOrder->save();
            //
            $name = 'Tấn Duy';
            $orderInfo[] = [
                'ten_sp' => $ten_sp,
                'soluong' => $soluong,
                'gia' => $gia,
                'id_dh' => $order->id_dh,
                'ngaymua' => $order->thoidiemmua,
            ];
        }

        Mail::send('frontend.pages.sendmail', compact('name', 'orderInfo'), 
            function($email) use($name){
            $email->subject('Techchain - Thông báo xác nhận đơn hàng');
            $email->to('hothuan6677@gmail.com');
        });
        $request->session()->forget('cart');
        Session::flash('statusAlert', 'success');
        return redirect(route('product'))->with('statusOrder', 'Đặt hàng thành công');
    }
}