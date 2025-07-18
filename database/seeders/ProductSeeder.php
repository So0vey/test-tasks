<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Гречка 1кг', 'price' => 99.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Мука 1кг', 'price' => 69.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Чесалка для спины', 'price' => 215, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coca-Cola 1л', 'price' => 90, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coca-Cola 2л', 'price' => 140, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Комплект зимней резины', 'price' => 25000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Опилки 10л', 'price' => 900, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Литр ртути', 'price' => 1000, 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('products')->insert($products);
    }
}
