<?php
//
//namespace App\Models;
//
//use App\Models\Donhang;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\DB;
//
//class KhachHang extends Model
//{
//    use HasFactory, Notifiable;
//
//    public function getAdmins($perPage = 5)
//    {
//        $khach_hangs = DB::table('khach_hangs')
//            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
//            ->select('khach_hangs.*', 'phan_quyens.name')
//            ->where('phan_quyens.name', '=', 'admin')
//            ->orderBy('khach_hangs.id', 'DESC')
//            ->get();
//        return $khach_hangs;
//    }
//
//    public function getKhachhang($perPage = 5)
//    {
//        return DB::table('khach_hangs')
//            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
//            ->select('khach_hangs.*', 'phan_quyens.name')
//            ->where('phan_quyens.name', '=', 'user')
//            ->orderBy('khach_hangs.id', 'DESC')
//            ->paginate($perPage);
//    }
//
//    public function getChiTiet($id = null)
//    {
//        $query = DB::table('khach_hangs')
//            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
//            ->select('khach_hangs.*', 'phan_quyens.name')
//            ->orderBy('khach_hangs.id', 'DESC');
//
//        if ($id) {
//            return $query->where('khach_hangs.id', $id)->first();
//        }
//
//        return $query->get();
//    }
//
//    public function donHang()
//    {
//        return $this->hasMany(Donhang::class, 'khach_hang_id');
//    }
//    protected $fillable = [
//        'name',
//        'email',
//        'so_dien_thoai',
//        'ten_khach_hang',
//    ];
//    public function binhLuans()
//    {
//        return $this->hasMany(BinhLuan::class);
//    }
//}


namespace App\Models;

use App\Models\Donhang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class KhachHang extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'so_dien_thoai',
        'ten_khach_hang',
        'provider',
        'provider_id',
        'anh',
    ];

    public function getAdmins($perPage = 5)
    {
        $khach_hangs = DB::table('khach_hangs')
            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
            ->select('khach_hangs.*', 'phan_quyens.name')
            ->where('phan_quyens.name', '=', 'admin')
            ->orderBy('khach_hangs.id', 'DESC')
            ->get();
        return $khach_hangs;
    }

    public function getKhachhang($perPage = 5)
    {
        return DB::table('khach_hangs')
            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
            ->select('khach_hangs.*', 'phan_quyens.name')
            ->where('phan_quyens.name', '=', 'user')
            ->orderBy('khach_hangs.id', 'DESC')
            ->paginate($perPage);
    }

    public function getChiTiet($id = null)
    {
        $query = DB::table('khach_hangs')
            ->join('phan_quyens', 'khach_hangs.phan_quyen_id', '=', 'phan_quyens.id')
            ->select('khach_hangs.*', 'phan_quyens.name')
            ->orderBy('khach_hangs.id', 'DESC');

        if ($id) {
            return $query->where('khach_hangs.id', $id)->first();
        }

        return $query->get();
    }

    public function donHang()
    {
        return $this->hasMany(Donhang::class, 'khach_hang_id');
    }

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class);
    }

    public static function findOrCreateUserFromProvider($provider, $providerId, $userData)
    {
        $user = self::where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

        if (!$user) {
            $user = self::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'provider' => $provider,
                'provider_id' => $providerId,
//                'anh' => $userData['avatar'] ?? null,
            ]);
        }

        return $user;
    }
}
