<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $khach_hang;
    public function __construct(){
        $this->khach_hang = new KhachHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khach_hang = $this->khach_hang->getKhachhang(5);
        return view('admin.khachhang.index', compact('khach_hang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $khachHangModel = new KhachHang();
        $khachhang = $khachHangModel->getChiTiet()->where('id', $id)->first();

        if (!$khachhang) {
            return redirect()->route('admins.khachhang.index')->with('error', 'Khách hàng không tồn tại.');
        }

        return view('admin.khachhang.chitiet', compact('khachhang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khachhang = $this->khach_hang->find($id);
        if(!$khachhang) {
            return redirect()->route('admins.khachhang.index');
        }
        $khachhang->delete();
        return redirect()->route('admins.khachhang.index');
    }
}
