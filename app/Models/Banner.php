<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    protected $table = 'banners';
    use HasFactory;
    public function getAll(){
        return DB::table($this->table)->paginate(5);
    }
    public function themBanner($data){
        DB::table('banners')->insert($data);
    }

    public function suaBanner($data, $id){
        DB::table('banners')
        ->where('id',$id)
        ->update($data);
    }
}
