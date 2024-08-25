<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Donhang;
use App\Models\KhachHang;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();

            $table->foreignIdFor(KhachHang::class)->constrained();

            $table->string('ten_nguoi_nhan');
            $table->string('so_dien_thoai', 10);
            $table->string('dia_chi')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->string('dia_chi_nguoi_nhan');
            $table->string('email')->nullable();

            $table->string('trang_thai_don_hang')->default(Donhang::CHO_XAC_NHAN);
            $table->string('trang_thai_thanh_toan')->default(Donhang::CHUA_THANH_TOAN);

            $table->double('tien_hang');
            $table->double('tien_ship');
            $table->double('tong_tien');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
