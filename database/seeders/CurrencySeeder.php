<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencySeeder = [
            [
                'name' => 'Dólar estadounidense',
                'symbol' => 'USD',
                'exchange_rate' => 1.00
            ],
            [
                'name' => 'Euro',
                'symbol' => 'EUR',
                'exchange_rate' => 0.91
            ],
            [
                'name' => 'Peso mexicano',
                'symbol' => 'MXN',
                'exchange_rate' => 17.00
            ],
            [
                'name' => 'Dólar canadiense',
                'symbol' => 'CAD',
                'exchange_rate' => 1.36
            ],
            [
                'name' => 'Yen japonés',
                'symbol' => 'JPY',
                'exchange_rate' => 115.00
            ],
            [
                'name' => 'Libra esterlina',
                'symbol' => 'GBP',
                'exchange_rate' => 0.78
            ],
        ];

    DB::table("currencies")->insert($currencySeeder);
    }
}
