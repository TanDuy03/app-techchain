<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReLogin;
use App\Http\Requests\ReRegister;
use Illuminate\Auth\Events\Registered;
use App\Models\PasswordReset;
use App\Models\User;   
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DashboardController extends Controller 
{
    function index()
    {
        $allUser = User::where('vaitro', 0)->get()->count();
        return view('backend.pages.dashboard', compact('allUser'));
    }

    function admin()
    {
        return redirect(route('login'));
    }

    function login()
    {
        return view('backend.pages.login');
    }

    function login_(ReLogin $request)
    {
        if(auth()->guard('admin')->attempt(['email'=>$request['email'],'password'=>$request['password']])){
            $user = auth()->guard('admin')->user();
            if($user->vaitro == 1) {
                return redirect('admin/dashboard');
            }elseif($user->vaitro == 0){
                return redirect()->intended();
            }
            else return back()->with('danger','Bạn không đủ quyền');
        }
        else return back()->with('danger','Email hoặc mật khẩu không đúng');
    }

    function register()
    {
        return view('backend.pages.register');
    }

    function register_(ReRegister $request)
    {
        $data = new User;
        $data->ho = $request->input('fname');
        $data->ten = $request->input('lname');
        $data->email = $request->input('email');
        $data->password = trim(strip_tags($request->input('npassword')));
        $data->dienthoai = $request->input('phone');
        $data->save();
        //
        if(auth()->guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('npassword')])){
            $user = auth()->guard('web')->user();
            event(new Registered($user)); 
            return redirect(route('verification.notice'))->with('success',"Đăng ký thành công!"); 
        }
        else return back()->with('thongbao','Đăng ký không thành công');
    }
    
    function logout(){
        auth()->guard('admin')->logout();
        Session::flash('info', 'Đăng xuất thành công');
        return redirect(route('login'));
    }

    function fortgotPass()
    {
        return view('backend.pages.forgotMail');
    }

    function fortgotPass_(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users,email'], 
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.exists' => 'Email không có trên hệ thống',
            ]
        );
        $token = strtoupper(Str::random(20));
        $data = User::where('email', $request->email)->first();
        $data->update(['remember_token' => $token]);

        Mail::send('frontend.pages.mailForgot', compact('data'), function($email) use($data){
            $email->subject('Lấy lại mật khẩu');
            $email->to($data->email, $data->ten);
        });
        Session::flash('statusAlert', 'success');
        return redirect(route('login'))->with('status', 'Email đã gửi thành công!'); 
    }

    function getPass(User $id, $token)
    {
        if($id->remember_token === $token){
            return view('frontend.pages.getPass');
        }else return view('errors.404'); 
        //return abort 404
    }

    function getPass_(User $id, $token, Request $request)
    {
        $request->validate(
            [
                'npassword' => ['required', 'min:8', 'max:20', 
                    'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
                'cfpassword' => ['required', 'min:8', 'same:npassword'],
            ],
            [
                'npassword.required' => 'Điền trường này',
                'npassword.min' => 'Mật khẩu phải từ :min ký tự',
                'npassword.max' => 'Mật khẩu vượt quá :max ký tự',
                'npassword.regex' => 'Mật khẩu phải có chữ hoa, ký tự đặc biệt và số',
                
                'cfpassword.required' => 'Điền trường này',
                'cfpassword.min' => 'Mật khẩu phải từ :min ký tự',
                'cfpassword.same' => 'Mật khẩu không khớp',
            ]
        );
        $npassword = $request->input('npassword');
        $id->update(
            [
                'password' => $npassword,
                'remember_token' => null,
            ]
        );
        Session::flash('statusAlert', 'success');
        return redirect(route('login'))->with('status', ' Đặt lại mật khẩu thành công');
    }

    function activeAccount()
    {
        return view('frontend.pages.activeAccount');
    }

    function activeAccount_(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users,email'],
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.exists' => 'Email không tồn tại trên hệ thống',
            ]
        );
        $token = strtoupper(Str::random(20));
        $data = User::where('email', $request->email)->first();
        $data->update(['remember_token' => $token]);

        Mail::send('frontend.pages.activeMail', compact('data'), function($email) use($data){
            $email->subject('Kích hoạt tài khoản');
            $email->to($data->email);
        });
        Session::flash('statusAlert', 'success');
        return redirect(route('login'))->with('status', 'Email đã gửi - Bạn check mail để kích hoạt tài khoản!');
    }

    function activeAccess(User $id, $token)
    {
        if($id->remember_token == $token){
            $id->update(['trangthai' => 1, 'remember_token' => null]);
            Session::flash('statusAlert', 'success');
            return redirect(route('login'))->with('status', 'Kích hoạt tài khoản thành công - Đăng nhập thôi!');
        }
    }
}