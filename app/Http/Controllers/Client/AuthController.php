<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //đăng nhập
    public function showLogin(){
        return view('client/Auth/login');
    }

    public function login(Request $request){

        $user = $request->only('name', 'password');
        if (Auth::attempt($user) ) {
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->withErrors([
             'thông tin người dùng không đúng'
        ]);

    }
    //đăng ký
    public function showRegister(){
        return view('client/Auth/register');
    }
    public function register(Request $request){
        $data = $request->validate([
            'email' => 'required|string|email|max:255|unique:khach_hangs',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        $data['password'] = bcrypt($data['password']);

        // Lấy ID của quyền 'user'
        $userRoleId = DB::table('phan_quyens')->where('name', 'user')->value('id');

        // Thêm ID quyền vào mảng dữ liệu
        $data['phan_quyen_id'] = $userRoleId;

        // Tạo người dùng
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('client');

    }
    //đăng xuất
    public function logout(Request $request){
        if(Auth::user()->phan_quyen_id == 1){
            Auth::logout();
            return redirect('showLoginClient');
        }else{
            Auth::logout();
            return redirect('login');
        }

    }

    //Client
    public function showLoginClient(){
        return view('client/Auth/loginClient');
    }

    public function loginClient(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('client');
        }
        return redirect()->back()->withErrors([
            'message' => 'Thông tin người dùng không đúng'
        ]);
    }

}
