<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhmucApiController extends Controller
{
    public $danh_mucs;
    public function __construct(){
        $this->danh_mucs = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = DanhMuc::all();
        return response()->json($list);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('anh')){
            $filename = $request->file('anh')->store('uploads/danhmuc', 'public');
        }
        else{
            $filename = null;
        }

        $damucInsert = [
            'ten_danh_muc' =>$request->ten_danh_muc,
            'anh' => $filename,

        ];
        $this->danh_mucs->themDM($damucInsert);
        return response()->json([
            'thong_bao' => 'Banner đã được thêm thành công',
            'ten_danh_muc' => $damucInsert['ten_danh_muc'],
            'anh' => $damucInsert['anh'],
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
        $danhMuc = $this->danh_mucs->find($id);
        if($request->hasFile('anh')){
            //xóa ảnh cũ
            if($danhMuc->anh){
                Storage::disk('public')->delete($danhMuc->anh);
            }
            //lưu ảnh
            $fileName = $request->file('anh')->store('uploads/sanpham', 'public');
        }
        //không có ảnh
        else{
            $fileName = $danhMuc->anh;
        }
        $damucUpdate = [
            'ten_danh_muc' =>$request->ten_danh_muc,
            'anh' => $fileName,
        ];
        $danhMuc->suaDM($damucUpdate, $id);
        return response()->json([
            'thong_bao' => 'Banner đã được sửa thành công',
            'ten_danh_muc' => $damucUpdate['ten_danh_muc'],
            'anh' => $damucUpdate['anh'],
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = $this->danh_mucs->find($id);
        if(!$danhMuc){
            return redirect()->route('admins.danhmuc.index');
        }
        //xóa ảnh
        if($danhMuc->anh){
            Storage::disk('public')->delete($danhMuc->anh);
        }
        //xóa sp
        $danhMuc->delete();
        return response()->json([
            'thong_bao' => 'Danh muc đã được xóa thành công',
            'id' => $id
        ]);
    }
}
