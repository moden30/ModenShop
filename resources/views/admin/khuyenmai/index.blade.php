@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách khuyến mại</h2>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khuyến mại</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Điều kiện áp dụng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($khuyenmai as $index => $sp)
                                <tr>
                                    <td>{{ $khuyenmai->firstItem() + $index }}</td>
                                    <td>{{ $sp->ten_khuyen_mai }}</td>
                                    <td>{{ $sp->ngay_bat_dau}}</td>
                                    <td>{{ $sp->ngay_ket_thuc }}</td>
                                    <td>{{ $sp->dieu_kien_ap_dung }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admins.khuyenmai.show', $sp->id) }}">
                                                <button class="btn btn-warning">Chi tiết</button>
                                            </a>
                                            <form action="{{ route('admins.khuyenmai.destroy', $sp->id) }}" method="post" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $khuyenmai->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .table th, .table td {
        text-align: center; /* Căn giữa nội dung trong các ô */
        vertical-align: middle; /* Căn giữa theo chiều dọc */
    }

    .table td img {
        object-fit: cover; /* Cắt ảnh cho khớp với khung */
    }

    .btn-group {
        display: flex;
        gap: 10px; /* Khoảng cách giữa các nút */
    }

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
