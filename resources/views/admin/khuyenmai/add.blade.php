@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Thêm khuyến mại </h2>
                    <div class="card-body">
                        <form action="{{ route('admins.khuyenmai.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Tên khuyến mại</label>
                                <input type="text" class="form-control" name="ten_khuyen_mai" placeholder="ten_khuyen_mai">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea name="mo_ta" class="ckeditor" cols="30" rows="10"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Loại khuyến mại</label>
                                <input type="text"  class="form-control" name="loai_khuyen_mai" placeholder="loai_khuyen_mai">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Giá trị</label>
                                <input type="text" class="form-control" name="gia_tri" placeholder="gia_tri">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="ngay_bat_dau" placeholder="ngay_bat_dau">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="ngay_ket_thuc" placeholder="ngay_ket_thuc">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Điều kiện</label>
                                <input type="text" class="form-control" name="dieu_kien_ap_dung" placeholder="dieu_kien_ap_dung">
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

