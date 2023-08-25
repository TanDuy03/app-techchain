<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewModel;
use App\Http\Controllers\Admin\CateNewController;
use App\Http\Requests\ReNew;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
Paginator::useBootstrap();

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $listCate = new CateNewController;
        $newCate= $listCate->index()->listCate;
        \View::share(compact('newCate'));
    }
    public function index()
    {
        $perPage = 15;
        $listNew = NewModel::where('anhien', 1)
        ->where('tin.created_at', '<=', now())
        ->orderBy('tin.ngayDang', 'DESC')
        ->paginate($perPage)->withQueryString();
        return view('backend.pages.new.listNew', compact('listNew'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.new.createNew');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReNew $request)
    {
        $new = new NewModel;
        $new->tieuDe = $request['title'];   
        $new->slug = $request['slug'];
        $new->tomTat = $request['title_pro'];
        $new->noiDung = $request['des_pro'];  
        $new->idLT = $request['idLT'];
        
        if($request->hasFile('img__new'))
        {
            $file = $request->file('img__new');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('backend/uploads/new/', $file_name);
            $new->urlHinh = 'backend/uploads/new/'.$file_name;
        }
        $new->save();   
        Session::flash('statusAlert', 'success');
        return redirect(route('new.index'))->with('status', 'Thêm thành công');
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
        $new = NewModel::find($id);
        return view('backend.pages.new.editNew', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $new = NewModel::find($id);
        $new->tieuDe = $request['title'];
        $new->slug = $request['slug'];
        $new->idLT = $request['idLT'];      
        $new->tomTat = $request['title_pro'];      
        $new->noiDung = $request['des_pro'];   
        if($request->hasFile('img__new')) {
            $des_img = $new->urlHinh;
            if(File::exists($des_img)) {
                File::delete($des_img);
            }
            $file = $request->file('img__new');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move(public_path('backend/uploads/new/'), $file_name);
            $new->urlHinh = 'backend/uploads/new/'.$file_name;
        }
        $new->save();
        Session::flash('statusAlert', 'info');
        return redirect(route('new.index'))->with('status', 'Cập nhập tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {
        $new = NewModel::find($id);
        $new->delete();
        Session::flash('statusAlert', 'success');
        return redirect(route('new.index'))->with('status', 'Xóa thành công');;
    }

    // public function upload(Request $request) {
    //     if($request->hasFile('upload')) {
    //         //get filename with extension
    //         $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
    //         //get filename without extension
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
    //         //get file extension
    //         $extension = $request->file('upload')->getClientOriginalExtension();
       
    //         //filename to store
    //         $filenametostore = $filename.'_'.time().'.'.$extension;
       
    //         //Upload File
    //         $request->file('upload')->storeAs('backend/uploads/new/', $filenametostore);
     
    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('backend/uploads/new/'.$filenametostore); 
    //         $msg = 'Image successfully uploaded'; 
    //         $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
    //         // Render HTML output 
    //         @header('Content-type: text/html; charset=utf-8'); 
    //         echo $re;
    //     }
    // }
}
