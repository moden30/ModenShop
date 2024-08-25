<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $don_hangs;

    public function __construct()
    {
        $this->don_hangs = new DonHang();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = $this->don_hangs->alldh();
        return view('admin.donhang.index', ['don_hangs' => $list]);
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
        $donhangModel = new Donhang();
        $donhang = $donhangModel->getChiTiet($id);

        if (!$donhang) {
            return redirect()->route('admins.donhang.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        return view('admin.donhang.chitiet', compact('donhang'));
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
    public function update(Request $request, $id)
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

        return redirect()->route('admins.donhang.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
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
        return redirect()->route('admins.donhang.index');
    }
//    public function print($id)
//    {
//        $donhang = DonHang::with('chiTietDonHang.sanPham')->findOrFail($id);
//        $pdf = PDF::loadView('admin.donhang.invoice', compact('donhang'));
//        return $pdf->download('invoice-' . $id . '.pdf');
//    }
}
