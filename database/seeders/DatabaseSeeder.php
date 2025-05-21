<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use App\Models\Warehouse;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        ProductType::factory(100)->create();
        Warehouse::factory(100)->create();

        $warehouses = ProductType::all()->shuffle();


        foreach ($warehouses as $warehouse) {
            $producTypes = ProductType::inRandomOrder()->take(rand(10, 50))->get();

            foreach ($producTypes as $producType) {
                Product::factory()->create([
                    'product_type_id' => $producType->id,
                    'warehouse_id' => $warehouse->id
                ]);
            }
        }
    }
}
