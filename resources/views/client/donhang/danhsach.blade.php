@extends('client.layout.master')

@section('conten')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Danh sách đơn hàng</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($donhangs as $donhang)
                        <tr>
                            <td>{{ $donhang->ma_don_hang }}</td>
                            <td>{{ $donhang->ten_nguoi_nhan }}</td>
                            <td>{{ $donhang->dia_chi_nguoi_nhan }}</td>
                            <td>{{ $donhang->trang_thai_don_hang }}</td>
                            <td>
                                <a href="{{ route('show', $donhang->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                                <form method="post" action="{{ route('update', $donhang->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    @if($donhang->trang_thai_don_hang === 'cho_xac_nhan')
                                        <input type="hidden" name="huy_don_hang" value="1">
                                        <button type="submit" onclick="return confirm('Bạn có muốn hủy đơn hàng không?')" class="btn btn-danger btn-sm">Hủy</button>
                                    @elseif($donhang->trang_thai_don_hang === 'dang_van_chuyen')
                                        <input type="hidden" name="dang_giao_hang" value="1">
                                        <button type="submit" onclick="return confirm('Xác nhận đã nhận hàng?')" class="btn btn-success btn-sm">Đã nhận</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Phân trang -->
                <div class="tab-bar tab-bar-bottom">
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="sort-by">
                                <label>Sort By</label>
                                <select>
                                    <option value="position">Position</option>
                                    <option value="name">Name</option>
                                    <option value="price">Price</option>
                                </select>
                                <a href="#"><i class="fa fa-long-arrow-up"></i></a>
                            </div>
                        </div>
                        <div class="pages">
                            <strong>Page:</strong>
                            <ol>
                                @if ($donhangs->currentPage() > 1)
                                    <li><a href="{{ $donhangs->previousPageUrl() }}"><i class="fa fa-arrow-left"></i></a></li>
                                @endif
                                @for ($i = 1; $i <= $donhangs->lastPage(); $i++)
                                    <li class="{{ $i == $donhangs->currentPage() ? 'current' : '' }}">
                                        <a href="{{ $donhangs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($donhangs->hasMorePages())
                                    <li><a href="{{ $donhangs->nextPageUrl() }}"><i class="fa fa-arrow-right"></i></a></li>
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table th, .table td {
            text-align: center; /* Căn giữa văn bản trong các ô */
        }

        .card {
            margin-top: 20px; /* Thêm khoảng cách giữa các card */
        }

        .btn {
            margin: 0 5px; /* Thêm khoảng cách giữa các nút */
        }

        .btn-sm {
            font-size: 0.875rem; /* Kích thước chữ nhỏ hơn cho các nút nhỏ */
        }

        .card-header {
            border-bottom: 2px solid #007bff; /* Thêm đường viền dưới tiêu đề card */
        }

        .card-body {
            padding: 1.5rem; /* Tăng khoảng cách bên trong card */
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .tab-bar {
            margin-top: 20px;
        }

        .tab-bar .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tab-bar .sorter {
            display: flex;
            align-items: center;
        }

        .tab-bar .sort-by select {
            margin-right: 10px;
        }

        .tab-bar .pages ol {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .tab-bar .pages ol li {
            margin: 0 5px;
        }

        .tab-bar .pages ol li.current a {
            font-weight: bold;
        }
    </style>
@endsection
