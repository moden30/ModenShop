@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách sản phẩm</h2>
                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('admins.sanpham.create') }}">
                                            <button type="button" class="btn btn-success add-btn"
                                                    data-bs-toggle="modal" id="create-btn"
                                                    data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add
                                            </button>
                                        </a>

                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <form class="search-form d-flex" method="GET">
                                            <input type="text" class="form-control search" name="timkiem"
                                                   placeholder="Search..." value="{{ request()->query('timkiem') }}">
                                            <button type="submit" class="btn btn-primary ms-2">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Số lượng</th>
                                    <th>Danh mục</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($san_phams as $index => $sp)
                                    <tr>
                                        <td>{{ $san_phams->firstItem() + $index }}</td>
                                        <td>{{ $sp->ten_san_pham }}</td>
                                        <td>{{ number_format($sp->gia_sp, 2) }} VNĐ</td>
                                        <td>
                                            <img src="{{ Storage::url($sp->anh) }}" class="img-thumbnail" width="100"
                                                 height="100" alt="{{ $sp->ten_san_pham }}">
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3" style="width: 100%; resize: none;"
                                                      readonly>{{ strip_tags($sp->mota_sp) }}</textarea>
                                        </td>
                                        <td>{{ $sp->soluong_sp }}</td>
                                        <td>
                                            @if(isset($sp->danhMuc))
                                                <h6>{{ $sp->danhMuc->ten_danh_muc }}</h6>
                                            @else
                                            <h6>0 có</h6>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admins.sanpham.edit', $sp->id) }}">
                                                    <button class="btn btn-secondary">Sửa</button>
                                                </a>
                                                <form action="{{ route('admins.sanpham.destroy', $sp->id) }}"
                                                      method="post" style="display: inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            onclick="return confirm('Bạn có muốn xóa không?')"
                                                            class="btn btn-danger">Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $san_phams->appends(['timkiem' => request()->query('timkiem')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .search-form {
        display: flex;
        align-items: center;
    }

    .search-form .form-control {
        flex: 1;
        margin-right: 10px; /* Khoảng cách giữa input và nút tìm kiếm */
    }

    .search-form .btn-primary {
        height: 100%;
    }

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
