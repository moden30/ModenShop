<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyAccController extends Controller
{
    public $myacc;
    public function __construct(){
        $this->myacc = new KhachHang();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('client.myaccount', ['user' => $user]);
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu nhập vào
        $validated = $request->validate([
            'email' => 'required|email',
            'ten_khach_hang' => 'required|string|max:255',
            'so_dien_thoai' => 'required|string|max:15',
            'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm điều kiện xác thực cho ảnh
        ]);

        // Cập nhật thông tin người dùng
        $user->email = $validated['email'];
        $user->ten_khach_hang = $validated['ten_khach_hang'];
        $user->so_dien_thoai = $validated['so_dien_thoai'];

        // Xử lý ảnh tải lên
        if ($request->hasFile('anh')) {
            // Xóa ảnh cũ nếu có
            if ($user->anh) {
                Storage::delete('public/' . $user->anh);
            }

            // Tải ảnh lên và lưu đường dẫn vào cơ sở dữ liệu
            $image = $request->file('anh');
            $imagePath = $image->store('anh', 'public');
            $user->anh = $imagePath;
        }
        $user->save();

        // Thông báo thành công và chuyển hướng
        return redirect()->route('myacc')->with('success', 'Thông tin tài khoản đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
