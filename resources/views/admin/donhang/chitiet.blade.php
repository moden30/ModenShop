@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admins.donhang.index', $donhang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Mã Đơn Hàng</label>
                                <input type="text" class="form-control" name="ma_don_hang" value="{{ $donhang->ma_don_hang }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tên Người Nhận</label>
                                <input type="text" class="form-control" name="ten_nguoi_nhan" value="{{ $donhang->ten_nguoi_nhan }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" name="so_dien_thoai" value="{{ $donhang->so_dien_thoai }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Địa Chỉ người nhận</label>
                                <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="{{ $donhang->dia_chi_nguoi_nhan }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Ghi Chú</label>
                                <input type="text" class="form-control" name="ghi_chu" value="{{ $donhang->ghi_chu }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $donhang->email }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Trạng thái đơn hàng</label>
                                <input type="text" class="form-control" name="trang_thai_don_hang" value="{{ $donhang->trang_thai_don_hang }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Trạng thái thanh toán</label>
                                <input type="text" class="form-control" name="trang_thai_thanh_toan" value="{{ $donhang->trang_thai_thanh_toan }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tiền hàng</label>
                                <input type="text" class="form-control" name="tien_hang" value="{{ $donhang->tien_hang }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tiền ship</label>
                                <input type="text" class="form-control" name="tien_ship" value="{{ $donhang->tien_ship }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" name="tong_tien" value="{{ $donhang->tong_tien }}" disabled>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('admins.donhang.index') }}" class="btn btn-warning">Quay lại</a>
                                <button type="button" class="btn btn-primary ms-2" onclick="window.print()">In hóa đơn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<script>--}}
{{--    @media print {--}}
{{--        .no-print {--}}
{{--            display: none;--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}

@endsection
