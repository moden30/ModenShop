<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class DanhMucController extends Controller
{
    public $danh_mucs;
    public function __construct(){
        $this->danh_mucs = new DanhMuc();
    }
    /**
     * Display a listing of the resource
     */
    public function index(Request $request)
    {
        if ($request->has('timkiem') && $request->timkiem != '') {
            $list = $this->danh_mucs->search($request->timkiem);
        } else {
            $list = $this->danh_mucs->allDM();
        }
        return view('admin.danhmuc.index', ['danh_mucs' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.danhmuc.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return redirect()->route('admins.danhmuc.index');
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
        $danhMuc = $this->danh_mucs->find($id);
        if(!$danhMuc){
            return redirect()->route('admins.danhmuc.index');
        }
        return view('admin.danhmuc.update', compact('danhMuc'));
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
        return redirect()->route('admins.danhmuc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //tìm sp
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
        return redirect()->route('admins.danhmuc.index');
    }
}
