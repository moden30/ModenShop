<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Donhang;
use App\Models\SanPham;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//    public function up(): void
//    {
//        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
//            $table->id();
//            $table->foreignIdFor(Donhang::class)->constrained();
//            $table->foreignIdFor(SanPham::class)->constrained();
//
//            $table->double('don_gia');
//            $table->unsignedInteger('so_luong');
//            $table->double('thanh_tien');
//            $table->timestamps();
//        });
//    }
    public function up(): void
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('don_hang_id')->constrained('don_hangs');
            $table->foreignId('san_pham_id')->constrained('san_phams');

            $table->double('don_gia');
            $table->unsignedInteger('so_luong');
            $table->double('thanh_tien');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
