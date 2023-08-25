<!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Từ khóa sản phẩm">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Hãng sản xuất</option>
                                    {{-- @foreach ($catePro as $item)
                                        <option value="{{$item->ten_loai}}">{{$item->ten_loai}}</option>
                                    @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Mức giá</option>
                                <option value="1">7 - 10 triệu</option>
                                <option value="2">12 - 15 triệu</option>
                                <option value="3">Hơn 20 triệu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger border-0 w-100 py-3">Tìm</button>
                </div>
            </div>
        </div>
    </div>
<!-- Search End -->