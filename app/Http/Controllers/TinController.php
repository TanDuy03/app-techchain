<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class TinController extends Controller
{

    function __construct()
    {
        $listloai = \DB::table('loaitin')
            ->where('lang', 'vi')->where('anHien', 1)
            ->orderBy('thuTu', 'DESC')
            ->get();
        $tags = \DB::table('tin')
            ->select('tags')->get();
        $tinnew = \DB::table('tin')
            ->select('tieuDe', 'id', 'urlHinh')->orderBy('ngayDang', 'DESC')->limit(5)
            ->get();
        $xemnhieu = \DB::table('tin')
            ->select('id', 'tieuDe', 'xem', 'ngayDang', 'urlHinh')
            ->orderBy('xem', 'desc')->limit(10)->get();
        \View::share(compact('listloai', 'tags', 'tinnew', 'xemnhieu'));
    }
    
    function tintuc() 
    {
        $perPage = 8;
        $dstin = \DB::table('tin')
            ->orderBy('ngayDang', 'desc')
            ->paginate($perPage)->withQueryString();
        return view('frontend.pages.new', ['data'=> $dstin]);
    }

    function chitiet($id=0) 
    {
        $tt = \DB::table('tin')
            ->Join('loaitin', 'tin.idLT', '=', 'loaitin.id')
            ->select('tin.id', 'tin.tieuDe', 'tin.ngayDang', 'tin.xem', 'tin.urlHinh', 'tin.noiDung', 'loaitin.ten')
            ->where('tin.id', '=', $id)->first();
        $cmt = \DB::table('binhluan')
            ->join('tin', 'binhluan.idTin', '=', 'tin.id')
            ->select('tin.id', 'binhluan.*')
            ->where('binhluan.idTin', '=', $id)
            ->get();
        if($tt !== null){
            $id = $tt->id;
            return view('frontend.pages.detail', ['id'=>$id, 'tt'=> $tt, 'cmt' => $cmt]);
        }else{
            return redirect()->route('new');
        }
    }

    function loaitin($id=0) 
    {
        $perPage = 5;
        $loaitin = \DB::table('tin')
        ->Join('loaitin', 'tin.idLT', '=', 'loaitin.id')
        ->select('tin.select.*', 'loaitin.ten')
        ->where('tin.idLT', '=', $id)->paginate($perPage)->withQueryString();
        return view('frontend.pages.newcate', compact('loaitin')); 
        return view('frontend.layouts.partials.master', compact('loaitin')); 
    }
}
