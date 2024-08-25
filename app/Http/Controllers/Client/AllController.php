<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\GioHang;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Illuminate\Http\Request;

class AllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSanPhams = SanPham::all()->shuffle(); // Trộn ngẫu nhiên các sản phẩm

        // Tách 5 sản phẩm đầu tiên cho danh sách 1
        $san_pham = $allSanPhams->slice(0, 5);

        // Tách 10 sản phẩm tiếp theo cho danh sách 2
        $san_phams = $allSanPhams->slice(5, 10);

        $danh_mucs = DanhMuc::all();
        $banners = Banner::all();
        $khuyen_mai = KhuyenMai::take(4)->get();
//        $giohang = GioHang::all();
        return view('client.index', compact('san_phams', 'danh_mucs', 'banners', 'san_pham', 'khuyen_mai'));
    }
}
