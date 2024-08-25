<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donhang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    public function alldh()
    {
        // Sử dụng query builder với phân trang
        return DB::table($this->table)->paginate(5);
    }

    public function canChangeStatusTo($newStatus)
    {
        $currentStatus = $this->trang_thai_don_hang;

        if ($currentStatus === 'dang_chuan_bi' && $newStatus === 'cho_xac_nhan') {
            return [
                'success' => false,
                'message' => 'Không thể chuyển trạng thái từ "Đang chuẩn bị" về "Chờ xác nhận".'
            ];
        }

        // Thêm các điều kiện khác nếu cần
        return [
            'success' => true,
            'message' => 'Trạng thái có thể thay đổi.'
        ];
    }
    public function getChiTiet($id = null)
    {
//

        $query = DB::table('don_hangs')
            ->join('khach_hangs', 'don_hangs.khach_hang_id', '=', 'khach_hangs.id')
            ->select(
                'don_hangs.*',
                'khach_hangs.ten_khach_hang',
            )
            ->orderBy('don_hangs.id', 'DESC');
        if ($id) {
            return $query->where('don_hangs.id', $id)->first();
        }

        return $query->get();
    }
    const TRANG_THAI_DON_HANG = [
        'cho_xac_nhan' => 'Chờ xác nhận',
        'da_xac_nhan' => 'Đã xác nhận',
        'dang_chuan_bi' => 'Đang chuẩn bị',
        'dang_van_chuyen' => 'Đang vận chuyển',
        'da_giao_hang' => 'Đã giao hàng',
        'huy_don_hang' => 'Hủy đơn hàng'
    ];

    const TRANG_THAI_THANH_TOAN = [
        'chua_thanh_toan' => 'Chưa thanh toán',
        'da_thanh_toan' => 'Đã thanh toán'
    ];

    // Các hằng số trạng thái đơn hàng
    const CHO_XAC_NHAN = 'cho_xac_nhan';
    const DA_XAC_NHAN = 'da_xac_nhan';
    const DANG_CHUAN_BI = 'dang_chuan_bi';
    const DANG_VAN_CHUYEN = 'dang_van_chuyen';
    const DA_GIAO_HANG = 'da_giao_hang';
    const HUY_DON_HANG = 'huy_don_hang';
    const CHUA_THANH_TOAN = 'chua_thanh_toan';
    const DA_THANH_TOAN = 'da_thanh_toan';

    protected $fillable = [
        'ma_don_hang',
        'khach_hang_id',
        'ten_nguoi_nhan',
        'so_dien_thoai',
        'dia_chi',
        'ghi_chu',
        'dia_chi_nguoi_nhan',
        'trang_thai_don_hang',
        'trang_thai_thanh_toan',
        'tien_hang',
        'tien_ship',
        'tong_tien',
    ];

    public function user()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }

    public function ChiTietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id');
    }

    public function details()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id');
    }
}


