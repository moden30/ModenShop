@extends('admin.layout.master')

@section('conten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admins.khachhang.index', $khachhang->id) }}" method="POST"
                              enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{ $khachhang->name }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"
                                       value="{{ $khachhang->email }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tên</label>
                                <input type="text" class="form-control" name="ten_khach_hang" value="{{ $khachhang->ten_khach_hang }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Số điện thoại</label>
                                <input name="so_dien_thoai" class="form-control"
                                       value="{{ $khachhang->so_dien_thoai }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Quyền</label>
                                <input type="text" class="form-control" name="phan_quyen_id" value="{{ $khachhang->name }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ảnh đại diện</label>
                                <div class="profile-picture mb-3">
                                    @if($khachhang->anh)
                                        <img src="{{ asset('storage/' . $khachhang->anh) }}" alt="Profile Picture" class="img-thumbnail" width="150px" height="100px">
                                    @else
                                        <p class="text-muted">Chưa có ảnh đại diện.</p>
                                    @endif
                                </div>
                                <input type="file" class="form-control-file" name="anh">
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('admins.khachhang.index') }}" class="btn btn-warning">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .profile-picture {
            text-align: center;
        }
        .profile-picture img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .form-control-file {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
        }
    </style>
@endsection
