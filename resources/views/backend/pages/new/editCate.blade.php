@extends('backend.layouts.master')

@section('title')
    Chỉnh sửa loại tin
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Loại tin /</span> Chỉnh sửa</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Điền thông tin</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('cate-new.update', $newCate->id )}}" method="post">
                        @csrf @method('PUT')
                        <div class="row mb-3">
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-fullname">Tiêu đề</label>
                                <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name_title"
                                    placeholder="Tin mới nhất" name="title" value="{{$newCate->ten}}"/>
                                <span class="text-danger">
                                    @error('title')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-xl-6 col-md mb-3">
                                <label class="form-label" for="basic-default-company">Slug</label>
                                <input type="text" class="form-control" id="convert_slug"
                                    placeholder="tin-moi-nhat" name="slug" readonly value="{{$newCate->slug}}"/>
                                <span class="text-danger">
                                    @error('slug')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-xl-6 col-md mb-3">
                                <div class="form-check form-check-inline mt-3">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="anHien"
                                      id="inlineRadio1"
                                      value="0"
                                      {{($newCate->anHien) == 0?'checked':''}}
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
                                      {{($newCate->anHien) == 1?'checked':''}}
                                    />
                                    <label class="form-check-label" for="inlineRadio2">Hiện</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary"> 
                                <i class="fas fa-save"></i> Cập nhập
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection