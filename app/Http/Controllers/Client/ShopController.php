<?php
//
//namespace App\Http\Controllers\Client;
//
//use App\Http\Controllers\Controller;
//use App\Models\SanPham;
//use Illuminate\Http\Request;
//
//class ShopController extends Controller
//{
//    //trang sản phẩm
//    public function shop(){
//        $san_phams = SanPham::all();
//
//        // Trả về view với dữ liệu
//        return view('client.shop', compact('san_phams'));
//    }
//
//    //trang chi tiết sản phẩm
//    public function chitiet(string $id){
//        $sanpham = SanPham::query()->findOrFail($id);
//        $listsp = SanPham::query()->get();
//        return view('client.chitiet', compact('sanpham', 'listsp'));
//    }
//
//    //trang giỏ hàng
//    public function giohang()
//    {
//        $cart = session()->get('cart', []);
//
//        $total = 0;
//        $subTotal = 0;
//
//        foreach ($cart as $item) {
//            // Đảm bảo 'soluong_sp' luôn được khởi tạo
//            $quantity = $item['soluong_sp'] ?? 1; // Mặc định là 1 nếu không được thiết lập
//
//            // Kiểm tra sự tồn tại của 'gia_sp' và đảm bảo nó là số hợp lệ
//            $price = isset($item['gia_sp']) ? $item['gia_sp'] : 0;
//            if (is_numeric($price)) {
//                $subTotal += $price * $quantity;
//            }
//        }
//
//        $shipping = 100000;
//        $total = $subTotal + $shipping;
//
//        return view('client.giohang', compact('cart', 'subTotal', 'shipping', 'total'));
//    }
//
//    public function themgiohang(Request $request)
//    {
//        $request->validate([
//            'id' => 'required|integer|exists:san_phams,id',
//            'qty' => 'required|integer|min:1',
//        ]);
//
//        $id = $request->input('id');
//        $qty = $request->input('qty');
//        $sanpham = SanPham::query()->findOrFail($id);
//        $cart = session()->get('cart', []);
//
//        if (isset($cart[$id])) {
//            // Đảm bảo 'soluong_sp' là số nguyên và đã được khởi tạo
//            $cart[$id]['soluong_sp'] = ($cart[$id]['soluong_sp'] ?? 0) + $qty;
//        } else {
//            // Thêm sản phẩm mới vào giỏ
//            $cart[$id] = [
//                'ten_san_pham' => $sanpham->ten_san_pham,
//                'gia_sp' => $sanpham->gia_sp,
//                'anh' => $sanpham->anh,
//                'mota_sp' => $sanpham->mota_sp,
//                'soluong_sp' => $qty,
//            ];
//        }
//
//        session()->put('cart', $cart);
//        return redirect()->back();
//    }
//
//    public function suagiohang(Request $request)
//    {
//        // Lấy dữ liệu giỏ hàng từ request
//        $cart = $request->input('cart', []);
//
//        // Xác thực hoặc xử lý dữ liệu nếu cần
//        if (empty($cart)) {
//            return redirect()->back()->with('error', 'Giỏ hàng không có sản phẩm để cập nhật.');
//        }
//
//        // Cập nhật dữ liệu giỏ hàng vào session
//        session()->put('cart', $cart);
//
//        // Chuyển hướng lại với thông báo thành công
//        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật thành công.');
//    }
//
//
//
//}


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Trang sản phẩm
    public function shop()
    {
        $san_phams = SanPham::all();

        // Trả về view với dữ liệu
        return view('client.shop', compact('san_phams'));
    }

    // Trang chi tiết sản phẩm
    public function chitiet(string $id)
    {
        $sanpham = SanPham::query()->findOrFail($id);
        $listsp = SanPham::query()->get();

        // Lấy các bình luận cho sản phẩm
        $reviews = BinhLuan::where('san_pham_id', $id)->get();

        return view('client.chitiet', compact('sanpham', 'listsp', 'reviews'));
    }

    // Trang giỏ hàng
    public function giohang()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        $subTotal = 0;

        foreach ($cart as $item) {
            // Đảm bảo 'soluong_sp' luôn được khởi tạo
            $quantity = $item['soluong_sp'] ?? 1; // Mặc định là 1 nếu không được thiết lập

            // Kiểm tra sự tồn tại của 'gia_sp' và đảm bảo nó là số hợp lệ
            $price = isset($item['gia_sp']) ? $item['gia_sp'] : 0;
            if (is_numeric($price)) {
                $subTotal += $price * $quantity;
            }
        }

        $shipping = 100000;
        $total = $subTotal + $shipping;

        return view('client.giohang', compact('cart', 'subTotal', 'shipping', 'total'));
    }

    public function themgiohang(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:san_phams,id',
            'qty' => 'required|integer|min:1',
        ]);

        $id = $request->input('id');
        $qty = $request->input('qty');
        $sanpham = SanPham::query()->findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Đảm bảo 'soluong_sp' là số nguyên và đã được khởi tạo
            $cart[$id]['soluong_sp'] = ($cart[$id]['soluong_sp'] ?? 0) + $qty;
        } else {
            // Thêm sản phẩm mới vào giỏ
            $cart[$id] = [
                'ten_san_pham' => $sanpham->ten_san_pham,
                'gia_sp' => $sanpham->gia_sp,
                'anh' => $sanpham->anh,
                'mota_sp' => $sanpham->mota_sp,
                'soluong_sp' => $qty,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function suagiohang(Request $request)
    {
        // Lấy dữ liệu giỏ hàng từ request
        $cart = $request->input('cart', []);

        // Xác thực hoặc xử lý dữ liệu nếu cần
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng không có sản phẩm để cập nhật.');
        }

        // Cập nhật dữ liệu giỏ hàng vào session
        session()->put('cart', $cart);

        // Chuyển hướng lại với thông báo thành công
        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật thành công.');
    }

    // Lưu bình luận
    public function storeReview(Request $request)
    {
        $request->validate([
            'san_pham_id' => 'required|integer|exists:san_phams,id',
            'nickname' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        BinhLuan::create([
            'san_pham_id' => $request->input('san_pham_id'),
            'khach_hang_id' => 1, // Giả sử người dùng đang đăng nhập, thay thế bằng ID người dùng thực
            'noi_dung' => $request->input('review'),
            'ngay_binh_luan' => now(),
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được gửi.');
    }
}
