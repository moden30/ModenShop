@extends('admin.layout.master')

@section('conten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách ảnh banner</h2>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>STT</th>
                            <th>Tên ảnh</th>
                            <th>Ảnh banner</th>
                            <th>Thao tác</th>
                            </thead>
                            <tbody>
                            @foreach ( $banner as $index => $bn)
                                <tr>
                                    <td>{{ ($banner->currentPage() - 1) * $banner->perPage() + $index + 1 }}</td>
                                    <td>{{ $bn->ten_anh }}</td>
                                    <td>
                                        <img src="{{ Storage::url($bn->anh_san_pham)  }}" class="img-thumbnail" width="500px" height="200px"
                                             alt="">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admins.banner.edit', $bn->id) }}">
                                                <button class="btn btn-warning">Sửa</button>
                                            </a>
                                            <form action="{{ route('admins.banner.destroy', $bn->id) }}" method="post"
                                                  style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')"
                                                        class="btn btn-danger">Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $banner->links('pagination::bootstrap-4') }}
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
