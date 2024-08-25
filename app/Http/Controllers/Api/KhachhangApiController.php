<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachhangApiController extends Controller
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
        $list = KhachHang::all();
        return response()->json($list);
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
        return response()->json([
            'thong_bao' => 'Khach hang đã được xóa thành công',
            'id' => $id
        ]);
    }
}
