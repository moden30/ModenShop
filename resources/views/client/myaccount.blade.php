@extends('client.layout.master')

@section('conten')
    <div class="container mt-4">
        <header class="header-top">
            <div class="container">
                <div class="call-header">
                    <p><i class="fa fa-phone"></i>Gọi cho chúng tôi miễn phí: <span>(+88) 01737803547</span></p>
                </div>
                <div class="header-login">
                    <a href="{{ route('showLoginClient') }}">Đăng Nhập</a>
                </div>
            </div>
        </header>
        <div class="row">
            <nav class="col-md-3">
                <div class="list-group">
                    <a href="#thong-tin-ca-nhan" class="list-group-item list-group-item-action">Thông Tin Cá Nhân</a>
                    <a href="#dia-chi" class="list-group-item list-group-item-action">Địa Chỉ</a>
                </div>
            </nav>
            <main class="col-md-9">
                <section id="thong-tin-ca-nhan" class="mb-4 form-section">
                    <h2>Thông Tin Cá Nhân</h2>
                    <form method="post" action="{{ route('updateAccount') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Tên Đăng Nhập</label>
                                <input type="text" class="form-control" id="username" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="full-name" class="form-label">Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="full-name" name="ten_khach_hang" value="{{ $user->ten_khach_hang }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="so-dien-thoai" class="form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" id="so-dien-thoai" name="so_dien_thoai" value="{{ $user->so_dien_thoai }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="profile-picture" class="form-label">Ảnh Hồ Sơ</label>
                                <input type="file" class="form-control" id="profile-picture" name="anh">
                                @if($user->anh)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $user->anh) }}" alt="Profile Picture" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @else
                                    <p class="mt-2 text-muted">Chưa có ảnh hồ sơ</p>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </form>
                </section>
            </main>
        </div>
    </div>

    <style>
        .header-top {
            color: white;
            padding: 10px 0;
        }
        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-top .call-header,
        .header-top .header-login {
            display: flex;
            align-items: center;
        }
        .header-top .call-header p,
        .header-top .header-login a {
            margin: 0;
        }
        .list-group-item {
            border-radius: 0;
            margin-bottom: 5px;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }
        .list-group-item:hover {
            background-color: #e9ecef;
        }
        .form-control {
            border-radius: 0.25rem;
            box-shadow: none;
        }
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .img-thumbnail {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
    </style>
@endsection
