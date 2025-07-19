<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ordersItems = [
            ['order_id' => 1, 'product_id' => 1, 'count' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 1, 'product_id' => 2, 'count' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 2, 'product_id' => 3, 'count' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 3, 'product_id' => 4, 'count' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 3, 'product_id' => 5, 'count' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 4, 'product_id' => 6, 'count' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 5, 'product_id' => 6, 'count' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 6, 'product_id' => 8, 'count' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('order_items')->insert($ordersItems);
    }
}
