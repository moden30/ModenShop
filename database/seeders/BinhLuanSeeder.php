<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
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
            for ($i = 1; $i <= 10; $i++) {
                DB::table('binh_luans')->insert([
                    'khach_hang_id' => $khach_hang,
                    'san_pham_id' => $san_phams[array_rand($san_phams)],
                    'noi_dung' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                    'ngay_binh_luan' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
                    'updated_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get())
                ]);
            }
        }

    }
}
