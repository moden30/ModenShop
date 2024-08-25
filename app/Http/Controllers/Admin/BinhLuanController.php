<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public $binhluans;
    public function __construct(){
        $this->binhluans = new BinhLuan();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginate comments, 5 per page
        $binhluans = BinhLuan::with(['khachHang', 'sanPham'])->paginate(5);

        return view('admin.binhluan.index', compact('binhluans'));
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
        //
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
    public function destroy($id)
    {
        $binhluan = BinhLuan::findOrFail($id);
        $binhluan->delete();

        return redirect()->route('admins.binhluan.index')->with('success', 'Bình luận đã bị xóa.');
    }


}
