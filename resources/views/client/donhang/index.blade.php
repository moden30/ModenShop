@extends('client.layout.master')
@section('conten')
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">
                        <h2>Thanh Toán</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!-- Payment Method -->

                    <div class="payment-method">
                        <!-- Panel Gropup -->
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="panel-group" id="accordion3">
                                <!-- Panel Default -->
                                <div class="panel panel_default">
                                    <div class="panel_heading">
                                        <h4 class="check-title">
                                            <a data-bs-toggle="collapse" href="#checkut2">
                                                <span class="number">1</span>Thông Tin Thanh Toán</a>
                                        </h4>
                                    </div>
                                    <div id="checkut2" class="panel-collapse collapse" data-bs-parent="#accordion3">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="form">
                                                        <div class="card_control">
                                                            <ul>
                                                                <li>
                                                                    <div class="field fix">
                                                                        <input type="hidden" class=" border_color"
                                                                               name="khach_hang_id"
                                                                               value="{{ Auth::user()->id }}">
                                                                        <div class="input-box">
                                                                            <label class="label" for="first">Tên người
                                                                                nhận<em>*</em></label>
                                                                            <input type="text" class=" border_color"
                                                                                   name="ten_nguoi_nhan"
                                                                                   placeholder="Nhập tên người nhận"
                                                                                   value="{{ Auth::user()->ten_khach_hang }}">
                                                                            @error('ten_nguoi_nhan')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="input-box">
                                                                            <label class="label" for="middle">Số điện
                                                                                thoại người nhận </label>
                                                                            <input type="text" class=" border_color"
                                                                                   name="so_dien_thoai"
                                                                                   placeholder="Nhập số điện thoại người nhận"
                                                                                   value="{{ Auth::user()->so_dien_thoai }}">
                                                                            @error('so_dien_thoai')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="input-box">
                                                                            <label class="label" for="last">Email người
                                                                                nhận<em>*</em></label>
                                                                            <input type="email" class=" border_color"
                                                                                   name="email"
                                                                                   placeholder="Nhập email người nhận"
                                                                                   value="{{ Auth::user()->email }}">
                                                                            @error('email')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="field fix">
                                                                        <div class="input-box inhun">
                                                                            <label class="label" for="addr">Địa chỉ <em>*</em></label>
                                                                            <input type="text" class=" border_color"
                                                                                   name="dia_chi_nguoi_nhan"
                                                                                   placeholder="Nhập địa chỉ người nhận"
                                                                                   />
                                                                            @error('dia_chi_nguoi_nhan')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="field fix">
                                                                        <div class="input-box">
                                                                            <label class="label" for="City">Ghi
                                                                                chú </label>
                                                                            <textarea name="ghichu" cols="50" rows="3"
                                                                                      placeholder="Nhập ghi chu"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="button_check">
                                                            <div class="">
                                                                <span class="left_btn"><a href="#"><i
                                                                            class="fa fa-long-arrow-up"></i>Back</a></span>
                                                                <button type="submit"
                                                                        class="btn right_btn custom-button">Continue
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Panel Default -->
                                <!-- Panel Default -->
                                <div class="panel panel_default">
                                    <div class="panel_heading">
                                        <h4 class="check-title">
                                            <a data-bs-toggle="collapse" href="#checkut6">
                                                <span class="number">2</span>Thông tin sản phẩm</a>
                                        </h4>
                                    </div>
                                    <div id="checkut6" class="panel-collapse collapse" data-bs-parent="#accordion3">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="tablec">
                                                            <tr>
                                                                <td>Tên sản pẩm</td>
                                                                <td>Giá</td>
                                                                <td>Số lượng</td>
                                                                <td>Tổng giá</td>
                                                            </tr>
                                                            @foreach($cart as $item)
                                                                <tr>
                                                                    <td>
                                                                        {{ $item['ten_san_pham'] }}
                                                                    </td>
                                                                    <td>
                                                                        <p class="tabletextp">{{ number_format($item['gia_sp'], 0, ',', '.') }}
                                                                            vnđ</p></td>
                                                                    <td>{{ $item['soluong_sp'] }}</td>
                                                                    <td>
                                                                        <p class="tabletextp">{{ number_format($subtotal, 0, ',', '.') }}
                                                                            vnđ</p></td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td colspan="3">
                                                                    <p class="tabletext">Tổng giá sản phẩm</p>
                                                                    <p class="tabletext">Phí vận chuyển</p>
                                                                    <p class="tabletext">Tổng cộng</p>
                                                                </td>
                                                                <td>
                                                                    <p class="tabletextp">{{ number_format($subtotal, 0, ',', '.') }}
                                                                        vnđ</p>
                                                                    <input type="hidden" name="tien_hang"
                                                                           value="{{ $subtotal }}">

                                                                    <p class="tabletextp">{{ number_format($shipping, 0, ',', '.') }}
                                                                        vnđ</p>
                                                                    <input type="hidden" name="tien_ship"
                                                                           value="{{ $shipping }}">

                                                                    <p class="tabletextp">{{ number_format($total, 0, ',', '.') }}
                                                                        vnđ</p>
                                                                    <input type="hidden" name="tong_tien"
                                                                           value="{{ $total }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="button_check">
                                                                        <div class="">
                                                                            <span class="left_btn"><a
                                                                                    href="#"></a></span>
                                                                            <button type="submit"
                                                                                    class="btn right_btn custom-button">
                                                                                Đặt Hàng
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Panel Default -->
                            </div><!-- End Panel Gropup -->
                        </form>
                    </div><!-- End Payment Method -->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="checkout-sidebar">
                        <h4>Checkout Progress</h4>
                        <ul>
                            <li>Checkout Method</li>
                            <li>Billing Information</li>
                            <li>Shipping Method</li>
                            <li>Payment Information</li>
                            <li>Order Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
