@extends('client.layout.master')
@section('conten')
    <div class="container">
        <div class="row">
            <!-- Thông tin đơn hàng -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Thông tin đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Mã đơn hàng:</strong> {{ $donhang->ma_don_hang }}</p>
                        <p><strong>Người nhận:</strong> {{ $donhang->ten_nguoi_nhan }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $donhang->dia_chi_nguoi_nhan }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $donhang->so_dien_thoai }}</p>
                        <p><strong>Email:</strong> {{ $donhang->email }}</p>
                        <p><strong>Ghi chú:</strong> {{ $donhang->ghichu }}</p>
                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Sản phẩm đã đặt</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($donhangs as $chiTiet)
                                <tr>
                                    <td>{{ $chiTiet->ten_san_pham }}</td>
                                    <td>{{ number_format($chiTiet->don_gia, 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $chiTiet->so_luong }}</td>
                                    <td>{{ number_format($chiTiet->thanh_tien, 0, ',', '.') }} VNĐ</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Tổng tiền:</strong></td>
                                <td>{{ number_format($totalPrice, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
