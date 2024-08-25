<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->text('noi_dung');
            $table->date('ngay_binh_luan');
            $table->foreignId('khach_hang_id')->constrained('khach_hangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('san_pham_id')->constrained('san_phams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
