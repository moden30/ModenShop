<?php

//Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\StatisticsController;
//client
use App\Http\Controllers\Client\AllController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\MyAccController;
use App\Http\Controllers\Client\OderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\SocialAuthController;
use App\Http\Controllers\Client\TimkiemController;


use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//đăng nhập , đang ký , đăng xuất
//admin
Route::get('login', [AuthController::class, 'showLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//client
Route::middleware(['guest'])->group(function () {
    Route::get('showLoginClient', [AuthController::class, 'showLoginClient'])->name('showLoginClient');
    Route::post('loginClient', [AuthController::class, 'loginClient'])->name('loginClient');
});


//
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);


//Admin
Route::middleware(['auth', 'auth.admin'])
    ->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('statistics', [StatisticsController::class, 'index'])->name('dashboard');
        //chức năng admin
        Route::resource('sanpham', SanPhamController::class);
        Route::resource('danhmuc', DanhMucController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('khachhang', KhachHangController::class);
        Route::resource('admin', AdminController::class);
        Route::resource('donhang', DonHangController::class);
        Route::resource('khuyenmai', KhuyenMaiController::class);
        Route::resource('binhluan', BinhLuanController::class);
        Route::delete('admins/binhluan/{id}', [BinhLuanController::class, 'destroy'])->name('admins.binhluan.destroy');

    });
// client
Route::middleware(['auth'])
    ->group(function () {
        Route::get('giohangs', [ShopController::class, 'giohang'])->name('giohangs');
        Route::post('themgiohang', [ShopController::class, 'themgiohang'])->name('themgiohang');
        //đơn hàng
        Route::get('index', [OderController::class, 'index'])->name('index');
        Route::get('create', [OderController::class, 'create'])->name('create');
        Route::post('store', [OderController::class, 'store'])->name('store');
        Route::get('show/{id}', [OderController::class, 'show'])->name('show');
        Route::put('{id}/update', [OderController::class, 'update'])->name('update');
        //tài khoản
        Route::get('myacc', [MyAccController::class, 'index'])->name('myacc');
        Route::post('/update-account', [MyAccController::class, 'updateAccount'])->name('updateAccount');
        Route::post('/reviews/store', [ShopController::class, 'storeReview'])->name('reviews.store');
    });
//dùng chung
Route::get('client', [AllController::class, 'index'])->name('client');
Route::get('shop', [ShopController::class, 'shop'])->name('shop');
Route::get('timkiem', [TimkiemController::class, 'timkiem'])->name('timkiem');
Route::get('/chitiet/{id}', [ShopController::class, 'chitiet'])->name('chitiet');
Route::post('suagiohang', [ShopController::class, 'suagiohang'])->name('suagiohang');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('product.filter');




