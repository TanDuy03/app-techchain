<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use App\Models\LoaiTin;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class NewController extends Controller
{
    public function __construct()
    {
        $viewNew = NewModel::where('anHien', 1)->orderBy('xem', 'DESC')->take(10)->get();
        $listloai = LoaiTin::where('lang', 'vi')->where('anHien', 1)->orderBy('thuTu', 'DESC')->get();
        $tinnew = NewModel::where('anHien', 1)->orderBy('ngayDang', 'DESC')->limit(5)->get();
        \View::share(compact('viewNew', 'listloai', 'tinnew'));
    }
    
    function index()
    {
        $perPage = 10;
        $allNew = NewModel::where('anHien', 1)
        ->orderBy('ngayDang', 'DESC')
        ->paginate($perPage)->withQueryString();
        return view('frontend.pages.new', compact('allNew'));
    }

    function detail($slug)
    {
        $detailNew = NewModel::where('slug', $slug)->first();
        $detailNew->xem = $detailNew->xem + 1;
        $detailNew->save();
        return view('frontend.pages.detail', compact('detailNew'));
    }

    function timkiem(Request $request) 
    {
        $tukhoa = ($request->has('tukhoa'))? $request->query('tukhoa'):"";
        $tukhoa = trim(strip_tags($tukhoa));
        $listt=[];
        if ($tukhoa!=""){
            $listt = NewModel::where("tieuDe", "like", "%$tukhoa%")->get();
        }
        return view('frontend.pages.search', compact('listt'));
    }

    function loaitin($slug) 
    {
        $perPage = 5;
        $loaitin = \DB::table('tin')
        ->Join('loaitin', 'tin.idLT', '=', 'loaitin.id')
        ->select('tin.*', 'loaitin.ten')
        ->where('loaitin.slug', '=', $slug)->paginate($perPage)->withQueryString();
        return view('frontend.pages.newcate', compact('loaitin')); 
        return view('frontend.layouts.partials.master', compact('loaitin')); 
    }
}
