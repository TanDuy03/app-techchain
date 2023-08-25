@extends('backend.layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Tạo mới</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Điền thông tin</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('product.update', $editPro->id_sp)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="w-50 mb-3 d-flex justify-content-end">
                                <button type="submit" class="w-25 btn btn-primary me-2 flex-fill"> 
                                    <i class="fas fa-save"></i> Lưu
                                </button>
                                <button type="reset" class="w-25 btn btn-danger ms-2 flex-fill"> 
                                    <i class="fas fa-redo"></i> Làm mới
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-fullname">Tên sản phẩm</label>
                                <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name_title"
                                    placeholder="Máy tính Asus" name="ten_sp" value="{{$editPro->ten_sp}}"/>
                                <span class="text-danger fst-italic">
                                    @error('ten_sp')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-company">Slug</label>
                                <input type="text" class="form-control" id="convert_slug"
                                    placeholder="may-tinh-asus" name="slug" value="{{$editPro->slug}}" readonly/>
                                <span class="text-danger fst-italic">
                                    @error('slug')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Giá mới</label>
                                <div class="input-group flex-fill me-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        aria-label="Dollar amount (with dot and two decimal places)"
                                        name="gia_km" value="{{$editPro->gia_km}}"
                                    />
                                    <span class="input-group-text">VNĐ</span>
                                    <span class="input-group-text">0.000</span>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('gia_km')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Giá khuyến mãi</label>
                                <div class="input-group flex-fill me-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        aria-label="Dollar amount (with dot and two decimal places)"
                                        name="gia" value="{{$editPro->gia}}"
                                    />
                                    <span class="input-group-text">VNĐ</span>
                                    <span class="input-group-text">0.000</span>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('gia')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Hãng sản xuất</label>
                                <div class="input-group flex-fill me-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Chọn</label>
                                    <select class="form-select" id="inputGroupSelect01" name="proCate">
                                        <option>Chọn hãng...</option>
                                        @foreach ($catePro as $item)
                                            @if ($item->id_loai == $editPro->id_loai )
                                                <option value="{{$item->id_loai}}" selected>{{ucfirst($item->ten_loai)}}</option>
                                            @else
                                                <option value="{{$item->id_loai}}">{{ucfirst($item->ten_loai)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('proCate')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Hình ảnh</label>
                                <div class="input-group flex-fill me-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="img__new"/>
                                    <label class="input-group-text" for="inputGroupFile02">Chọn hình</label>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('img__new')
                                        {{$message}}
                                    @enderror
                                </span>
                                <div class="img__container_admin mt-3">
                                    <img onerror="this.src='/upload/img_error.jpg'" src="{{asset($editPro->hinh)}}" alt="" class="img__list_admin">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <label class="form-label" for="basic-default-fullname">Trạng thái</label>
                            <div class="col-xl-6 col-md mb-3">
                                <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="anHien"
                                      id="inlineRadio1"
                                      value="0"
                                      {{($editPro->anhien) == 0?'checked':''}}
                                    />
                                    <label class="form-check-label" for="inlineRadio1">Ẩn</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="anHien"
                                      id="inlineRadio2"
                                      value="1"
                                      {{($editPro->anhien) == 1?'checked':''}}
                                    />
                                    <label class="form-check-label" for="inlineRadio2">Hiện</label>
                                </div>
                            </div>
                            <span class="text-danger fst-italic">
                                @error('anHien')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea class="form-control mb-3" name="des_pro" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <span class="text-danger fst-italic">
                                @error('des_pro')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary flex-fill me-2"> 
                                <i class="fas fa-save"></i> Lưu
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

