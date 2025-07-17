<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the user ID (assuming we have a user)
        $user = \App\Models\User::first();
        
        if (!$user) {
            // Create a user if none exists
            $user = \App\Models\User::create([
                'name' => 'Farid Angga',
                'email' => 'admin@gentlebaby.com',
                'password' => bcrypt('password'),
            ]);
        }

        $invoices = [
            [
                'invoice_number' => '#B8MtSuW3z5',
                'amount' => 161000,
                'status' => 'unpaid',
                'due_date' => '2025-05-01',
                'user_id' => $user->id,
            ],
            [
                'invoice_number' => '#sa4imMI6zf',
                'amount' => 1380000,
                'status' => 'unpaid',
                'due_date' => '2025-02-02',
                'user_id' => $user->id,
            ],
            [
                'invoice_number' => '#Wzgxc5AAdk',
                'amount' => 63000,
                'status' => 'unpaid',
                'due_date' => '2024-07-01',
                'user_id' => $user->id,
            ],
            [
                'invoice_number' => '#xoeadbPEX7',
                'amount' => 1375000,
                'status' => 'unpaid',
                'due_date' => '2024-05-30',
                'user_id' => $user->id,
            ],
        ];

        foreach ($invoices as $invoice) {
            \App\Models\Invoice::create($invoice);
        }
    }
}
