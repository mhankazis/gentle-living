<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionSale;
use App\Models\TransactionSaleDetail;
use Carbon\Carbon;

class TransactionSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate transaction data for the last 30 days
        $transactions = [];
        
        for ($i = 0; $i < 50; $i++) {
            $date = Carbon::now()->subDays(rand(0, 30));
            $transactionNumber = 'TXN-' . $date->format('Ymd') . '-' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);
            
            $subtotal = rand(50000, 500000);
            $discountPercentage = rand(0, 20);
            $discountAmount = $subtotal * ($discountPercentage / 100);
            $totalAmount = $subtotal - $discountAmount;
            $paidAmount = $totalAmount + rand(0, 50000); // Sometimes overpaid
            $changeAmount = $paidAmount - $totalAmount;
            
            $transaction = TransactionSale::create([
                'branch_id' => rand(1, 3), // Random branch from 1-3
                'payment_method_id' => rand(1, 6), // Random payment method from 1-6
                'user_id' => rand(1, 4), // Random user from 1-4
                'customer_id' => rand(1, 3), // Random customer from 1-3
                'sales_type_id' => rand(1, 3), // Random sales type from 1-3
                'number' => $transactionNumber,
                'date' => $date,
                'notes' => $this->getRandomNotes(),
                'subtotal' => $subtotal,
                'discount_amount' => $discountAmount,
                'discount_percentage' => $discountPercentage,
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'change_amount' => $changeAmount,
                'whatsapp' => '+628' . rand(1000000000, 9999999999),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
            
            // Add transaction details (items)
            $numItems = rand(1, 5); // 1-5 items per transaction
            $detailSubtotal = 0;
            
            for ($j = 0; $j < $numItems; $j++) {
                $itemId = rand(1, 6); // Random item from 1-6
                $qty = rand(1, 10);
                $costPrice = rand(15000, 25000);
                $sellPrice = rand(20000, 35000);
                $itemSubtotal = $qty * $sellPrice;
                $itemDiscountPercentage = rand(0, 10);
                $itemDiscountAmount = $itemSubtotal * ($itemDiscountPercentage / 100);
                $itemTotalAmount = $itemSubtotal - $itemDiscountAmount;
                
                TransactionSaleDetail::create([
                    'transaction_sales_id' => $transaction->transaction_sales_id,
                    'item_id' => $itemId,
                    'qty' => $qty,
                    'costprice' => $costPrice,
                    'sell_price' => $sellPrice,
                    'subtotal' => $itemSubtotal,
                    'discount_amount' => $itemDiscountAmount,
                    'discount_percentage' => $itemDiscountPercentage,
                    'total_amount' => $itemTotalAmount,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
                
                $detailSubtotal += $itemTotalAmount;
            }
            
            // Update transaction subtotal based on actual item details
            $transaction->update(['subtotal' => $detailSubtotal]);
        }
    }
    
    private function getRandomNotes(): ?string
    {
        $notes = [
            'Pesanan untuk event ulang tahun',
            'Pembelian untuk stok bulanan',
            'Orderan khusus pelanggan VIP',
            'Pesanan urgent - kirim segera',
            'Paket bundling produk',
            'Pesanan untuk acara gathering',
            'Pembelian rutin mingguan',
            'Orderan custom packaging',
            'Pesanan untuk hadiah',
            'Pembelian wholesale',
            null, // Some transactions without notes
        ];
        
        return $notes[array_rand($notes)];
    }
}
