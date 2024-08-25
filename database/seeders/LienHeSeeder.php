<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $khach_hangs = DB::table('khach_hangs')->pluck('id')->toArray();
        $san_phams = DB::table('san_phams')->pluck('id')->toArray();

        foreach ($khach_hangs as $khach_hang) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('lien_hes')->insert([
                    'khach_hang_id' => $khach_hang,
                    'san_pham_id' => $san_phams[array_rand($san_phams)],
                    'noi_dung' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    'so_dien_thoai' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'ten_khach_hang' => $faker->name,
                ]);
            }
        }
    }
}
