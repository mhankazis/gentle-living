<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\TransactionSale;
use App\Models\TransactionSaleDetail;

class TransactionHelper
{
    /**
     * Recalculate transaction totals based on details
     */
    public static function recalculateTransactionTotals($transactionId)
    {
        $transaction = TransactionSale::find($transactionId);
        if (!$transaction) {
            return false;
        }

        // Calculate subtotal from transaction details
        $subtotal = TransactionSaleDetail::where('transaction_sales_id', $transactionId)
            ->sum(DB::raw('qty * sell_price'));

        // Calculate discount amount if percentage is set
        $discountAmount = 0;
        if ($transaction->discount_percentage > 0) {
            $discountAmount = ($subtotal * $transaction->discount_percentage) / 100;
        } elseif ($transaction->discount_amount > 0) {
            $discountAmount = $transaction->discount_amount;
        }

        // Calculate final total
        $totalAmount = $subtotal - $discountAmount;

        // Update transaction using direct query to avoid triggering model events
        DB::table('transaction_sales')
            ->where('transaction_sales_id', $transactionId)
            ->update([
                'subtotal' => $subtotal,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount,
                'updated_at' => now(),
            ]);

        return true;
    }

    /**
     * Validate transaction consistency
     */
    public static function validateTransactionConsistency($transactionId)
    {
        $transaction = TransactionSale::find($transactionId);
        if (!$transaction) {
            return ['valid' => false, 'errors' => ['Transaction not found']];
        }

        $errors = [];

        // Check if customer exists
        if (!DB::table('master_customers')->where('customer_id', $transaction->customer_id)->exists()) {
            $errors[] = 'Customer does not exist';
        }

        // Check if user exists
        if (!DB::table('master_users')->where('user_id', $transaction->user_id)->exists()) {
            $errors[] = 'User does not exist';
        }

        // Check if branch exists
        if (!DB::table('master_branches')->where('branch_id', $transaction->branch_id)->exists()) {
            $errors[] = 'Branch does not exist';
        }

        // Check if payment method exists
        if (!DB::table('master_payment_methods')->where('payment_method_id', $transaction->payment_method_id)->exists()) {
            $errors[] = 'Payment method does not exist';
        }

        // Check transaction details
        $details = TransactionSaleDetail::where('transaction_sales_id', $transactionId)->get();
        if ($details->isEmpty()) {
            $errors[] = 'Transaction has no details';
        }

        foreach ($details as $detail) {
            // Check if item exists
            if (!DB::table('master_items')->where('item_id', $detail->item_id)->exists()) {
                $errors[] = "Item {$detail->item_id} does not exist";
            }

            // Check if quantities are valid
            if ($detail->qty <= 0) {
                $errors[] = "Invalid quantity for item {$detail->item_id}";
            }

            // Check if prices are valid
            if ($detail->sell_price <= 0) {
                $errors[] = "Invalid price for item {$detail->item_id}";
            }
        }

        // Check total consistency
        $calculatedSubtotal = $details->sum(function($detail) {
            return $detail->qty * $detail->sell_price;
        });

        $expectedTotal = $calculatedSubtotal - ($transaction->discount_amount ?? 0);

        if (abs($transaction->subtotal - $calculatedSubtotal) > 0.01) {
            $errors[] = "Subtotal mismatch: stored={$transaction->subtotal}, calculated={$calculatedSubtotal}";
        }

        if (abs($transaction->total_amount - $expectedTotal) > 0.01) {
            $errors[] = "Total amount mismatch: stored={$transaction->total_amount}, expected={$expectedTotal}";
        }

        // Check payment consistency
        if ($transaction->paid_amount > $transaction->total_amount) {
            $errors[] = "Paid amount exceeds total amount";
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'calculated_subtotal' => $calculatedSubtotal,
            'expected_total' => $expectedTotal
        ];
    }

    /**
     * Get transaction statistics
     */
    public static function getTransactionStatistics()
    {
        return [
            'total_transactions' => TransactionSale::count(),
            'total_revenue' => TransactionSale::sum('total_amount'),
            'total_paid' => TransactionSale::sum('paid_amount'),
            'total_unpaid' => TransactionSale::sum(DB::raw('total_amount - COALESCE(paid_amount, 0)')),
            'pending_transactions' => TransactionSale::whereRaw('COALESCE(paid_amount, 0) < total_amount')->count(),
            'completed_transactions' => TransactionSale::whereRaw('paid_amount >= total_amount')->count(),
        ];
    }

    /**
     * Fix orphaned data
     */
    public static function fixOrphanedData()
    {
        $fixed = [];

        // Remove orphaned transaction details
        $orphanedDetails = DB::table('transaction_sales_details as tsd')
            ->leftJoin('transaction_sales as ts', 'tsd.transaction_sales_id', '=', 'ts.transaction_sales_id')
            ->whereNull('ts.transaction_sales_id')
            ->pluck('tsd.transaction_sales_detail_id');

        if ($orphanedDetails->count() > 0) {
            DB::table('transaction_sales_details')->whereIn('transaction_sales_detail_id', $orphanedDetails)->delete();
            $fixed['orphaned_details'] = $orphanedDetails->count();
        }

        // Set default values for invalid foreign keys
        $transactionsWithInvalidCustomers = TransactionSale::whereNotIn('customer_id', 
            DB::table('master_customers')->pluck('customer_id')
        )->get();

        foreach ($transactionsWithInvalidCustomers as $transaction) {
            $transaction->update(['customer_id' => 1]); // Set to default customer
            $fixed['invalid_customers'] = ($fixed['invalid_customers'] ?? 0) + 1;
        }

        return $fixed;
    }

    /**
     * Generate transaction number
     */
    public static function generateTransactionNumber($date = null)
    {
        $date = $date ?: now();
        $dateString = $date->format('Ymd');
        
        // Get latest transaction number for the day
        $latestNumber = TransactionSale::where('number', 'like', "TRX-{$dateString}-%")
            ->orderBy('number', 'desc')
            ->first();

        if ($latestNumber) {
            $lastSequence = (int) substr($latestNumber->number, -3);
            $newSequence = $lastSequence + 1;
        } else {
            $newSequence = 1;
        }

        return "TRX-{$dateString}-" . str_pad($newSequence, 3, '0', STR_PAD_LEFT);
    }
}
