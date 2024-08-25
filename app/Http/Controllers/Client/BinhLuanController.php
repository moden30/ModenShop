<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index()
    {
        $reviews = BinhLuan::with(['khachHang', 'sanPham'])->get();
        return view('client.chitiet', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        // Lưu bình luận mới vào cơ sở dữ liệu
        BinhLuan::create([
            'noi_dung' => $request->input('review'),
            'ngay_binh_luan' => now(),
            'khach_hang_id' => 1, // Ví dụ, bạn có thể lấy giá trị từ đăng nhập của người dùng
            'san_pham_id' => 1, // Ví dụ, bạn có thể lấy giá trị từ thông tin sản phẩm
        ]);

        return redirect()->route('reviews.index')->with('success', 'Thêm bình luận thành công!');
    }
}
