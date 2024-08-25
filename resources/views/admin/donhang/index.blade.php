@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách đơn hàng</h2>
                    <!-- Hiển thị thông báo thành công hoặc lỗi -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($don_hangs as $index => $dh)
                                <tr>
                                    <td>{{ ($don_hangs->currentPage() - 1) * $don_hangs->perPage() + $index + 1 }}</td>
                                    <td>{{ $dh->ten_nguoi_nhan }}</td>
                                    <td>{{ $dh->so_dien_thoai }}</td>
                                    {{--                                    <td>--}}
                                    {{--                                        <select class="form-select" name="trang_thai_don_hang">--}}
                                    {{--                                            @foreach(\App\Models\Donhang::TRANG_THAI_DON_HANG as $key => $value)--}}
                                    {{--                                                <option value="{{ $key }}" {{ $key == $dh->trang_thai_don_hang ? 'selected' : '' }}>--}}
                                    {{--                                                    {{ $value }}--}}
                                    {{--                                                </option>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </td>--}}
                                    <td>
                                        <form method="post" action="{{ route('admins.donhang.update', $dh->id) }}"
                                              style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="trang_thai_don_hang"
                                                    onchange="this.form.submit()">
                                                @foreach(\App\Models\DonHang::TRANG_THAI_DON_HANG as $key => $value)
                                                    <option
                                                        value="{{ $key }}" {{ $key == $dh->trang_thai_don_hang ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admins.donhang.show', $dh->id) }}">
                                                <button class="btn btn-warning">Chi tiết</button>
                                            </a>
{{--                                            <form action="{{ route('admins.donhang.destroy', $dh->id) }}" method="post"--}}
{{--                                                  style="display: inline;">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')"--}}
{{--                                                        class="btn btn-danger">Xóa--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $don_hangs->links('pagination::bootstrap-4') }}
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
