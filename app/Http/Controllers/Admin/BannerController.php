<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class BannerController extends Controller
{
    public $banner ;
    public function __construct(){
        $this->banner = new Banner();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list = $this->banner->getAll();
        return view('admin.banner.index', ['banner'=>$list]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('anh_san_pham')){
            $filename = $request->file('anh_san_pham')->store('uploads/banner', 'public');
        }
        else{
            $filename = null;
        }

        $dataInsert = [
            'ten_anh' => $request->ten_anh,
            'anh_san_pham' => $filename,
        ];
        $this->banner->themBanner($dataInsert);
        return redirect()->route('admins.banner.index');
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
        $banner = $this->banner->find($id);
        if(!$banner){
            return redirect()->route('admins.banner.index');
        }
        return view('admin.banner.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $banner = $this->banner->find($id);
        if($request->hasFile('anh_san_pham')){
            //xóa ảnh cũ
            if($banner->anh_san_pham){
                Storage::disk('public')->delete($banner->anh_san_pham);
            }
            //lưu ảnh
            $fileName = $request->file('anh_san_pham')->store('uploads/banner', 'public');
        }
        //không có ảnh
        else{
            $fileName = $banner->anh_san_pham;
        }
        $dataUpdate = [
            'ten_anh' =>$request->ten_anh,
            'anh_san_pham' => $fileName,
        ];
        $banner->suaBanner($dataUpdate, $id);
        return redirect()->route('admins.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //tìm sp
        $banner = $this->banner->find($id);
        if(!$banner){
            return redirect()->route('admins.banner.index');
        }
        //xóa ảnh
        if($banner->anh_san_pham){
            Storage::disk('public')->delete($banner->anh_san_pham);
        }
        //xóa sp
        $banner->delete();
        return redirect()->route('admins.banner.index');
    }
}
