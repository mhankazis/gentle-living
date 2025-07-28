<?php

// Simple test without Laravel bootstrap
echo "Starting simple test...\n";

// Test 1: Check if models can be loaded
try {
    require_once __DIR__ . '/vendor/autoload.php';
    
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    echo "Laravel bootstrapped successfully\n";
    
    // Test 2: Check database connection
    $pdo = new PDO('mysql:host=localhost;dbname=db_harsyad_utama', 'root', '');
    echo "Database connection successful\n";
    
    // Test 3: Check master data
    $customerCount = $pdo->query("SELECT COUNT(*) FROM master_customers")->fetchColumn();
    $productCount = $pdo->query("SELECT COUNT(*) FROM master_items")->fetchColumn();
    $paymentMethodCount = $pdo->query("SELECT COUNT(*) FROM master_payment_methods")->fetchColumn();
    
    echo "Master data counts - Customers: $customerCount, Products: $productCount, Payment Methods: $paymentMethodCount\n";
    
    if ($customerCount == 0 || $productCount == 0 || $paymentMethodCount == 0) {
        echo "ERROR: Missing master data\n";
        exit;
    }
    
    // Test 4: Try to create transaction directly with PDO
    $insertSql = "INSERT INTO transaction_sales (number, date, customer_id, payment_method_id, branch_id, user_id, sales_type_id, notes, subtotal, discount_amount, total_amount, paid_amount, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    
    $stmt = $pdo->prepare($insertSql);
    $result = $stmt->execute([
        'TEST-' . time(),
        date('Y-m-d H:i:s'),
        1,
        1,
        1, // branch_id
        1, // user_id
        1, // sales_type_id
        'Direct test',
        100000,
        0,
        100000,
        0
    ]);
    
    if ($result) {
        $transactionId = $pdo->lastInsertId();
        echo "Transaction created successfully with ID: $transactionId\n";
        
        // Test 5: Create transaction detail
        $detailSql = "INSERT INTO transaction_sales_details (transaction_sales_id, item_id, qty, sell_price, subtotal, total_amount, costprice, discount_amount, discount_percentage, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        
        $detailStmt = $pdo->prepare($detailSql);
        $detailResult = $detailStmt->execute([
            $transactionId,
            1,
            2,
            50000,
            100000,
            100000,
            0,
            0,
            0
        ]);
        
        if ($detailResult) {
            echo "Transaction detail created successfully\n";
        } else {
            echo "ERROR creating transaction detail: " . print_r($detailStmt->errorInfo(), true) . "\n";
        }
    } else {
        echo "ERROR creating transaction: " . print_r($stmt->errorInfo(), true) . "\n";
    }
    
    echo "Test completed successfully\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
