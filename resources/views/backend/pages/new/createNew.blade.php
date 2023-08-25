@extends('backend.layouts.master')

@section('title')
    Tạo mới tin
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Tạo mới tin</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Điền thông tin</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('new.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 d-flex w-50">
                                <button type="submit" class="w-25 btn btn-primary col-2 me-2"> 
                                    <i class="fas fa-save"></i> Lưu
                                </button>
                                <button type="reset" class="w-25 btn btn-danger col-2 ms-2"> 
                                    <i class="fas fa-redo"></i> Làm mới
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-fullname">Tiêu đề</label>
                                <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name_title"
                                    placeholder="Tin mới nhất" name="title"/>
                                <span class="text-danger fst-italic">
                                    @error('title')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-company">Slug</label>
                                <input type="text" class="form-control" id="convert_slug"
                                    placeholder="tin-moi-nhat" name="slug" readonly/>
                                <span class="text-danger fst-italic">
                                    @error('slug')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Thể loại tin</label>
                                <div class="input-group flex-fill me-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Chọn</label>
                                    <select class="form-select" id="inputGroupSelect01" name="idLT">
                                        <option value="0">Loại tin...</option>
                                        @if (!empty($newCate))
                                            @foreach ($newCate as $item)
                                                <option value="{{$item->id}}" {{old('idLT')==$item->id?'selected':false}}>{{$item->ten}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('idLT')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Hình ảnh</label>
                                <div class="input-group flex-fill me-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="img__new" />
                                    <label class="input-group-text" for="inputGroupFile02">Chọn hình</label>
                                </div>
                                <span class="text-danger fst-italic">
                                    @error('img__new')
                                        {{$message}}
                                    @enderror
                                </span>
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
                                      {{old('anHien')==0?'checked':false}}
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
                                      {{old('anHien')==1?'checked':false}}
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
                            <label for="exampleFormControlTextarea2" class="form-label">Tóm tắt</label>
                            <textarea class="form-control mb-3" name="title_pro" id="exampleFormControlTextarea2" rows="3"></textarea>
                            <span class="text-danger fst-italic">
                                @error('title_pro')
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
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2 col-2"> 
                                <i class="fas fa-save"></i> Lưu
                            </button>
                            <button type="reset" class="btn btn-danger ms-2 col-2"> 
                                <i class="fas fa-redo"></i> Làm mới
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

