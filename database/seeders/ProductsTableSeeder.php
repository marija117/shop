<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
            [
                'name' => 'Naturela sa Rogačem i Agava Šećerom',
                'description' => '546 RSD po kom.',
                'size' => '750g',
                'price' => 746,
                'discounted_price' => 546,
                'image' => 'product1.jpg',
            ],
        ];
        DB::table('products')->insert($products);

    }
}
