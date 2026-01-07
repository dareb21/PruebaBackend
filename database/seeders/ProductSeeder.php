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
        $productsSeeder = [
    [
        'name' => 'Laptop Gamer Raptor',
        'description' => 'Laptop de alto rendimiento para videojuegos y diseño gráfico',
        'price' => 1200.00,
        'currency_id' => 1,
        'tax_cost' => 120.00,
        'manufacturing_cost' => 700.00,
    ],
    [
        'name' => 'Smartphone Zenith X2',
        'description' => 'Smartphone premium con cámara de 108MP y batería de larga duración',
        'price' => 850.00,
        'currency_id' => 2,
        'tax_cost' => 85.00,
        'manufacturing_cost' => 400.00,
    ],
    [
        'name' => 'Auriculares OverSound Pro',
        'description' => 'Auriculares inalámbricos con cancelación de ruido activa',
        'price' => 200.00,
        'currency_id' => 3,
        'tax_cost' => 20.00,
        'manufacturing_cost' => 100.00,
    ],
    [
        'name' => 'Monitor UltraWide 34"',
        'description' => 'Monitor curvo ultrapanorámico para gaming y productividad',
        'price' => 500.00,
        'currency_id' => 4,
        'tax_cost' => 50.00,
        'manufacturing_cost' => 300.00,
    ],
    [
        'name' => 'Teclado Mecánico Titan',
        'description' => 'Teclado mecánico retroiluminado para gamers',
        'price' => 120.00,
        'currency_id' => 5,
        'tax_cost' => 12.00,
        'manufacturing_cost' => 60.00,
    ],
];

    DB::table('products')->insert($productsSeeder);

    }
}
