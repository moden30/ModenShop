<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnhSanPham extends Model
{
    protected $table = 'anh_san_phams';
    use HasFactory;
    public function getAll(){
        return DB::table($this->table)->get();
    }
}
