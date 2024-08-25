<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('khuyen_mais')->insert([
                'ten_khuyen_mai' => $faker->name(),
                'mo_ta' => $faker->text(),
                'loai_khuyen_mai' => $faker->randomElement(['percent', 'hardPrice']),
                'gia_tri' => $faker->randomFloat(2, 10, 100),
                'ngay_bat_dau' => $faker->date(),
                'ngay_ket_thuc' => $faker->date(),
                'dieu_kien_ap_dung' => $faker->randomFloat([1, 2, 3, 4]),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
