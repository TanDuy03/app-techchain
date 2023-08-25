<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('admin')->check()){
            return redirect(route('login'));
        }elseif(Auth::guard('admin')->user()->trangthai == 0){
            // $user = Auth::guard('admin')->user();
            // if ($user && $user->vaitro == 1) { 
            //     return $next($request);
            // }
            // else {
            //     $request->session()->put('prevurl',url()->current());
            //     return redirect(url('/login'))->with('danger','Bạn cần đăng nhập với vai trò admin');
            // }
            return redirect(url('/login'))->with('danger','Tài khoản chưa kích hoạt - <a href="'.route('active.account').'" class="text-white text-decoration-underline">Kích hoạt</a>');
        }
        return $next($request);
    }
}
