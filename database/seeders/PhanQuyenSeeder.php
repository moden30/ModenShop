<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quyens = [
            'user',
            'admin'
        ];

        foreach ($quyens as $quyen) {
            DB::table('phan_quyens')->insert([
                'name' => $quyen,
                'description' => 'hehe',
            ]);
        }
    }
}
