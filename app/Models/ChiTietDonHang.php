<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_don_hang";
    protected $fillable = [
        'don_hang_id',
        'san_pham_id',
        'don_gia',
        'so_luong',
        'thanh_tien',
    ];
    public function donhang(){
        return $this->belongsTo(Donhang::class);
    }
    public function sanpham(){
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
    public function product()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}
