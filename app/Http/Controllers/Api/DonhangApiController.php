<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use Illuminate\Http\Request;

class DonhangApiController extends Controller
{
    public $don_hangs;

    public function __construct()
    {
        $this->don_hangs = new Donhang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Donhang::all();
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
        $donhang = DonHang::findOrFail($id);
        $newStatus = $request->input('trang_thai_don_hang');

        $statusCheck = $donhang->canChangeStatusTo($newStatus);

        if (!$statusCheck['success']) {
            return redirect()->back()->with('error', $statusCheck['message']);
        }

        // Cập nhật trạng thái đơn hàng
        $donhang->trang_thai_don_hang = $newStatus;
        $donhang->save();
        return response()->json([
            'thong_bao' => 'don hang đã được sửa thành công',
            'trang_thai_moi' => $newStatus,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donhang = $this->don_hangs->find($id);
        if(!$donhang) {
            return redirect()->route('admins.donhang.index');
        }
        $donhang->delete();
        return response()->json([
            'thong_bao' => 'Don hang đã được xóa thành công',
            'id' => $id
        ]);
    }
}
