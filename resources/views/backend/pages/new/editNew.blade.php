@extends('backend.layouts.master');

@section('title')
    Chỉnh sửa tin tức
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Chỉnh sửa</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Điền thông tin</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('new.update', $new->id)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="w-50 mb-3 d-flex justify-content-end">
                                <button type="submit" class="w-25 btn btn-primary me-2 flex-fill"> 
                                    <i class="fas fa-save"></i> Lưu
                                </button>
                                <button type="reset" class="w-25 btn btn-danger ms-2 flex-fill" onclick="history.back()"> 
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-fullname">Tiêu đề</label>
                                <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name_title"
                                    placeholder="Tin mới nhất" name="title" value="{{$new->tieuDe}}"/>
                            </div>
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-company">Slug</label>
                                <input type="text" class="form-control" id="convert_slug"
                                    placeholder="tin-moi-nhat" name="slug" value="{{$new->slug}}" readonly/>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Thể loại tin</label>
                                <div class="input-group flex-fill me-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Chọn</label>
                                    <select class="form-select" id="inputGroupSelect01" name="idLT">
                                        @foreach ($newCate as $item)
                                            @if ($item->id == $new->idLT)
                                                <option value="{{$item->id}}" selected>{{$item->ten}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->ten}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="basic-default-fullname">Hình ảnh</label>
                                <div class="input-group flex-fill me-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="img__new"/>
                                    <label class="input-group-text" for="inputGroupFile02">Chọn hình</label>
                                </div>
                                <div class="img__container_admin mt-3">
                                    <img onerror="this.src='/upload/img_error.jpg'" src="/{{$new->urlHinh}}" alt="" class="img__list_admin">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">Tóm tắt</label>
                            <textarea class="form-control mb-3" name="title_pro" id="exampleFormControlTextarea2" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea class="form-control mb-3" name="des_pro" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary flex-fill me-2"> 
                                <i class="fas fa-save"></i> Lưu tin
                            </button>
                            <button type="reset" class="btn btn-danger flex-fill ms-2"> 
                                <i class="fas fa-redo"></i> Làm mới
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection