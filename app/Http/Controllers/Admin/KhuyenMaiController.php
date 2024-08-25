<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KhuyenMaiController extends Controller
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
        $list = $this->khuyenmai->allKM();
        return view('admin.khuyenmai.index', ['khuyenmai'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.khuyenmai.add');
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
        $this->khuyenmai->themKM($dataInsert);
        return redirect()->route('admins.khuyenmai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $khuyenmaiModel = new KhuyenMai();
        $khuyenmai = $khuyenmaiModel->getChiTiet()->where('id', $id)->first();

        if (!$khuyenmai) {
            return redirect()->route('admins.khuyenmai.index')->with('error', 'không tồn tại.');
        }

        return view('admin.khuyenmai.chitiet', compact('khuyenmai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $khuyenmai = KhuyenMai::findOrFail($id);
        return view('admin.khuyenmai.update', compact('khuyenmai'));
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
        return redirect()->route('admins.khuyenmai.index');
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
        return redirect()->route('admins.khuyenmai.index');
    }
}
