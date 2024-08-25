<?php

namespace App\Http\Controllers\Admin;

use App\Models\SanPham;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $san_phams;
    public function __construct(){
        $this->san_phams = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->query('timkiem', '');

        if (!empty($searchTerm)) {
            $list = $this->san_phams->search($searchTerm);
        } else {
            $list = $this->san_phams->getAll(5);
        }

        return view('admin.sanpham.index', ['san_phams' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danh_muc = DB::table('danh_mucs')->get();
        return view('admin.sanpham.add', ['danh_mucs' => $danh_muc]);
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
        $this->san_phams->themSP($dataInsert);
        return redirect()->route('admins.sanpham.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sanPham = $this->san_phams->find($id);
        $danh_mucs = DB::table('danh_mucs')->get();
        if(!$sanPham){
            return redirect()->route('admins.sanpham.index');
        }
        return view('admin.sanpham.update', compact('sanPham', 'danh_mucs'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //
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
        return redirect()->route('admins.sanpham.index');
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
        return redirect()->route('admins.sanpham.index');
    }
}
