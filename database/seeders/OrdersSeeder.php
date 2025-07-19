<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('ru_RU');

        $orders = [
            ['customer' => $faker->name(), 'warehouse_id' => 1, 'completed_at' => null, 'created_at' => now(), 'updated_at' => now(), 'status' => 'active'],
            ['customer' => $faker->name(), 'warehouse_id' => 2, 'completed_at' => null, 'created_at' => now(), 'updated_at' => now(), 'status' => 'active'],
            ['customer' => $faker->name(), 'warehouse_id' => 4, 'completed_at' => null, 'created_at' => now(), 'updated_at' => now(), 'status' => 'active'],
            ['customer' => $faker->name(), 'warehouse_id' => 5, 'completed_at' => now(), 'created_at' => now(), 'updated_at' => now(), 'status' => 'completed'],
            ['customer' => $faker->name(), 'warehouse_id' => 6, 'completed_at' => null, 'created_at' => now(), 'updated_at' => now(), 'status' => 'canceled'],
            ['customer' => $faker->name(), 'warehouse_id' => 8, 'completed_at' => null, 'created_at' => now(), 'updated_at' => now(), 'status' => 'active'],
        ];

        DB::table('orders')->insert($orders);
    }
}
