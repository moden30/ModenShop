<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class AnhSanPhamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách tất cả san_pham_id từ bảng san_phams
        $sanPhamIds = DB::table('san_phams')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('anh_san_phams')->insert([
                'anh_san_pham' => $faker->imageUrl(640, 480, 'products', true, 'Faker'),
                'san_pham_id' => $faker->randomElement($sanPhamIds), // Chọn ngẫu nhiên một id từ danh sách san_pham_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
