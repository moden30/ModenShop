@extends('admin.layout.master')

@section('conten')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
        <div class="card">
            <h2 class="card-header">Thêm sản phẩm</h2>
        <div class="card-body">
            <form action="{{ route('admins.sanpham.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="ten_san_pham" placeholder="tên sp">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Gía</label>
                <input type="number" min="1" class="form-control" name="gia_sp" placeholder="gia_sp">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="anh" placeholder="Ảnh">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="mota_sp"  class="ckeditor" cols="30" rows="10" placeholder="mota_sp"></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="number" min="1" class="form-control" name="soluong_sp" placeholder="soluong_sp">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Danh mục</label>
                <select class="form-select" name="danh_muc_id">
                    <option selected>Chọn danh mục</option>
                    @foreach ($danh_mucs as $dm)
                        <option value="{{ $dm->id }}">{{ $dm->ten_danh_muc }}</option>
                    @endforeach
               </select>
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Thêm mới</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

@endsection
