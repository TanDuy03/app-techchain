@extends('backend.layouts.master')

@section('title')
    Danh sách tin
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Sản phẩm /</span> Danh sách</h4>
    <!-- Bordered Table -->
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">Quản lý tin</h5>
            <div class="p-3">
                <a href="{{route('new.create')}}" class="btn btn-success">Tạo mới &nbsp;<i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">STT</th>
                            <th class="text-center" style="width: 100px;">Hình</th>
                            <th class="text-center">Tiêu đề</th>
                            <th class="text-center" style="width: 60px;">Hiển thị</th>
                            <th class="text-center" style="width: 60px;">Nổi bật</th>
                            <th class="text-center" style="width: 100px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listNew as $key => $item)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td>
                                    <div class="img__container_admin mx-auto">
                                        <img onerror="this.src='/upload/img_error.jpg'" src="/{{$item->urlHinh}}" class="img__list_admin" alt="">
                                    </div>
                                </td>
                                <td>{{ucfirst($item->tieuDe)}}</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" {{$item->anHien == 1?'checked':false}} />
                                </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck4" checked />
                                </td>
                                <td class="text-center">
                                    <div>
                                        <a class="btn btn-success btn-sm me-1 btn__copy" href="{{route('detail', $item->slug)}}" target="_blank"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-primary btn-sm mx-1" href="{{url('admin/new/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('new.destroy',$item->id)}}" method="POST">
                                            @csrf  @method('DELETE')
                                            <button type='submit' onclick="return confirm('Bạn muốn xóa mục này?')" class="btn btn-danger btn-sm ms-1" >
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
            {{$listNew->onEachSide(5)->links()}}
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection
