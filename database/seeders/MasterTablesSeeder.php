<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed master_categories
        DB::table('master_categories')->insert([
            [
                'category_id' => 1,
                'name_category' => 'Baby Food',
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ],
            [
                'category_id' => 2,
                'name_category' => 'Therapeutic Oils',
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ],
            [
                'category_id' => 3,
                'name_category' => 'Herbal Infusions',
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ]
        ]);

        // Seed master_items
        DB::table('master_items')->insert([
            [
                'item_id' => 1,
                'category_id' => 1,
                'name_item' => 'Beef Pudding',
                'description_item' => 'Delicious beef pudding for babies',
                'ingredient_item' => 'Beef, milk, organic ingredients',
                'netweight_item' => '200g',
                'contain_item' => 'High protein, vitamins',
                'costprice_item' => 22000,
                'created_at' => '2025-07-20 18:36:55',
                'updated_at' => '2025-07-20 18:36:55',
                'deleted_at' => null
            ],
            [
                'item_id' => 2,
                'category_id' => 1,
                'name_item' => 'Chicken Pudding',
                'description_item' => 'Nutritious chicken pudding for babies',
                'ingredient_item' => 'Chicken, milk, organic ingredients',
                'netweight_item' => '200g',
                'contain_item' => 'High protein, vitamins',
                'costprice_item' => 19500,
                'created_at' => '2025-07-20 18:36:55',
                'updated_at' => '2025-07-20 18:36:55',
                'deleted_at' => null
            ],
            [
                'item_id' => 3,
                'category_id' => 1,
                'name_item' => 'Pannababy',
                'description_item' => 'Special panna cotta for babies',
                'ingredient_item' => 'Milk, natural flavoring',
                'netweight_item' => '150g',
                'contain_item' => 'Calcium, vitamins',
                'costprice_item' => 10000,
                'created_at' => '2025-07-20 18:36:55',
                'updated_at' => '2025-07-20 18:36:55',
                'deleted_at' => null
            ]
        ]);

        // Seed master_companies
        DB::table('master_companies')->insert([
            [
                'company_id' => 1,
                'name_company' => 'nyambabyfood',
                'phone_company' => '081234567891',
                'address_company' => 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164',
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ],
            [
                'company_id' => 2,
                'name_company' => 'mamina.id',
                'phone_company' => '081234567890',
                'address_company' => 'Jl. Kapi Sraba Raya 12A 22, Desa Mangliawan, Kecamatan Pakis, Kab. Malang Jawa Timur, 65164',
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ]
        ]);

        // Seed master_users
        DB::table('master_users')->insert([
            [
                'user_id' => 1,
                'company_id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@mail',
                'email_verified_at' => null,
                'password' => '$2y$12$mhCiuMFZK4AdAWJXTYZ7Iuxx9/vYfO/HOfIk.kTa8onctwhl1lolG',
                'remember_token' => null,
                'jwt_token' => null,
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ],
            [
                'user_id' => 2,
                'company_id' => 2,
                'name' => 'Staff User',
                'email' => 'staff@mail',
                'email_verified_at' => null,
                'password' => '$2y$12$FgywVZ.wG90NGCMOZx44qepMSaJvtwFE7GOxLrmKyXfeRkd9NF4Ai',
                'remember_token' => null,
                'jwt_token' => null,
                'created_at' => '2025-07-20 18:36:53',
                'updated_at' => '2025-07-20 18:36:53',
                'deleted_at' => null
            ]
        ]);

        // Seed master_payment_methods
        DB::table('master_payment_methods')->insert([
            [
                'payment_method_id' => 1,
                'name_payment_method' => 'Cash',
                'description_payment_method' => 'Cash payment',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'payment_method_id' => 2,
                'name_payment_method' => 'Transfer',
                'description_payment_method' => 'Bank transfer',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);

        // Seed master_customers
        DB::table('master_customers')->insert([
            [
                'customer_id' => 1,
                'name_customer' => 'Walk-in Customer',
                'address_customer' => 'Unknown',
                'phone_customer' => '-',
                'email_customer' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);
    }
}
