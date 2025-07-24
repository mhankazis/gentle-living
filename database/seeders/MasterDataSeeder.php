<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed categories
        DB::table('master_categories')->insert([
            [
                'category_id' => 1,
                'name_category' => 'Makanan Bayi',
                'description_category' => 'Produk makanan untuk bayi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name_category' => 'Minuman',
                'description_category' => 'Berbagai jenis minuman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed payment methods
        DB::table('master_payment_methods')->insert([
            [
                'payment_method_id' => 1,
                'name_payment_method' => 'Cash',
                'description_payment_method' => 'Pembayaran tunai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_method_id' => 2,
                'name_payment_method' => 'Transfer',
                'description_payment_method' => 'Transfer bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed customers
        DB::table('master_customers')->insert([
            [
                'customer_id' => 1,
                'name_customer' => 'Walk-in Customer',
                'address_customer' => 'N/A',
                'phone_customer' => null,
                'email_customer' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'name_customer' => 'John Doe',
                'address_customer' => 'Jl. Contoh No. 123',
                'phone_customer' => '081234567890',
                'email_customer' => 'john@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed users
        DB::table('master_users')->insert([
            [
                'user_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'Admin',
                'phone' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed products
        DB::table('master_items')->insert([
            [
                'item_id' => 1,
                'name_item' => 'Susu Formula',
                'description_item' => 'Susu formula untuk bayi',
                'costprice_item' => 25000,
                'sell_price' => 40000,
                'stock' => 15,
                'unit_item' => 'botol',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 2,
                'name_item' => 'Biskuit Bayi',
                'description_item' => 'Biskuit untuk bayi usia 6+ bulan',
                'costprice_item' => 15000,
                'sell_price' => 25000,
                'stock' => 20,
                'unit_item' => 'kotak',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
