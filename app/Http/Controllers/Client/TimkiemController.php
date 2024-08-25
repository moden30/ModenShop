<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class TimkiemController extends Controller
{
    public function timkiem(Request $request){
//        $tk = SanPham::where('ten_san_pham', 'like', '%'.$request->key.'%')
//            ->orWhere('gia_sp', $request->key)
//            ->get();
//        return view('client.timkiem', compact('tk'));

        $key = $request->input('key');

        // Kiểm tra nếu giá trị tìm kiếm có phải là số
        if (is_numeric($key)) {
            $tk = SanPham::where('ten_san_pham', 'like', '%'.$key.'%')
                ->orWhere('gia_sp', $key)
                ->get();
        } else {
            // Nếu không phải là số, chỉ tìm kiếm theo tên sản phẩm
            $tk = SanPham::where('ten_san_pham', 'like', '%'.$key.'%')
                ->get();
        }

        return view('client.timkiem', compact('tk'));
    }

}
