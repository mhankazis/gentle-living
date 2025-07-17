<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'kode_transaksi' => '#nlo7hq5hdo',
                'tanggal_transaksi' => '2025-04-29',
                'nama_perusahaan' => 'Pabrik Teknologi',
                'total_amount' => 150000,
                'status' => 'completed',
            ],
            [
                'kode_transaksi' => '#hnsCbbAY9D',
                'tanggal_transaksi' => '2025-02-26',
                'nama_perusahaan' => 'Pabrik Teknologi',
                'total_amount' => 275000,
                'status' => 'completed',
            ],
            [
                'kode_transaksi' => '#Kw25Wiu7vT',
                'tanggal_transaksi' => '2025-01-31',
                'nama_perusahaan' => 'CV Berkah Jaya',
                'total_amount' => 189000,
                'status' => 'completed',
            ],
            [
                'kode_transaksi' => '#wOddytRc5x',
                'tanggal_transaksi' => '2024-06-28',
                'nama_perusahaan' => 'Pabrik Teknologi',
                'total_amount' => 320000,
                'status' => 'completed',
            ],
            [
                'kode_transaksi' => '#MkpQwE8rTy',
                'tanggal_transaksi' => '2025-03-15',
                'nama_perusahaan' => 'PT Maju Bersama',
                'total_amount' => 450000,
                'status' => 'pending',
            ],
            [
                'kode_transaksi' => '#LmNoPq2RsT',
                'tanggal_transaksi' => '2025-05-12',
                'nama_perusahaan' => 'CV Sejahtera',
                'total_amount' => 180000,
                'status' => 'completed',
            ],
        ];

        foreach ($transactions as $transaction) {
            \App\Models\Transaction::create($transaction);
        }
    }
}
