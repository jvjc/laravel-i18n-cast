<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\ProductI18n;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(10)->create()->each(function ($product) {
            ProductI18n::factory()->count(1)->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
