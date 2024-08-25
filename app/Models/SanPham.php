<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SanPham extends Model
{
    protected $table = 'san_phams';
    use HasFactory;
//    public function getAll($perPage = 5)
//    {
//        return DB::table('san_phams')
//            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
//            ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
//            ->orderBy('san_phams.id', 'DESC')
//            ->paginate($perPage);
//    }
    public function search($term)
    {
        return SanPham::with('danhMuc')
            ->where('ten_san_pham', 'LIKE', '%' . $term . '%')
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    public function getAll($perPage = 5)
    {
        return SanPham::with('danhMuc')
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    //thêm sp
    public function themSP($data){
        DB::table('san_phams')->insert(
            [
                'ten_san_pham' => $data['ten_san_pham'],
                'gia_sp' => $data['gia_sp'],
                'anh' => $data['anh'],
                'mota_sp' => $data['mota_sp'],
                'soluong_sp' => $data['soluong_sp'],
                'danh_muc_id' => $data['danh_muc_id']
            ]
            );
            //   DB::table('san_phams')->insert($data);
    }

    //sửa
    public function suaSP($data, $id){
        DB::table('san_phams')
        ->where('id', $id)
        ->update($data);
    }
    public function anh(){
        return $this->hasMany(AnhSanPham::class);
    }
    public function chitietdonhang()
    {
        return $this->belongsTo(ChiTietDonHang::class);
    }

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id' , 'id');
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class);
    }

}
