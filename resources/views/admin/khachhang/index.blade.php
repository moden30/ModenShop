@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách khách hàng</h2>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Đăng Nhập</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($khach_hang as $index => $kh)
                                <tr>
                                    <td>{{ ($khach_hang->currentPage() - 1) * $khach_hang->perPage() + $index + 1 }}</td>
                                    <td>{{ $kh->name }}</td>
                                    <td>{{ $kh->email }}</td>
                                    <td>{{ $kh->so_dien_thoai }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admins.khachhang.show', $kh->id) }}">
                                                <button class="btn btn-warning">Chi tiết</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $khach_hang->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .table th, .table td {
        width: 20%; /* Điều chỉnh nếu cần */
    }

    .btn-group {
        display: flex;
        gap: 10px; /* Khoảng cách giữa các nút */
    }

    /* Custom pagination styles */
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination .page-item {
        margin: 0 2px;
    }

    .pagination .page-link {
        padding: 0.5rem 1rem; /* Điều chỉnh kích thước padding để nút lớn hơn */
        border-radius: 0.25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        color: #007bff;
        font-size: 1rem; /* Kích thước chữ */
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>
