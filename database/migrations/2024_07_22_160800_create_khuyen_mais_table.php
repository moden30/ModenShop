<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khuyen_mai', 255);
            $table->text('mo_ta')->nullable();
            $table->string('loai_khuyen_mai', 50);
            $table->double('gia_tri');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->text('dieu_kien_ap_dung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
