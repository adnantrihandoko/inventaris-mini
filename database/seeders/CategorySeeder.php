<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'ATK'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Dapur'],
        ]);
    }
}
