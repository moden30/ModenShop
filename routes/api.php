<?php

use App\Http\Controllers\Api\BannerApiController;
use App\Http\Controllers\Api\DonhangApiController;
use App\Http\Controllers\Api\KhachhangApiController;
use App\Http\Controllers\Api\KhuyenmaiApiController;
use App\Http\Controllers\Api\SanphamApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('banner', BannerApiController::class);
Route::apiResource('danhmuc', \App\Http\Controllers\Api\DanhmucApiController::class);
Route::apiResource('donhang', DonhangApiController::class);
Route::apiResource('khachhang', KhachhangApiController::class);
Route::apiResource('khuyenmai', KhuyenmaiApiController::class);
Route::apiResource('sanpham', SanphamApiController::class);
