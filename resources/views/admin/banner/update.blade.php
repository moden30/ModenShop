@extends('admin.layout.master')

@section('conten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Sửa ảnh</h2>
                    <div class="card-body">
                        <form action="{{ route('admins.banner.update', $banner->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Tên ảnh</label>
                                <input type="text" class="form-control" name="ten_anh" value="{{ $banner->ten_anh }}"
                                       placeholder="tên ảnh">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" name="anh_san_pham" placeholder="Ảnh">
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
