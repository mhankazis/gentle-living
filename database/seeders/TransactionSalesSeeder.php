<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed transaction sales (some paid, some unpaid, some partial)
        DB::table('transaction_sales')->insert([
            [
                'transaction_sales_id' => 1,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 2,
                'sales_type_id' => 1,
                'number' => 'TRX-20250724-001',
                'date' => now()->subDays(1),
                'notes' => 'Transaksi belum lunas',
                'subtotal' => 75000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 75000,
                'paid_amount' => 0, // Belum bayar
                'change_amount' => 0,
                'whatsapp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_id' => 2,
                'branch_id' => 1,
                'payment_method_id' => 2,
                'user_id' => 1,
                'customer_id' => 3,
                'sales_type_id' => 1,
                'number' => 'TRX-20250723-002',
                'date' => now()->subDays(2),
                'notes' => 'Pembayaran partial',
                'subtotal' => 100000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 100000,
                'paid_amount' => 50000, // Partial payment
                'change_amount' => 0,
                'whatsapp' => '081234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_id' => 3,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 1,
                'sales_type_id' => 1,
                'number' => 'TRX-20250722-003',
                'date' => now()->subDays(3),
                'notes' => 'Transaksi sudah lunas',
                'subtotal' => 60000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 60000,
                'paid_amount' => 60000, // Fully paid
                'change_amount' => 0,
                'whatsapp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_id' => 4,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 2,
                'sales_type_id' => 1,
                'number' => 'TRX-20250721-004',
                'date' => now()->subDays(4),
                'notes' => 'Transaksi belum lunas',
                'subtotal' => 120000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 120000,
                'paid_amount' => 0, // Belum bayar
                'change_amount' => 0,
                'whatsapp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed transaction sales details
        DB::table('transaction_sales_details')->insert([
            // For transaction 1 (unpaid)
            [
                'transaction_sales_detail_id' => 1,
                'transaction_sales_id' => 1,
                'item_id' => 1,
                'qty' => 2,
                'costprice' => 20000,
                'sell_price' => 25000,
                'subtotal' => 50000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_detail_id' => 2,
                'transaction_sales_id' => 1,
                'item_id' => 2,
                'qty' => 1,
                'costprice' => 15000,
                'sell_price' => 25000,
                'subtotal' => 25000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // For transaction 2 (partial payment)
            [
                'transaction_sales_detail_id' => 3,
                'transaction_sales_id' => 2,
                'item_id' => 1,
                'qty' => 4,
                'costprice' => 20000,
                'sell_price' => 25000,
                'subtotal' => 100000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // For transaction 3 (fully paid)
            [
                'transaction_sales_detail_id' => 4,
                'transaction_sales_id' => 3,
                'item_id' => 2,
                'qty' => 2,
                'costprice' => 15000,
                'sell_price' => 20000,
                'subtotal' => 40000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 40000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_detail_id' => 5,
                'transaction_sales_id' => 3,
                'item_id' => 1,
                'qty' => 1,
                'costprice' => 20000,
                'sell_price' => 20000,
                'subtotal' => 20000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // For transaction 4 (unpaid)
            [
                'transaction_sales_detail_id' => 6,
                'transaction_sales_id' => 4,
                'item_id' => 1,
                'qty' => 3,
                'costprice' => 20000,
                'sell_price' => 25000,
                'subtotal' => 75000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_sales_detail_id' => 7,
                'transaction_sales_id' => 4,
                'item_id' => 2,
                'qty' => 3,
                'costprice' => 15000,
                'sell_price' => 15000,
                'subtotal' => 45000,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'total_amount' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
