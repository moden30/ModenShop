<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $quyen = DB::table('phan_quyens')->pluck('id')->all();

        foreach (range(1, 10) as $index) {
            DB::table('khach_hangs')->insert([
                'name' => Str::random(10),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('admin'),
                'ten_khach_hang' => $faker->name(),
                'so_dien_thoai' => $faker->phoneNumber(),
                'phan_quyen_id' => $faker->randomElement($quyen),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
