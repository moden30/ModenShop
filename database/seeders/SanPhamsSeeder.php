<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class SanPhamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $faker->words(3, true),
                'gia_sp' => $faker->randomFloat(2, 10, 1000),
                'anh' => $faker->imageUrl(640, 480, 'products', true, 'Faker'),
                'mota_sp' => $faker->paragraph,
                'soluong_sp' => $faker->numberBetween(1, 100),
                'danh_muc_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
