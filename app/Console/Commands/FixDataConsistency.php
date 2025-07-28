<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\TransactionHelper;
use App\Models\TransactionSale;
use Illuminate\Support\Facades\DB;

class FixDataConsistency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fix-consistency {--dry-run : Show what would be fixed without making changes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix data consistency issues between related tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking data consistency...');
        
        $dryRun = $this->option('dry-run');

        if ($dryRun) {
            $this->warn('DRY RUN MODE - No changes will be made');
        }

        // 1. Check and fix orphaned data
        $this->info('1. Checking for orphaned data...');
        if (!$dryRun) {
            $fixed = TransactionHelper::fixOrphanedData();
            foreach ($fixed as $type => $count) {
                $this->info("   Fixed {$count} {$type}");
            }
        } else {
            $this->checkOrphanedData();
        }

        // 2. Check transaction totals consistency
        $this->info('2. Checking transaction totals...');
        $inconsistentTransactions = $this->checkTransactionTotals($dryRun);

        // 3. Check foreign key references
        $this->info('3. Checking foreign key references...');
        $this->checkForeignKeyReferences();

        // 4. Generate statistics
        $this->info('4. Generating statistics...');
        $stats = TransactionHelper::getTransactionStatistics();
        
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Transactions', $stats['total_transactions']],
                ['Total Revenue', 'Rp ' . number_format($stats['total_revenue'], 0, ',', '.')],
                ['Total Paid', 'Rp ' . number_format($stats['total_paid'], 0, ',', '.')],
                ['Total Unpaid', 'Rp ' . number_format($stats['total_unpaid'], 0, ',', '.')],
                ['Pending Transactions', $stats['pending_transactions']],
                ['Completed Transactions', $stats['completed_transactions']],
            ]
        );

        if ($inconsistentTransactions > 0) {
            $this->warn("Found {$inconsistentTransactions} transactions with inconsistent totals");
            if ($dryRun) {
                $this->info('Run without --dry-run to fix these issues');
            }
        } else {
            $this->info('All transaction totals are consistent!');
        }

        $this->info('Data consistency check completed.');
    }

    private function checkOrphanedData()
    {
        // Check orphaned transaction details
        $orphanedDetails = DB::table('transaction_sales_details as tsd')
            ->leftJoin('transaction_sales as ts', 'tsd.transaction_sales_id', '=', 'ts.transaction_sales_id')
            ->whereNull('ts.transaction_sales_id')
            ->count();

        if ($orphanedDetails > 0) {
            $this->warn("   Found {$orphanedDetails} orphaned transaction details");
        }

        // Check details with invalid items
        $invalidItems = DB::table('transaction_sales_details as tsd')
            ->leftJoin('master_items as mi', 'tsd.item_id', '=', 'mi.item_id')
            ->whereNull('mi.item_id')
            ->count();

        if ($invalidItems > 0) {
            $this->warn("   Found {$invalidItems} transaction details with invalid items");
        }
    }

    private function checkTransactionTotals($fix = false)
    {
        $inconsistentCount = 0;
        $transactions = TransactionSale::all();

        foreach ($transactions as $transaction) {
            $validation = $transaction->validateConsistency();
            
            if (!$validation['valid']) {
                $inconsistentCount++;
                $this->warn("   Transaction {$transaction->number} has issues:");
                foreach ($validation['errors'] as $error) {
                    $this->warn("     - {$error}");
                }

                if ($fix) {
                    $transaction->recalculateTotals();
                    $this->info("     → Fixed totals for {$transaction->number}");
                }
            }
        }

        return $inconsistentCount;
    }

    private function checkForeignKeyReferences()
    {
        // Check transactions with invalid customers
        $invalidCustomers = DB::table('transaction_sales as ts')
            ->leftJoin('master_customers as mc', 'ts.customer_id', '=', 'mc.customer_id')
            ->whereNull('mc.customer_id')
            ->count();

        if ($invalidCustomers > 0) {
            $this->warn("   Found {$invalidCustomers} transactions with invalid customers");
        }

        // Check transactions with invalid users
        $invalidUsers = DB::table('transaction_sales as ts')
            ->leftJoin('master_users as mu', 'ts.user_id', '=', 'mu.user_id')
            ->whereNull('mu.user_id')
            ->count();

        if ($invalidUsers > 0) {
            $this->warn("   Found {$invalidUsers} transactions with invalid users");
        }

        // Check transactions with invalid branches
        $invalidBranches = DB::table('transaction_sales as ts')
            ->leftJoin('master_branches as mb', 'ts.branch_id', '=', 'mb.branch_id')
            ->whereNull('mb.branch_id')
            ->count();

        if ($invalidBranches > 0) {
            $this->warn("   Found {$invalidBranches} transactions with invalid branches");
        }

        // Check transactions with invalid payment methods
        $invalidPaymentMethods = DB::table('transaction_sales as ts')
            ->leftJoin('master_payment_methods as mpm', 'ts.payment_method_id', '=', 'mpm.payment_method_id')
            ->whereNull('mpm.payment_method_id')
            ->count();

        if ($invalidPaymentMethods > 0) {
            $this->warn("   Found {$invalidPaymentMethods} transactions with invalid payment methods");
        }

        if ($invalidCustomers + $invalidUsers + $invalidBranches + $invalidPaymentMethods == 0) {
            $this->info('   All foreign key references are valid!');
        }
    }
}
