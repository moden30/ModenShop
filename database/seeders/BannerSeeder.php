<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('banners')->insert([
                'ten_anh' => $faker->text($maxNbChars = 20),
                'anh_san_pham' => $faker->imageUrl($width = 640, $height = 480),
            ]);
        }
    }
}
