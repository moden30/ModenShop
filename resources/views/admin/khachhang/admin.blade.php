@extends('admin.layout.master')

@section('conten')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <h2 class="card-header">Danh sách User</h2>
                    <div class="card-body">
{{--                        <a href="{{ route('admin.create') }}" class="btn btn-warning">Thêm</a>--}}
                        <table class="table">
                            <thead>
                            <th>STT</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Thao tác</th>
                            </thead>
                            <tbody>
                            @foreach ( $khach_hang as $index => $kh)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $kh->name }}</td>
                                    <td>{{ $kh->email }}</td>
                                    <td>{{ $kh->so_dien_thoai }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admins.admin.show', $kh->id) }}">
                                                <button class="btn btn-warning">chi tiết</button>
                                            </a>
                                            <form action="{{ route('admins.admin.destroy', $kh->id) }}" method="post"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .btn-group {
        display: flex;
        gap: 10px; /* Khoảng cách giữa các nút */
    }
</style>
