<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $catePro = Category::where('anhien', 1)->get();
        \View::share(compact('catePro'));
    }
    
    public function index()
    {
        $perPage = 15;
        $listPro = Product::where('anhien', 1)->orderBy('sanpham.created_at','DESC')
        ->paginate($perPage)->withQueryString();
        return view('backend.pages.product.listPro', compact('listPro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.product.createPro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReProduct $request) 
    {
        $pro = new Product;
        $pro->ten_sp = trim(strip_tags($request['ten_sp']));
        $pro->slug = $request['slug'];
        $pro->gia_km = (int)$request['gia_km'];
        $pro->gia = (int)$request['gia'];
        $pro->anhien = (int)$request['anHien'];
        $pro->mota = $request['des_pro'];
        $pro->id_loai = $request['proCate'];
        if($request->hasFile('img__new'))
        {
            $file = $request->file('img__new');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('backend/uploads/product/', $file_name);
            $pro->hinh = 'backend/uploads/product/'.$file_name;
        }
        $pro->save();
        Session::flash('statusAlert', 'success');
        return redirect(route('product.index'))->with('status', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editPro = Product::where('id_sp', $id)->first();
        return view('backend.pages.product.editPro', compact('editPro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReProduct $request, string $id)
    {
        $pro = Product::find($id);
        $pro->id_loai = $request['proCate'];
        $pro->ten_sp = trim(strip_tags($request['ten_sp']));
        $pro->slug = $request['slug'];
        $pro->gia_km = (int)$request['gia_km'];
        $pro->gia = (int)$request['gia'];
        $pro->anhien = $request['anHien'];
        $pro->mota = $request['des_pro'];
        if($request->hasFile('img__new'))
        {
            $file = $request->file('img__new');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('backend/uploads/product/', $file_name);
            $pro->hinh = 'backend/uploads/product/'.$file_name;
        }
        $pro->save();
        Session::flash('statusAlert', 'info');
        return redirect(route('product.index'))->with('status', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delPro = Product::find($id);
        $delPro->delete();
        Session::flash('statusAlert', 'success');
        return redirect(route('product.index'))->with('status', 'Xóa sản phẩm thành công');
    }
}
