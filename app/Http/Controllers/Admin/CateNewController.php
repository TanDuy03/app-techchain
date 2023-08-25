<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use Session;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class CateNewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $listCate = LoaiTin::orderBy('loaitin.created_at', 'DESC')->paginate($perPage)->withQueryString();      
        return view('backend.pages.new.listCate', compact('listCate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.new.createCate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','min:3', 'unique:loaitin,ten'],
                'slug' => ['required','min:3', 'unique:loaitin,slug'],
            ],
            [
                'title.required' => 'Không được để trống',
                'title.min' => 'Nhập tối đa 3 ký tự',
                'title.unique' => 'Đã tồn tại',
                 
                'slug.required' => 'Không được để trống',
                'slug.min' => 'Nhập tối đa 3 ký tự',
                'slug.unique' => 'Đường dẫn đã tồn tại',
            ]
        );

        $data = new LoaiTin;
        $data->ten = ucfirst($request['title']);
        $data->anHien = $request['anHien'];
        $data->slug = $request['slug'];
        $data->save();
        Session::flash('statusAlert', 'success');
        return redirect(route('cate-new.index'))->with('status', 'Thêm thành công');
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
        $newCate = LoaiTin::find($id);
        return view('backend.pages.new.editCate', compact('newCate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = LoaiTin::find($id);
        $request->validate(
            [
                'title' => ['required','min:3', 'unique:loaitin,ten'],
                'slug' => ['required','min:3', 'unique:loaitin,slug'],
            ],
            [
                'title.required' => 'Không được để trống',
                'title.min' => 'Nhập tối đa 3 ký tự',
                'title.unique' => 'Nhập tên mới',
                //
                'slug.required' => 'Không được để trống',
                'slug.min' => 'Nhập tối đa 3 ký tự',
                'slug.unique' => 'Nhập đường dẫn mới',
            ]
        );

        $data->ten = $request['title'];
        $data->anHien = $request['anHien'];
        $data->slug = $request['slug'];
        $data->save();
        Session::flash('statusAlert', "info");
        return redirect(route('cate-new.index'))->with('status', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $totalTin = \DB::table('tin')->where('idLT', $id)->count();
        if($totalTin > 0){
            $request->session()->flash('alertDelete', 'error');
            return redirect(route('cate-new.index'))->with('statusDelete', 'Không thể xóa mục này!');
        }
        $newCate = LoaiTin::find($id);
        $newCate->delete();
        return redirect(route('cate-new.index'))->with('remove', '
            <a class="text-white btn btn-primary" id="btn-restore" href="'.route('restore', $newCate->id).'">
            Khôi phục <i class="bi bi-recycle"></i>
            </a> <a class="btn btn-danger" href="'.route('delete.trashed', $newCate->id).'" id="del-all">Xóa vĩnh viễn <i class="fas fa-ban"></i></a>');
    }

    public function restore(Request $request ,string $id)
    {
        $new = LoaiTin::withTrashed()->find($id);
        if($new && $new->trashed()){
            $new->restore();
            Session::flash('statusAlert', "success");
            return redirect()->route('cate-new.index')->with('status', 'Khôi phục thành công');
        }
    }

    public function deltrashed(Request $request ,string $id)
    {
        $new = LoaiTin::withTrashed()->find($id)->forceDelete();
        Session::flash('statusAlert', "success");
        return redirect(route('cate-new.index'))->with('status', 'Đã dọn sạch thùng rác');
    }
}
