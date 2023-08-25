@extends('backend.layouts.master')

@section('title')
    Danh sách loại tin
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Sản phẩm /</span> Danh sách</h4>
    <!-- Bordered Table -->
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">Quản lý tin</h5>
            <div class="p-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tạo mới &nbsp;<i class="bi bi-plus-circle"></i></a>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm loại tin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="addCate" method="POST" action="{{route('cate-new.store')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label class="form-label" for="basic-default-fullname">Tiêu đề</label>
                                    <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name_title"
                                        placeholder="Tin mới nhất" name="title" value="{{old('title')}}"/>
                                    <span class="text-danger">
                                        @error('title')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Slug</label>
                                    <input type="text" class="form-control" id="convert_slug"
                                        placeholder="tin-moi-nhat" name="slug" readonly/>
                                </div>
                                <div class="col-xl-6 col-md mb-3">
                                    <div class="form-check form-check-inline mt-3">
                                        <input
                                          class="form-check-input"
                                          type="radio"
                                          name="anHien"
                                          id="inlineRadio1"
                                          value="0"
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
                                          checked
                                        />
                                        <label class="form-check-label" for="inlineRadio2">Hiện</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button class="btn btn-primary">Lưu lại</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 90px;">STT</th>
                            <th class="text-center">Tiêu đề</th>
                            <th class="text-center" style="width: 60px;">Hiển thị</th>
                            <th class="text-center" style="width: 60px;">Nổi bật</th>
                            <th class="text-center" style="width: 100px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listCate as $key => $item)
                            <tr>
                                <td>
                                    {{-- {{$loop->iteration}} --}}
                                    {{$key + 1}}
                                </td>
                                <td>
                                    {{ucfirst($item->ten)}}
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"  {{$item->anHien == 1?'checked':false}} />
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck4" checked />
                                </td>
                                <td class="text-center">
                                    <div>
                                        <a class="btn btn-success btn-sm me-1 btn__copy" href="#"><i class="fas fa-copy"></i></a>
                                        <a class="btn btn-primary btn-sm mx-1" href="{{url('admin/cate-new/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('cate-new.destroy', $item->id)}}" method="POST">
                                            @csrf  @method('DELETE')
                                            <button type='submit' onclick="return confirm('Bạn muốn xóa')" class="btn btn-danger btn-sm ms-1" >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mx-auto mb-2">
            {{$listCate->onEachSide(5)->links()}}
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection

{{-- @push('ajax-cate')
    <script>
        $(document).ready(function () {
            $('#addCate').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/admin/cate-new",
                    data: $('#addCate').serialize(),
                    success: function (respone) {
                        // alert('Đã thêm thành công');
                        $('#exampleModal').modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            })
        })
    </script>
@endpush --}}