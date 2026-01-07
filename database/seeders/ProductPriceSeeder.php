<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productPricesSeeder = [
    
    ['product_id' => 1, 'currency_id' => 1, 'price' => 1200.00],
    ['product_id' => 1, 'currency_id' => 3, 'price' => 20400.00],
    ['product_id' => 1, 'currency_id' => 4, 'price' => 1632.00],

    ['product_id' => 2, 'currency_id' => 2, 'price' => 850.00],
    ['product_id' => 2, 'currency_id' => 3, 'price' => 14450.00],
    ['product_id' => 2, 'currency_id' => 5, 'price' => 93500.00],

    ['product_id' => 3, 'currency_id' => 3, 'price' => 200.00],
    ['product_id' => 3, 'currency_id' => 2, 'price' => 200.00],
    ['product_id' => 3, 'currency_id' => 4, 'price' => 272.00],

    ['product_id' => 4, 'currency_id' => 4, 'price' => 500.00],
    ['product_id' => 4, 'currency_id' => 2, 'price' => 530.00],
    ['product_id' => 4, 'currency_id' => 5, 'price' => 58000.00],

    ['product_id' => 5, 'currency_id' => 5, 'price' => 120.00],
    ['product_id' => 5, 'currency_id' => 2, 'price' => 120.00],
    ['product_id' => 5, 'currency_id' => 3, 'price' => 2040.00],
];

    DB::table('product_prices')->insert($productPricesSeeder);

    }
}
