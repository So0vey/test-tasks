<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [
            ['name' => 'Склад 1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 3', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 4', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 5', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Склад 7', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Особый склад', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('warehouses')->insert($warehouses);
    }
}
