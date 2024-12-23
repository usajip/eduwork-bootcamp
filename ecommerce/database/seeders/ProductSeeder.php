<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Iphone',
                'description' => 'Smartphone',
                'price' => 1000000,
                'stock' => 10,
                'image' => 'https://ibox.co.id/_next/image?url=https%3A%2F%2Fcdnpro.eraspace.com%2Fmedia%2Fcatalog%2Fproduct%2Fa%2Fp%2Fapple_iphone_15_pro_natural_titanium_1_4.jpg&w=3840&q=75',
                'product_category_id' => 1,
            ],[
                'name' => 'Buku belajar laravel',
                'description' => 'Buku tentang laravel',
                'price' => 100000,
                'stock' => 20,
                'image' => 'https://santrikoding.com/storage/courses/6714f316-2fbe-4710-b1df-737779a081d2.webp',
                'product_category_id' => 2,
            ],[
                'name' => 'Seblak Mercon',
                'description' => 'Seblak super pedas',
                'price' => 20000,
                'stock' => 5,
                'image' => 'https://asset.kompas.com/crops/6j4jwH2H5W3hOBg4D-Shi_aj4J0=/0x0:698x465/1200x800/data/photo/2021/01/05/5ff478b69ccf8.jpg',
                'product_category_id' => 3,
            ],
         ]);
    }
}
