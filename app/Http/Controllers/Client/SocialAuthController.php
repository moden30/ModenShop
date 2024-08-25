<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;



class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            // Lấy thông tin người dùng từ provider
            $user = Socialite::driver($provider)->user();

            // Tìm hoặc tạo người dùng trong cơ sở dữ liệu
            $findUser = KhachHang::where('provider_id', $user->getId())
                ->where('provider', $provider)
                ->first();

            if (!$findUser) {
                $findUser = KhachHang::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $user->getId(),
                    'anh' => $user->getAvatar(),
                    'password' => bcrypt(Str::random(16)), // Tạo mật khẩu ngẫu nhiên
                ]);
            }

            // Đăng nhập người dùng sau khi tạo
            Auth::login($findUser);

            // Điều hướng người dùng đến trang yêu cầu
            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect('/')->withErrors('Lỗi đăng ký: ' . $e->getMessage());
        }
    }

}
