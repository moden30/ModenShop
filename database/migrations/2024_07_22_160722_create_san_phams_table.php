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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham',255);
            $table->double('gia_sp');
            $table->string('anh',255)->nullable();
            $table->text('mota_sp');
            $table->unsignedInteger('soluong_sp');
            //tạo khóa ngoại
            $table->foreignId('danh_muc_id')
                ->nullable()
                ->constrained('danh_mucs')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
