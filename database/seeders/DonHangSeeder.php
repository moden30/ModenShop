<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $khach_hangs = DB::table("khach_hangs")->pluck( "id")->all();
        $san_phams = DB::table("san_phams")->pluck( "id")->all();
        $khuyen_mais = DB::table("khuyen_mais")->pluck( "id")->all();

        foreach ($khach_hangs as $khach_hang) {
            foreach (range(1, 4) as $i) {
                DB::table('don_hangs')->insert([
                    'khach_hang_id' => $khach_hang,
                    'san_pham_id' => $faker->randomElement($san_phams),
                    'khuyen_mai_id' => $faker->randomElement($khuyen_mais),
                    'ngay_dat' => $faker->date(),
                    'tong_gia' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
                    'trang_thai' => $faker->numberBetween(['pending', 'processing', 'delivering', 'delivered', 'completed', 'canceled']),
                    'phuong_thuc_thanh_toan' => $faker->randomElement(['COD', 'Momo']),
                    'ten_nguoi_dat' => $faker->name(),
                    'so_luong' => $faker->numberBetween(1, 10),
                    'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-3 months', 'now'),

                ]);
            }
        }

    }
}
