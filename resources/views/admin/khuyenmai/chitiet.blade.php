@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admins.khuyenmai.index', $khuyenmai->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Tên khuyến mại</label>
                                <input type="text" class="form-control" name="ten_khuyen_mai" value="{{ $khuyenmai->ten_khuyen_mai }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" name="mo_ta" value="{{ $khuyenmai->mo_ta }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Loại khuyến mại</label>
                                <input type="text" class="form-control" name="loai_khuyen_mai" value="{{ $khuyenmai->loai_khuyen_mai }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Giá trị</label>
                                <input type="text" class="form-control" name="gia_tri" value="{{ $khuyenmai->gia_tri }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ngày bắt đầu</label>
                                <input type="text" class="form-control" name="ten_nguoi_dat" value="{{ $khuyenmai->ngay_bat_dau }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ngày kết thúc</label>
                                <input type="text" class="form-control" name="so_luong" value="{{ $khuyenmai->ngay_ket_thuc }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Điều kiện</label>
                                <input type="text" class="form-control" name="khach_hang_id" value="{{ $khuyenmai->dieu_kien_ap_dung }}" disabled>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('admins.khuyenmai.index') }}" class="btn btn-warning">Quay lại</a>
                                <a href="{{ route('admins.khuyenmai.edit', $khuyenmai->id) }}" class="btn btn-primary">Sửa</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
