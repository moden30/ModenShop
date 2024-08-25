<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerApiController extends Controller
{
    public $banner ;
    public function __construct(){
        $this->banner = new Banner();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::all();
        return response()->json($list);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('anh_san_pham')){
        $filename = $request->file('anh_san_pham')->store('uploads/banner', 'public');
    }
    else{
        $filename = null;
    }

        $dataInsert = [
            'ten_anh' => $request->ten_anh,
            'anh_san_pham' => $filename,
        ];
        $this->banner->themBanner($dataInsert);
        return response()->json([
            'thong_bao' => 'Banner đã được thêm thành công',
            'ten_anh' => $dataInsert['ten_anh'],
            'duong_dan_anh' => $dataInsert['anh_san_pham'],
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
        $banner = $this->banner->find($id);
        if($request->hasFile('anh_san_pham')){
            //xóa ảnh cũ
            if($banner->anh_san_pham){
                Storage::disk('public')->delete($banner->anh_san_pham);
            }
            //lưu ảnh
            $fileName = $request->file('anh_san_pham')->store('uploads/banner', 'public');
        }
        //không có ảnh
        else{
            $fileName = $banner->anh_san_pham;
        }
        $dataUpdate = [
            'ten_anh' =>$request->ten_anh,
            'anh_san_pham' => $fileName,
        ];
        $banner->suaBanner($dataUpdate, $id);
        return response()->json([
            'thong_bao' => 'Banner đã được sửa thành công',
            'ten_anh' => $dataUpdate['ten_anh'],
            'duong_dan_anh' => $dataUpdate['anh_san_pham'],
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = $this->banner->find($id);
        if(!$banner){
            return redirect()->route('admins.banner.index');
        }
        //xóa ảnh
        if($banner->anh_san_pham){
            Storage::disk('public')->delete($banner->anh_san_pham);
        }
        //xóa sp
        $banner->delete();
        return response()->json([
            'thong_bao' => 'Banner đã được xóa thành công',
            'id' => $id
        ]);
    }
}
