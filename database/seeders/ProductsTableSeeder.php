<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for products
        $products = [
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product1.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product1.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product2.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product3.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product4.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product2.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product1.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product3.png'),
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => Storage::url('public/product4.png'),
            ],
        ];
        DB::table('products')->insert($products);

    }
}
