<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenmaiApiController extends Controller
{
    public $khuyenmai;
    public function __construct()
    {
        $this->khuyenmai = new KhuyenMai();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = KhuyenMai::all();
        return response()->json($list);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataInsert = [
            'ten_khuyen_mai' => $request->ten_khuyen_mai,
            'mo_ta' => $request->mo_ta,
            'loai_khuyen_mai' => $request->loai_khuyen_mai,
            'gia_tri' => $request->gia_tri,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'dieu_kien_ap_dung' => $request->dieu_kien_ap_dung
        ];
//        dd($dataInsert);
        $khuyenMaiMoi = $this->khuyenmai->themKM($dataInsert);
        return response()->json([
            'thong_bao' => 'Khuyen mai đã được thêm thành công',
            'khuyen_mai' => $khuyenMaiMoi,
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
        $khuyenmai = $this->khuyenmai->find($id);

        $dataUpdate = [
            'ten_khuyen_mai' => $request->ten_khuyen_mai,
            'mo_ta' => $request->mo_ta,
            'loai_khuyen_mai' => $request->loai_khuyen_mai,
            'gia_tri' => $request->gia_tri,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'dieu_kien_ap_dung' => $request->dieu_kien_ap_dung
        ];
        $khuyenmai->suaKM($dataUpdate, $id);
        return response()->json([
            'thong_bao' => 'Khuyen mai đã được thêm thành công',
            'khuyen_mai' => $khuyenmai,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khuyenmai = $this->khuyenmai->find($id);
        if(!$khuyenmai){
            return redirect()->route('admins.khuyenmai.index');
        }
        $khuyenmai->delete();
        return response()->json([
            'thong_bao' => 'Khuyen mai đã được xóa thành công',
            'id' => $id
        ]);
    }
}
