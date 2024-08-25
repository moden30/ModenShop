<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $khach_hang;
    public function __construct(){
        $this->khach_hang = new KhachHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khachHangModel = new KhachHang();
        $khach_hang = $khachHangModel->getAdmins();
        return view('admin.khachhang.admin', compact('khach_hang'));
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
            return redirect()->route('admins.khachhang.admin')->with('error', 'Khách hàng không tồn tại.');
        }

        return view('admin.khachhang.chitietAdmin', compact('khachhang'));
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
        //
    }
}
