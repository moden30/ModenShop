<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    protected $table = 'danh_mucs';
    use HasFactory;
    public function allDM()
    {
        return DB::table($this->table)->paginate(5);
    }

    public function search($term)
    {
        return DB::table($this->table)
            ->where('ten_danh_muc', 'like', '%' . $term . '%')
            ->paginate(5);
    }
    public function themDM($data){
        DB::table('danh_mucs')->insert($data);
    }
    public function suaDM($data, $id){
        DB::table('danh_mucs')
        ->where('id', $id)
        ->update($data);
    }
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'danh_muc_id','id'); }

}
