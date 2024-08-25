{{--@component('mail::message')--}}
{{--    # Xác nhận đơn hàng--}}

{{--    Xin chào {{ $donhang->ten_nguoi_nhan }},--}}

{{--    Cảm ơn bạn đã tin tưởng và ủng hộ Sclothes. Đây là thông tin đơn hàng của bạn:--}}

{{--    *** Mã đơn hàng: ** {{ $donhang->ma_don_hang }}--}}

{{--    *** Sản phẩm đã đặt: **--}}
{{--    @foreach ($donhang->ChiTietDonHang as $chiTiet)--}}
{{--        - {{ $chiTiet->tien_hang }} x {{ $chiTiet->so_luong }}: {{ number_format($chiTiet->thanh_tien) }} VNĐ--}}
{{--    @endforeach--}}
{{--    *** Tổng tiền: ** {{ number_format($donhang->thanh_tien) }} VNĐ--}}

{{--    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng--}}

{{--    Cảm ơn bạn đã mua hàng của chúng tôi!--}}

{{--    Trân trọng.--}}

{{--@endcomponent--}}
