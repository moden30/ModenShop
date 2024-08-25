<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GioHang extends Model
{
    protected $table = 'gio_hangs';
    use HasFactory;
    public function getAll(){
        return DB::table($this->table)->get();

    }
}
