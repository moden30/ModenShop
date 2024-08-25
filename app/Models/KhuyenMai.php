<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhuyenMai extends Model
{
    protected $table = 'khuyen_mais';
    use HasFactory;
    public function allKM(){
        return DB::table($this->table)->paginate(5);
    }

    public function getChiTiet($id = null)
    {
        $query = DB::table('khuyen_mais')
            ->select('khuyen_mais.*')
            ->orderBy('khuyen_mais.id', 'DESC');

        if ($id) {
            return $query->where('khuyen_mais.id', $id)->first();
        }

        return $query->get();
    }

    public function suaKM($data, $id){
        DB::table('khuyen_mais')
            ->where('id', $id)
            ->update($data);
    }

    public function themKM($data){
           DB::table('khuyen_mais')->insert($data);
    }
}
