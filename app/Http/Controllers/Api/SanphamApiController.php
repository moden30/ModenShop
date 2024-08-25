<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SanphamApiController extends Controller
{
    public $san_phams;
    public function __construct(){
        $this->san_phams = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SanPham::all();
        return response()->json($list);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->hasFile('anh')){
            $filename = $request->file('anh')->store('uploads/sanpham', 'public');
        }
        else{
            $filename = null;
        }

        $dataInsert = [
            'ten_san_pham' => $request->ten_san_pham,
            'gia_sp' => $request->gia_sp,
            'anh' => $filename,
            'mota_sp' => $request->mota_sp,
            'soluong_sp' => $request->soluong_sp,
            'danh_muc_id' => $request->danh_muc_id,
        ];
        $sanphammoi = $this->san_phams->themSP($dataInsert);
        return response()->json([
            'thong_bao' => 'Sản phẩm đã được thêm thành công',
            'san_pham' => $sanphammoi,
    ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sanPham = $this->san_phams->find($id);
        if($request->hasFile('anh')){
            //xóa ảnh cũ
            if($sanPham->anh){
                Storage::disk('public')->delete($sanPham->anh);
            }
            //lưu ảnh
            $fileName = $request->file('anh')->store('uploads/sanpham', 'public');
        }
        //không có ảnh
        else{
            $fileName = $sanPham->anh;
        }
        $dataUpdate = [
            'ten_san_pham' => $request->ten_san_pham,
            'gia_sp' => $request->gia_sp,
            'anh' => $fileName,
            'mota_sp' => $request->mota_sp,
            'soluong_sp' => $request->soluong_sp,
            'danh_muc_id' => $request->danh_muc_id,
        ];
        $sanPham->suaSP($dataUpdate, $id);
          return response()->json([
            'thong_bao' => 'Sản phẩm đã được thêm thành công',
            'san_pham' => $sanPham,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = $this->san_phams->find($id);
        if(!$sanPham){
            return redirect()->route('admins.sanpham.index');
        }
        //xóa ảnh
        if($sanPham->anh){
            Storage::disk('public')->delete($sanPham->anh);
        }
        //xóa sp
        $sanPham->delete();
        return response()->json([
            'thong_bao' => 'Banner đã được xóa thành công',
            'id' => $id
        ]);
    }
}
