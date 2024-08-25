<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GioHangSeeder extends Seeder
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
            DB::table('gio_hangs')->insert([
                'khach_hang_id' => $khach_hang,
                'san_pham_id' => $san_phams[array_rand($san_phams)],
                'tong_gia' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
    }
}
