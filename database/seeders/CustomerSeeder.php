<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'nama' => 'Juni',
                'alamat' => 'Jalan jalan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nikita',
                'alamat' => 'Jalan jalan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
