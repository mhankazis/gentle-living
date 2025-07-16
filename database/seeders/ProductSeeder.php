<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first category or create one
        $category = \App\Models\Category::first();
        if (!$category) {
            $category = \App\Models\Category::create(['name' => 'Baby Products']);
        }

        $products = [
            [
                'name' => 'LDR (15ml)',
                'description' => 'Essential oil untuk bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Massage Your Baby (MYB)',
                'description' => 'Minyak pijat bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Tummy Calmer (TC)',
                'description' => 'Obat perut kembung bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Gimme Food (GF)',
                'description' => 'Suplemen nafsu makan bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Deep Sleep (DS)',
                'description' => 'Essential oil untuk tidur nyenyak',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Joy',
                'description' => 'Essential oil mood booster',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Cough n Flu (CnF)',
                'description' => 'Obat batuk dan flu bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Imboost(ie)',
                'description' => 'Suplemen daya tahan tubuh bayi',
                'price' => 23000,
                'stock' => 15,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'LDR',
                'description' => 'Essential oil LDR ukuran 10ml',
                'price' => 18000,
                'stock' => 10,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'Massage Your Baby (MYB)',
                'description' => 'Minyak pijat bayi ukuran 10ml',
                'price' => 18000,
                'stock' => 10,
                'category_id' => $category->id,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
