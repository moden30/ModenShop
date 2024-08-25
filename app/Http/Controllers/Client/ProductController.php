<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $danh_muc = $request->query('danh_muc');
        $danh_mucs = DanhMuc::all();

        if ($danh_muc && $danh_muc !== 'All Categories') {
            // Lọc sản phẩm theo danh mục
            $san_phams = SanPham::whereHas('danhMuc', function ($query) use ($danh_muc) {
                $query->where('ten_danh_muc', $danh_muc);
            })->get();
        } else {
            $san_phams = SanPham::all();
        }

        return view('client.danhmuc', [
            'danh_mucs' => $danh_mucs,
            'san_phams' => $san_phams,
        ]);
    }

    public function filter(Request $request)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 10000000); // Set default max price or fetch from DB

        $san_phams = SanPham::whereBetween('gia_sp', [$minPrice, $maxPrice])->paginate(12);

        return view('client.shop', compact('san_phams'));
    }
//
//
//
//    public function index(Request $request)
//    {
//        $danh_muc = $request->query('danh_muc');
//        $danh_mucs = DanhMuc::all();
//
//        if ($danh_muc && $danh_muc !== 'All Categories') {
//            $sanphams = SanPham::whereHas('danhMuc', function ($query) use ($danh_muc) {
//                $query->where('ten_danh_muc', $danh_muc);
//            })->get();
//        } else {
//            $sanphams = SanPham::all();
//        }
//
//        return view('client.danhmuc', [
//            'danh_mucs' => $danh_mucs,
//            'sanphams' => $sanphams,
//        ]);
//    }
//
//    public function filter(Request $request)
//    {
//        $minPrice = $request->input('min_price', 0);
//        $maxPrice = $request->input('max_price', 10000000);
//
//        $sanphams = SanPham::whereBetween('gia_sp', [$minPrice, $maxPrice])->paginate(12);
//
//        return view('client.shop', compact('sanphams'));
//    }
//
//    public function showProduct($id)
//    {
//        $sanpham = SanPham::with('binhLuans.khachHang')->findOrFail($id);
//        $binhluans = BinhLuan::where('san_pham_id', $id)->get(); // Lấy tất cả bình luận của sản phẩm
//        $sanphams_khac = SanPham::where('id', '!=', $id)->take(4)->get(); // Lấy 4 sản phẩm khác
//
//        return view('client.chitiet', [
//            'sanpham' => $sanpham,
//            'binhluans' => $binhluans,
//            'sanphams_khac' => $sanphams_khac,
//        ]);
//    }
//
//    public function storeReview(Request $request, $productId)
//    {
//        $request->validate([
//            'noi_dung' => 'required|string',
//            'ngay_binh_luan' => 'required|date',
//        ]);
//
//        BinhLuan::create([
//            'san_pham_id' => $productId,
//            'khach_hang_id' => auth()->id(),
//            'noi_dung' => $request->noi_dung,
//            'ngay_binh_luan' => $request->ngay_binh_luan,
//        ]);
//
//        return redirect()->route('product.showProduct', $productId)->with('success', 'Review submitted successfully.');
//    }
}
