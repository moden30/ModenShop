@extends('admin.layout.master')

@section('conten')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Manage Comments</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="listjs-table" id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-success add-btn"
                                                        data-bs-toggle="modal" id="create-btn"
                                                        data-bs-target="#showModal"><i
                                                        class="ri-add-line align-bottom me-1"></i> Add
                                                </button>
                                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                        class="ri-delete-bin-2-line"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                           placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                               value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="customer_name">Tên Tài Khoản</th>
                                                <th class="sort" data-sort="product">Tên Sản Phẩm</th>
                                                <th class="sort" data-sort="content">Nội Dung</th>
                                                <th class="sort" data-sort="date">Ngày</th>
                                                <th class="sort">Thao Tác</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                            @foreach($binhluans as $binhluan)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                                   value="{{ $binhluan->id }}">
                                                        </div>
                                                    </th>
                                                    <td class="customer_name">{{ $binhluan->khachHang->name }}</td>
                                                    <td class="product">{{ $binhluan->sanPham->ten_san_pham }}</td>
                                                    <td class="content">
                                                        <textarea class="form-control" rows="3" style="width: 100%; resize: none;"
                                                                  readonly>{{ $binhluan->noi_dung }}</textarea>
                                                        </td>
                                                    <td class="date">{{ $binhluan->ngay_binh_luan }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="remove">
                                                                <form action="{{ route('admins.binhluan.destroy', $binhluan->id) }}" method="POST" style="display: inline;">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-sm btn-danger">Xóa</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Pagination Links -->
                                        <div class="d-flex justify-content-end">
                                            {{ $binhluans->links() }}
                                        </div>

                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                           colors="primary:#121331,secondary:#08a88a"
                                                           style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did
                                                    not find any orders for your search.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev {{ $binhluans->onFirstPage() ? 'disabled' : '' }}"
                                               href="{{ $binhluans->previousPageUrl() }}">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0">
                                                <!-- Pagination links are handled by {{ $binhluans->links() }} -->
                                            </ul>
                                            <a class="page-item pagination-next {{ !$binhluans->hasMorePages() ? 'disabled' : '' }}"
                                               href="{{ $binhluans->nextPageUrl() }}">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
@endsection
