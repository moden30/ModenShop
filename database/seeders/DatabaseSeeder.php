<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PhanQuyenSeeder::class,
            NguoiDungSeeder::class,
            DanhMucsSeeder::class,
            SanPhamsSeeder::class,
            AnhSanPhamsSeeder::class,
            KhuyenMaiSeeder::class,
            BaiDangSeeder::class,
            DonHangSeeder::class,
            LienHeSeeder::class,
            BinhLuanSeeder::class,
            GioHangSeeder::class,
            BannerSeeder::class
        ]);
    }
}
