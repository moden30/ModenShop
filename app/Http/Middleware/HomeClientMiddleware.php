<?php

namespace App\Http\Middleware;

use App\Models\DanhMuc;
use App\Models\GioHang;
use App\Models\SanPham;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $danhmuc = DanhMuc::all();
        view()->share('danh_mucs', $danhmuc);

//        $giohang = GioHang::all();
//        view()->share('giohang', $giohang);
//        $allSanPhams = SanPham::all()->shuffle();
//        $san_pham = $allSanPhams->slice(5, 10);
//        view()->share('client.shop', $san_pham);
        return $next($request);
    }
}
