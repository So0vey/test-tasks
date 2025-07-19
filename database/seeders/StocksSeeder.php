<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            ['product_id' => 1, 'warehouse_id' => 1, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'warehouse_id' => 2, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'warehouse_id' => 4, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'warehouse_id' => 5, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'warehouse_id' => 2, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'warehouse_id' => 3, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'warehouse_id' => 6, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'warehouse_id' => 7, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'warehouse_id' => 3, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'warehouse_id' => 2, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'warehouse_id' => 1, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'warehouse_id' => 5, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 4, 'warehouse_id' => 1, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 4, 'warehouse_id' => 2, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 5, 'warehouse_id' => 1, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 5, 'warehouse_id' => 3, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 6, 'warehouse_id' => 7, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7, 'warehouse_id' => 2, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7, 'warehouse_id' => 5, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7, 'warehouse_id' => 6, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 8, 'warehouse_id' => 1, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 8, 'warehouse_id' => 6, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 8, 'warehouse_id' => 7, 'stock' => rand(1, 100), 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 9, 'warehouse_id' => 8, 'stock' => 1, 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('stocks')->insert($stocks);
    }
}
