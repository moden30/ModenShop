<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiDangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $khach_hangs = DB::table("khach_hangs")->pluck("id")->toArray();

        foreach ($khach_hangs as $khach_hang) {
            foreach (range(1, 4) as $i) {
                DB::table('bai_dangs')->insert([
                    'tieu_de' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'noi_dung' => $faker->text($maxNbChars = 200),
                    'anh_noi_dung' => $faker->imageUrl($width = 640, $height = 480),
                    'ngay_dang' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'khach_hang_id' => $khach_hang,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
