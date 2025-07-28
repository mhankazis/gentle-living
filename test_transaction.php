<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

use App\Models\TransactionSale;
use App\Models\TransactionSaleDetail;
use App\Models\Product;
use App\Models\Customer;

try {
    echo "Testing Transaction Creation...\n";
    
    // Get first customer and product
    $customer = Customer::first();
    $product = Product::first();
    
    if (!$customer) {
        echo "No customer found! Please create at least one customer.\n";
        exit;
    }
    
    if (!$product) {
        echo "No product found! Please create at least one product.\n";
        exit;
    }
    
    echo "Customer: {$customer->customer_name}\n";
    echo "Product: {$product->product_name}\n";
    
    // Create new transaction
    $transaction = new TransactionSale();
    $transaction->customer_id = $customer->customer_id;
    $transaction->transaction_date = now();
    $transaction->transaction_notes = 'Test transaction via script';
    $transaction->total_amount = 100000;
    $transaction->paid_amount = 0;
    $transaction->payment_status = 'unpaid';
    $transaction->save();
    
    echo "Transaction created with ID: {$transaction->transaction_sales_id}\n";
    echo "Transaction Number: {$transaction->transaction_number}\n";
    
    // Create transaction detail
    $detail = new TransactionSaleDetail();
    $detail->transaction_sales_id = $transaction->transaction_sales_id;
    $detail->item_id = $product->product_id;
    $detail->qty = 2;
    $detail->sell_price = 50000;
    $detail->subtotal = 100000;
    $detail->total_amount = 100000;
    $detail->save();
    
    echo "Transaction detail created with ID: {$detail->transaction_sales_detail_id}\n";
    
    // Reload transaction to see updated totals
    $transaction->refresh();
    echo "Updated transaction total: Rp " . number_format($transaction->total_amount, 0, ',', '.') . "\n";
    
    echo "\nTransaction creation test completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
