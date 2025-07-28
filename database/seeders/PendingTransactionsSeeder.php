<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendingTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data dummy untuk pesanan yang belum selesai diproses dan invoice belum terbayar
        
        // 1. Pastikan ada customer dummy
        $customers = [
            [
                'customer_id' => 1001,
                'name_customer' => 'PT. Sumber Rejeki Makmur',
                'address_customer' => 'Jl. Sudirman No. 123, Jakarta',
                'phone_customer' => '021-5551234',
                'email_customer' => 'admin@sumberrejeki.co.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_id' => 1002,
                'name_customer' => 'CV. Maju Bersama Jaya',
                'address_customer' => 'Jl. Gatot Subroto No. 456, Bandung',
                'phone_customer' => '022-7778890',
                'email_customer' => 'info@majubersama.co.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_id' => 1003,
                'name_customer' => 'Toko Baby Shop Central',
                'address_customer' => 'Jl. Malioboro No. 789, Yogyakarta',
                'phone_customer' => '0274-5556677',
                'email_customer' => 'central@babyshop.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_id' => 1004,
                'name_customer' => 'UD. Aneka Baby Care',
                'address_customer' => 'Jl. Ahmad Yani No. 321, Surabaya',
                'phone_customer' => '031-8889990',
                'email_customer' => 'aneka@babycare.co.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'customer_id' => 1005,
                'name_customer' => 'PT. Baby World Indonesia',
                'address_customer' => 'Jl. HR Rasuna Said No. 654, Jakarta',
                'phone_customer' => '021-3334455',
                'email_customer' => 'indonesia@babyworld.com',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($customers as $customer) {
            DB::table('master_customers')->insertOrIgnore($customer);
        }

        // 2. Data transaksi dengan berbagai status pembayaran
        $transactions = [
            [
                'transaction_sales_id' => 2001,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 1001,
                'sales_type_id' => 1,
                'number' => 'TRX-20250720-001',
                'date' => Carbon::parse('2025-07-20'),
                'subtotal' => 850000,
                'total_amount' => 850000,
                'paid_amount' => 300000, // Belum lunas
                'notes' => 'Pesanan untuk toko cabang Jakarta Pusat',
                'created_at' => Carbon::parse('2025-07-20 10:30:00'),
                'updated_at' => Carbon::parse('2025-07-20 10:30:00')
            ],
            [
                'transaction_sales_id' => 2002,
                'branch_id' => 1,
                'payment_method_id' => 2,
                'user_id' => 1,
                'customer_id' => 1002,
                'sales_type_id' => 1,
                'number' => 'TRX-20250719-002',
                'date' => Carbon::parse('2025-07-19'),
                'subtotal' => 650000,
                'total_amount' => 650000,
                'paid_amount' => 0, // Belum dibayar sama sekali
                'notes' => 'Pesanan rutin bulanan',
                'created_at' => Carbon::parse('2025-07-19 14:15:00'),
                'updated_at' => Carbon::parse('2025-07-19 14:15:00')
            ],
            [
                'transaction_sales_id' => 2003,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 1003,
                'sales_type_id' => 1,
                'number' => 'TRX-20250718-003',
                'date' => Carbon::parse('2025-07-18'),
                'subtotal' => 450000,
                'total_amount' => 450000,
                'paid_amount' => 200000, // Cicilan pertama
                'notes' => 'Pembayaran sistem cicilan',
                'created_at' => Carbon::parse('2025-07-18 09:45:00'),
                'updated_at' => Carbon::parse('2025-07-18 09:45:00')
            ],
            [
                'transaction_sales_id' => 2004,
                'branch_id' => 1,
                'payment_method_id' => 3,
                'user_id' => 1,
                'customer_id' => 1004,
                'sales_type_id' => 1,
                'number' => 'TRX-20250717-004',
                'date' => Carbon::parse('2025-07-17'),
                'subtotal' => 750000,
                'total_amount' => 750000,
                'paid_amount' => 400000, // Sebagian
                'notes' => 'Order khusus untuk event baby expo',
                'created_at' => Carbon::parse('2025-07-17 16:20:00'),
                'updated_at' => Carbon::parse('2025-07-17 16:20:00')
            ],
            [
                'transaction_sales_id' => 2005,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 1005,
                'sales_type_id' => 1,
                'number' => 'TRX-20250716-005',
                'date' => Carbon::parse('2025-07-16'),
                'subtotal' => 920000,
                'total_amount' => 920000,
                'paid_amount' => 500000, // Kurang dari setengah
                'notes' => 'Pesanan untuk launching produk baru',
                'created_at' => Carbon::parse('2025-07-16 11:10:00'),
                'updated_at' => Carbon::parse('2025-07-16 11:10:00')
            ],
            [
                'transaction_sales_id' => 2006,
                'branch_id' => 1,
                'payment_method_id' => 2,
                'user_id' => 1,
                'customer_id' => 1001,
                'sales_type_id' => 1,
                'number' => 'TRX-20250715-006',
                'date' => Carbon::parse('2025-07-15'),
                'subtotal' => 380000,
                'total_amount' => 380000,
                'paid_amount' => 100000, // Sangat sedikit
                'notes' => 'Pesanan mendesak untuk stok habis',
                'created_at' => Carbon::parse('2025-07-15 13:30:00'),
                'updated_at' => Carbon::parse('2025-07-15 13:30:00')
            ],
            [
                'transaction_sales_id' => 2007,
                'branch_id' => 1,
                'payment_method_id' => 1,
                'user_id' => 1,
                'customer_id' => 1003,
                'sales_type_id' => 1,
                'number' => 'TRX-20250714-007',
                'date' => Carbon::parse('2025-07-14'),
                'subtotal' => 560000,
                'total_amount' => 560000,
                'paid_amount' => 0, // Belum bayar
                'notes' => 'Pre-order untuk produk seasonal',
                'created_at' => Carbon::parse('2025-07-14 08:45:00'),
                'updated_at' => Carbon::parse('2025-07-14 08:45:00')
            ],
            [
                'transaction_sales_id' => 2008,
                'branch_id' => 1,
                'payment_method_id' => 3,
                'user_id' => 1,
                'customer_id' => 1002,
                'sales_type_id' => 1,
                'number' => 'TRX-20250713-008',
                'date' => Carbon::parse('2025-07-13'),
                'subtotal' => 720000,
                'total_amount' => 720000,
                'paid_amount' => 250000, // Kurang dari setengah
                'notes' => 'Konsinyasi untuk toko partner',
                'created_at' => Carbon::parse('2025-07-13 15:20:00'),
                'updated_at' => Carbon::parse('2025-07-13 15:20:00')
            ]
        ];

        foreach ($transactions as $transaction) {
            DB::table('transaction_sales')->insertOrIgnore($transaction);
        }

        // 3. Detail transaksi untuk setiap pesanan
        $transactionDetails = [
            // TRX-20250720-001 (ID: 2001) - Total: 850000
            [
                'transaction_sales_id' => 2001,
                'item_id' => 1, // Gimme Food (GF)
                'qty' => 15,
                'sell_price' => 25000,
                'subtotal' => 375000,
                'total_amount' => 375000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2001,
                'item_id' => 3, // Baby Calmer (BC)
                'qty' => 19,
                'sell_price' => 25000,
                'subtotal' => 475000,
                'total_amount' => 475000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250719-002 (ID: 2002) - Total: 650000
            [
                'transaction_sales_id' => 2002,
                'item_id' => 2, // Massage Your Baby (MYB)
                'qty' => 10,
                'sell_price' => 25000,
                'subtotal' => 250000,
                'total_amount' => 250000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2002,
                'item_id' => 4, // LDR (15ml)
                'qty' => 16,
                'sell_price' => 25000,
                'subtotal' => 400000,
                'total_amount' => 400000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250718-003 (ID: 2003) - Total: 450000
            [
                'transaction_sales_id' => 2003,
                'item_id' => 5, // Organic Gentle (OG)
                'qty' => 18,
                'sell_price' => 25000,
                'subtotal' => 450000,
                'total_amount' => 450000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250717-004 (ID: 2004) - Total: 750000
            [
                'transaction_sales_id' => 2004,
                'item_id' => 1, // Gimme Food (GF)
                'qty' => 12,
                'sell_price' => 25000,
                'subtotal' => 300000,
                'total_amount' => 300000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2004,
                'item_id' => 2, // Massage Your Baby (MYB)
                'qty' => 8,
                'sell_price' => 25000,
                'subtotal' => 200000,
                'total_amount' => 200000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2004,
                'item_id' => 6, // Sleepy Time (ST)
                'qty' => 10,
                'sell_price' => 25000,
                'subtotal' => 250000,
                'total_amount' => 250000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250716-005 (ID: 2005) - Total: 920000
            [
                'transaction_sales_id' => 2005,
                'item_id' => 3, // Baby Calmer (BC)
                'qty' => 20,
                'sell_price' => 25000,
                'subtotal' => 500000,
                'total_amount' => 500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2005,
                'item_id' => 4, // LDR (15ml)
                'qty' => 12,
                'sell_price' => 25000,
                'subtotal' => 300000,
                'total_amount' => 300000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2005,
                'item_id' => 7, // Tummy Calmer (TC)
                'qty' => 5,
                'sell_price' => 24000,
                'subtotal' => 120000,
                'total_amount' => 120000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250715-006 (ID: 2006) - Total: 380000
            [
                'transaction_sales_id' => 2006,
                'item_id' => 5, // Organic Gentle (OG)
                'qty' => 8,
                'sell_price' => 25000,
                'subtotal' => 200000,
                'total_amount' => 200000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2006,
                'item_id' => 8, // Night Comfort (NC)
                'qty' => 9,
                'sell_price' => 20000,
                'subtotal' => 180000,
                'total_amount' => 180000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250714-007 (ID: 2007) - Total: 560000
            [
                'transaction_sales_id' => 2007,
                'item_id' => 1, // Gimme Food (GF)
                'qty' => 14,
                'sell_price' => 25000,
                'subtotal' => 350000,
                'total_amount' => 350000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2007,
                'item_id' => 9, // Gentle Calmer (GC)
                'qty' => 7,
                'sell_price' => 30000,
                'subtotal' => 210000,
                'total_amount' => 210000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TRX-20250713-008 (ID: 2008) - Total: 720000
            [
                'transaction_sales_id' => 2008,
                'item_id' => 2, // Massage Your Baby (MYB)
                'qty' => 16,
                'sell_price' => 25000,
                'subtotal' => 400000,
                'total_amount' => 400000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_sales_id' => 2008,
                'item_id' => 10, // Sweet Dreams (SD)
                'qty' => 8,
                'sell_price' => 40000,
                'subtotal' => 320000,
                'total_amount' => 320000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($transactionDetails as $detail) {
            DB::table('transaction_sales_details')->insertOrIgnore($detail);
        }

        $this->command->info('Berhasil menambahkan data dummy untuk pesanan yang belum selesai diproses dan invoice belum terbayar!');
        $this->command->info('Total transaksi pending: ' . count($transactions));
        $this->command->info('Total unpaid amount: Rp ' . number_format(array_sum(array_map(function($t) {
            return $t['total_amount'] - $t['paid_amount'];
        }, $transactions)), 0, ',', '.'));
    }
}
